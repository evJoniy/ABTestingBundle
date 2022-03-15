<?php

namespace MauticPlugin\ABTestingBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class ABTestingIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'ABTesting';
    }

    /**
     * @return string
     */
    public function getAuthenticationType()
    {
        return 'none';
    }
}
