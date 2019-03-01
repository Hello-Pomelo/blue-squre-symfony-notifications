<?php

namespace Bluesquare\NotificationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Bluesquare\NotificationsBundle\Repository\BillingInvoiceRepository")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;
}
