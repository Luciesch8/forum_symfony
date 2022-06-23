<?php

namespace App\EventSubscriber;

use App\Model\TimesTampedInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class AdminSubscriber implements extends EventSubscriberInterface
{
    public static function getSubscribedEvents() // funstion executer avant creation entity
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreateAt'],
            // BeforeEntityPersistedEvent::class => ['setEntityUpdateAt'],

        ];

    }

    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event):void
    {
        $entity = $event->getEntityInstance();

        if (!$event instanceof TimesTampedInterface) {
            return;
        }

        $entity->setCreateAt(new \DateTime());
    } 



    // public function setEntityUpdateAt(BeforeEntityPersistedEvent $event):void
    // {
    //     $entity = $event->getEntityInstance();

    //     if (!$event instanceof TimestampedInterface) {
    //         return;
    //     }

    //     $entity->setUpdateAt(new \DateTime());
    // } 
}