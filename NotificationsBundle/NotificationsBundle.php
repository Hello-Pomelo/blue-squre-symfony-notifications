<?php

namespace Bluesquare\NotificationsBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Bluesquare\NotificationsBundle\DependencyInjection\NotificationsExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NotificationsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    public function getContainerExtension()
    {
        if (null === $this->extension)
            $this->extension = new NotificationsExtension();

        return $this->extension;
    }
}