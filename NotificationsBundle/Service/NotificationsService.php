<?php

namespace Bluesquare\NotificationsBundle\Service;

use Bluesquare\NotificationsBundle\Entity\Notification;
use Doctrine\ORM\EntityManagerInterface;

class NotificationsService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Assigne une notification $notification à tous les users de $users
     * La notification sera dupliquée pour chaque user
     *
     * @param iterable $users
     * @param Notification $notification
     */
    public function notifyUsers(iterable $users, Notification $notification)
    {
        foreach ($users as $user)
        {
            $notif = $this->duplicateNotification($notification);
            $notif->setUser($user);
            $this->em->persist($notif);
        }

        $this->em->flush();
    }

    /**
     * Duplicates a notification object. Doesn't copy ID, deleted_at, and seen_at values.
     *
     * @param Notification $notification
     * @return Notification
     */
    public function duplicateNotification(Notification $notification)
    {
        $notif = new Notification();
        $notif->setTitle($notification->getTitle());
        $notif->setUser($notification->getUser());
        $notif->setDescription($notification->getDescription());
        $notif->setData($notification->getData());

        return $notif;
    }

    /**
     * Little shortcut to get all of a user's notifications
     * This way you don't need to have a manager or import the Notification class.
     *
     * If you want the return value to be associative arrays, set assoc to true
     *
     * @param $user
     * @param bool $assoc
     * @return object[]
     */
    public function getForUser($user, $assoc = false)
    {
        $ret = $this->em->getRepository(Notification::class)->findBy(['user' => $user]);

        if ($assoc)
        {
            $arr = [];
            foreach ($ret as $n)
            {
                $arr[] = $this->toArray($n);
            }

            $ret = $arr;
        }

        return $ret;
    }

    /**
     * Transforms entity to assoc array
     *
     * @param Notification $notification
     * @return array
     */
    public function toArray(Notification $notification)
    {
        return [
            'title' => $notification->getTitle(),
            'description' => $notification->getDescription(),
            'data' => $notification->getData(),
            'user' => $notification->getUser()->getId(),
            'seen_at' => $notification->getSeenAt(),
            'deleted_at' => $notification->getDeletedAt(),
            'id' => $notification->getId()
        ];
    }
}