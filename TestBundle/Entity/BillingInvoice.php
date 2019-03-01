<?php

namespace Bluesquare\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Bluesquare\TestBundle\Repository\BillingInvoiceRepository")
 */
class BillingInvoice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $azerty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAzerty(): ?string
    {
        return $this->azerty;
    }

    public function setAzerty(string $azerty): self
    {
        $this->azerty = $azerty;

        return $this;
    }
}
