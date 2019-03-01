<?php

namespace Bluesquare\NotificationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function myUser()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $notifssrv = $this->get('bluesquare.notifications_bundle.notifssrv');
        $user = $this->getUser();

        $notifs = $notifssrv->getForUser($user, true);
        return $this->json($notifs);
    }
}