<?php

namespace Bluesquare\NotificationsBundle\Controller;

use Bluesquare\NotificationsBundle\Service\FooService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    public function index(Request $request)
    {
        // ON PEUT PAS INJECTER UN SERVICE DU BUNDLE EN QUESTION DANS LES ARGS DONC ON LE récupère ainsi :
        $r = $this->get('bluesquare.notifications_bundle.notifssrv')->foo();
        die($r);
    }
}