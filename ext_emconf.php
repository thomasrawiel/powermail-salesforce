<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Powermail Salesforce',
    'description' => 'Add a finisher to send data to salesforce',
    'category' => 'plugin',
    'author' => 'Thomas Rawiel',
    'author_email' => 'thomas.rawiel@gmail.com',
    'state' => 'stable',
    'version' => '1.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.18-13.4.99',
            'powermail' => '12.0.0-13.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
