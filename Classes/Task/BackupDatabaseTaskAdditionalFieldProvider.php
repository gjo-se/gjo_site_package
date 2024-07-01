<?php

namespace GjoSe\GjoSitePackage\Task;

/***************************************************************
 *  created: 05.12.19 - 10:06
 *  Copyright notice
 *  (c) 2019 Gregory Jo Erdmann <gregory.jo@gjo-se.com>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Scheduler\AdditionalFieldProviderInterface;
use TYPO3\CMS\Scheduler\Controller\SchedulerModuleController;
use TYPO3\CMS\Scheduler\Task\AbstractTask;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Messaging\FlashMessage;

class BackupDatabaseTaskAdditionalFieldProvider implements AdditionalFieldProviderInterface
{

    public function getAdditionalFields(array &$taskInfo, $task, SchedulerModuleController $parentObject)
    {
        $additionalFields = array();

        // -------------------------------

        $dbSource = $taskInfo['gjo_site_package']['dbSource'];

        if (empty($dbSource)) {
            if ($parentObject->CMD == 'edit') {
                $dbSource = $task->dbSource;
            } else {
                $dbSource = '';
            }
        }

        $options = '';
        foreach ($GLOBALS['TYPO3_CONF_VARS']['DB']['Connections'] as $value => $dbConnectionOption) {

            $option = $value;
            if($option == 'Default'){
                $option = (string)GeneralUtility::getApplicationContext();
            }
            $options .= '<option value="' . $value . '" ' . ($value ==  $dbSource ? 'selected' : '') . ' >' . $option . '</option>';
        }

        $fieldID = 'gjo_site_package_dbSource';
        $fieldCode = '<select class="form-control" name="tx_scheduler[gjo_site_package][dbSource]" id="' . $fieldID . '">' . $options . '</select>';

        $additionalFields[$fieldID] = array(
            'code'     => $fieldCode,
            'label'    => 'Source: '
        );

        // -------------------------------

        $dbTarget = $taskInfo['gjo_site_package']['dbTarget'];

        if (empty($dbTarget)) {
            if ($parentObject->CMD == 'edit') {
                $dbTarget = $task->dbTarget;
            } else {
                $dbTarget = '';
            }
        }

        $options = '<option value="Backup" ' . "('Backup' ==  $dbTarget ? 'selected' : '')" . ' > Backup </option>';
        foreach ($GLOBALS['TYPO3_CONF_VARS']['DB']['Connections'] as $value => $dbConnectionOption) {
            $option = $value;
            if($option == 'Default'){
                $option = (string)GeneralUtility::getApplicationContext();
            }
            $options .= '<option value="' . $value . '" ' . ($value ==  $dbTarget ? 'selected' : '') . ' >' . $option . '</option>';
        }

        $fieldID = 'gjo_site_package_dbTarget';
        $fieldCode = '<select class="form-control" name="tx_scheduler[gjo_site_package][dbTarget]" id="' . $fieldID . '">' . $options . '</select>';

        $additionalFields[$fieldID] = array(
            'code'     => $fieldCode,
            'label'    => 'Target: '
        );

        // -------------------------------

        $email = $taskInfo['gjo_site_package']['email'];
        if (empty($email)) {
            if ($parentObject->CMD === 'add') {
                $email = $GLOBALS['BE_USER']->user['email'];
            } elseif ($parentObject->CMD === 'edit') {
                $email = $task->email;
            } else {
                $email = '';
            }
        }
        $fieldID = 'gjo_site_package_email';
        $fieldCode = '<input type="text" class="form-control" name="tx_scheduler[gjo_site_package][email]" id="' . $fieldID . '" value="' . htmlspecialchars($email) . '" size="30">';

        $additionalFields[$fieldID] = [
            'code' => $fieldCode,
            'label' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:label.email'
        ];
        return $additionalFields;
    }

    public function validateAdditionalFields(array &$submittedData, SchedulerModuleController $parentObject)
    {
        $result = true;

        $submittedData['gjo_site_package']['email'] = trim($submittedData['gjo_site_package']['email']);
        if (empty($submittedData['gjo_site_package']['email'])) {
            $parentObject->addMessage($GLOBALS['LANG']->sL('LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:msg.noEmail'), FlashMessage::ERROR);
            $result = false;
        }

        return $result;
    }

    public function saveAdditionalFields(array $submittedData, AbstractTask $task)
    {
        $task->dbSource = $submittedData['gjo_site_package']['dbSource'];
        $task->dbTarget = $submittedData['gjo_site_package']['dbTarget'];
        $task->email = $submittedData['gjo_site_package']['email'];
    }
}
