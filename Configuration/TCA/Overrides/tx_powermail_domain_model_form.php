<?php

defined('TYPO3') || die('Access denied.');

call_user_func(function ($_EXTKEY = 'lin_salesforce', string $table = 'tx_powermail_domain_model_form'): void {
    $LLL = 'LLL:EXT:powermail_salesforce/Resources/Private/Language/locallang_db.xlf';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, [
        'sf_enable' => [
            'exclude' => true,
            'label' => $LLL . ':tca.' . $table . '.sf_enable',
            'description' => $LLL . ':tca.' . $table . '.sf_enable.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => '0',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
            'onChange' => 'reload',
        ],
        'sf_oid' => [
            'exclude' => true,
            'label' => $LLL . ':tca.' . $table . '.sf_oid',
            'description' => $LLL . ':tca.' . $table . '.sf_oid.description',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'required' => true,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
            'displayCond' => 'FIELD:sf_enable:REQ:true',
        ],
        'sf_doubleoptin' => [
            'exclude' => true,
            'label' => $LLL . ':tca.' . $table . '.sf_doubleoptin',
            'description' => $LLL . ':tca.' . $table . '.sf_doubleoptin.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    ['label' => $LLL . ':tca.' . $table . '.sf_doubleoptin.checked',],
                ],
                'default' => 1,
            ],
        ],
    ]);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        $table,
        'tx_linsalesforce_fields',
        'sf_enable,sf_doubleoptin,--linebreak--,sf_oid'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        $table,
        '--palette--;' . $LLL . ':sf_paletteLabel;tx_linsalesforce_fields',
        '',
        'after:pages'
    );
});
