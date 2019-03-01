<?php

namespace Bluesquare\NotificationsBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class FooService
{
    public function __construct(RequestStack $requestStack)
    {

    }

    public function foo()
    {
        die(var_dump('azertyu'));
        return 'bar';
    }
}