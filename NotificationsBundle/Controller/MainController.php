<?php

namespace Bluesquare\NotificationsBundle\Controller;

use Bluesquare\NotificationsBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Oui, je throw des exceptions sans catch, c'est comme ça qu'on utilise ce framework proprement
 * https://symfony.com/doc/current/controller.html#managing-errors-and-404-pages
 *
 * Class MainController
 * @package Bluesquare\NotificationsBundle\Controller
 */
class MainController extends AbstractController
{
    public function getAll()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $notifssrv = $this->get('bluesquare.notifications_bundle.notifssrv');
        $user = $this->getUser();

        $notifs = $notifssrv->getForUser($user, true);
        return $this->json($notifs);
    }

    public function delete($id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $notif = $em->getRepository(Notification::class)->find($id);

        if (!$notif)
            throw $this->createNotFoundException('Notification not found');

        if ($notif->getUser() != $user)
            throw $this->createAccessDeniedException();

        $em->remove($notif);
        $em->flush();

        return $this->json(["message" => 'OK']);
    }

    public function markSeen($id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $notif = $em->getRepository(Notification::class)->find($id);

        if (!$notif)
            throw $this->createNotFoundException('Notification not found');

        if ($notif->getUser() != $user)
            throw $this->createAccessDeniedException();

        $notif->setSeenAt(new \DateTime());

        $em->persist($notif);
        $em->flush();

        return $this->json(["message" => 'OK']);

    }

    public function test()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $notifssrv = $this->get('bluesquare.notifications_bundle.notifssrv');

        $notif = new Notification();
        $notif->setTitle("Bonjour");
        $notif->setDescription("Skippy vous attend dans son antre");
        $notif->setData("le_nom_de_la_route_en_react");

        $users = [$user]; // Peut contenir plein d'users
        $notifssrv->notifyUsers($users, $notif);

        return $this->json(["message" => 'OK']);
    }
}