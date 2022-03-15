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
        $event->setLead(
            $event->getLead()->addUpdatedField('abtesting', (bool)rand(0, 1))
        );
    }
}
