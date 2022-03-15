<?php

return [
    'name' => 'ABTesting',
    'description' => 'Enables saving ABTesting field with 50% chance of true/false',
    'author' => 'TED',
    'version' => '1.0.0',
    'services' => [
        'events' => [
            'mautic.abtesting.lead.subscriber' => [
                'class' => \MauticPlugin\ABTestingBundle\EventListener\LeadSubscriber::class,
            ],
        ],
    ],
];
