<?php

namespace GjoSe\GjoSitePackage\Task;

/***************************************************************
 *  created: 05.12.19 - 11:12
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

class CleanupDumpsTaskAdditionalFieldProvider implements AdditionalFieldProviderInterface
{

    public function getAdditionalFields(array &$taskInfo, $task, SchedulerModuleController $parentObject)
    {
        $additionalFields = array();

        $backupPath = $taskInfo['gjo_introduction']['backupPath'];
        if (empty($backupPath)) {
            if ($parentObject->CMD == 'edit') {
                $backupPath = $task->backupPath;
            } else {
                $backupPath = '';
            }
        }

        $fieldID = 'gjo_introduction_backupPath';
        $fieldCode = '<select class="form-control" name="tx_scheduler[gjo_introduction][backupPath]" id="' . $fieldID . '"><option value="Test" title="">Testing</option><option value="Production" title="">Production</option></select>';
        $additionalFields[$fieldID] = array(
            'code'     => $fieldCode,
            'label'    => 'Backup-Path'
        );

        $email = $taskInfo['gjo_introduction']['email'];
        if (empty($email)) {
            if ($parentObject->CMD === 'add') {
                $email = $GLOBALS['BE_USER']->user['email'];
            } elseif ($parentObject->CMD === 'edit') {
                $email = $task->email;
            } else {
                $email = '';
            }
        }
        $fieldID = 'gjo_introduction_email';
        $fieldCode = '<input type="text" class="form-control" name="tx_scheduler[gjo_introduction][email]" id="' . $fieldID . '" value="' . htmlspecialchars($email) . '" size="30">';

        $additionalFields[$fieldID] = [
            'code' => $fieldCode,
            'label' => 'LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:label.email'
        ];
        return $additionalFields;
    }

    public function validateAdditionalFields(array &$submittedData, SchedulerModuleController $parentObject)
    {
        $result = true;

        $submittedData['gjo_introduction']['backupPath'] = trim($submittedData['gjo_introduction']['backupPath']);
        if (empty($submittedData['gjo_introduction']['backupPath'])) {
            $parentObject->addMessage($GLOBALS['LANG']->sL('LLL:EXT:additional_scheduler/Resources/Private/Language/locallang.xlf:savedirerror'), FlashMessage::ERROR);
            $result = false;
        }

        $submittedData['gjo_introduction']['email'] = trim($submittedData['gjo_introduction']['email']);
        if (empty($submittedData['gjo_introduction']['email'])) {
            $parentObject->addMessage($GLOBALS['LANG']->sL('LLL:EXT:scheduler/Resources/Private/Language/locallang.xlf:msg.noEmail'), FlashMessage::ERROR);
            $result = false;
        }

        return $result;
    }

    public function saveAdditionalFields(array $submittedData, AbstractTask $task)
    {
        $task->email = $submittedData['gjo_introduction']['email'];
        $task->backupPath = $submittedData['gjo_introduction']['backupPath'];
    }
}
