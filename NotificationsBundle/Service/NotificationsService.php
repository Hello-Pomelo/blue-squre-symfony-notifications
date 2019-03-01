<?php

namespace Bluesquare\NotificationsBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class NotificationsService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function notifyUsers()
    {
        return 'bar';
    }
}