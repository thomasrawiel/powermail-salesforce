<?php

defined('TYPO3') || die('Access denied.');

call_user_func(function ($_EXTKEY = 'lin_salesforce', string $table = 'tx_powermail_domain_model_field'): void {
    $LLL = 'LLL:EXT:powermail_salesforce/Resources/Private/Language/locallang_db.xlf';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, [
        'sf_fieldname' => [
            'exclude' => true,
            'label' => $LLL . ':tca.' . $table . '.sf_fieldname',
            'description' => $LLL . ':tca.' . $table . '.sf_fieldname.description',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'max' => '100',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
    ]);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        $table,
        'sf_fieldname',
        '',
        'after:mandatory'
    );
});
