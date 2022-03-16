<?php

namespace MauticPlugin\ABTestingBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Mautic\LeadBundle\Event\LeadEvent;
use Mautic\LeadBundle\LeadEvents;

class LeadSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            LeadEvents::LEAD_PRE_SAVE => ['onTimelineGenerate', 0]
        ];
    }

    /**
     * Compile events for the lead timeline
     *
     * @param LeadEvent $event
     */
    public function onTimelineGenerate(LeadEvent $event)
    {
        $lead = $event->getLead();

        if (array_key_exists('abtesting', $lead->getChanges()['fields'])) {
            $event->setLead(
                $lead->addUpdatedField('abtesting', (bool)rand(0, 1))
            );
        }
    }
}

