<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Utility;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

final class TcaUtility
{
    public static function setTcaCtype(string $ext, string $contentElement, string $table = 'tt_content'): void
    {
        $extSignature = str_replace('_', '', $ext);
        $cType = $extSignature . '_ce_' . $contentElement;

        $tca = [
            'types' => [
                $cType => [
                    'showitem' => '
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                        --palette--;;general,
                        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.html_formlabel,
                    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                        --palette--;;frames, --palette--;;appearanceLinks,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;language,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, --palette--;;hidden,
                        --palette--;;access, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                        categories, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                        rowDescription, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                ',
                ],
            ],
        ];
        $GLOBALS['TCA'][$table] = array_replace_recursive($GLOBALS['TCA'][$table], $tca);

        $flexForm = ExtensionManagementUtility::extPath($ext) . 'Configuration/FlexForms/' . $cType . '.xml';
        if (file_exists($flexForm)) {
            ExtensionManagementUtility::addPiFlexFormValue(
                '*',
                'FILE:EXT:' . $ext . '/Configuration/FlexForms/' . $cType . '.xml',
                $cType
            );

            $newFieldsString = 'pi_flexform;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:flexform_formlabel';
            ExtensionManagementUtility::addToAllTCAtypes($table, $newFieldsString, $cType, 'after:header');
        }

    }
}
