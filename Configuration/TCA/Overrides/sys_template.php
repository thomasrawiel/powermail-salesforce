<?php

defined('TYPO3') || die('Access denied.');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'powermail_salesforce',
    'Configuration/TypoScript',
    'Powermail Salesforce-Finisher'
);

