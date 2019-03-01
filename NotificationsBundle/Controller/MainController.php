<?php

namespace Bluesquare\NotificationsBundle\Controller;

use Bluesquare\NotificationsBundle\Service\NotificationsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        // ON PEUT PAS INJECTER UN SERVICE DU BUNDLE EN QUESTION DANS LES ARGS DONC ON LE récupère ainsi :
        /** @var NotificationsService $notifssrv */
        $notifssrv = $this->get('bluesquare.notifications_bundle.notifssrv');
        $r = $notifssrv->notifyUsers();
        die($r);
    }
}