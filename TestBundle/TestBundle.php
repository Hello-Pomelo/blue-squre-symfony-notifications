<?php

namespace Bluesquare\TestBundle;

use Bluesquare\TestBundle\Entity\BillingInvoice;
use Bluesquare\TestBundle\Repository\BillingInvoiceRepository;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Bluesquare\TestBundle\DependencyInjection\TestExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TestBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    public function getContainerExtension()
    {
        if (null === $this->extension)
            $this->extension = new TestExtension();

        return $this->extension;
    }
}