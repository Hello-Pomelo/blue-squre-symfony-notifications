<?php

namespace Bluesquare\NotificationsBundle\Controller;

use Bluesquare\NotificationsBundle\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class MainController
 * @package Bluesquare\NotificationsBundle\Controller
 */
class MainController extends AbstractController
{
    /**
     * Get all the current user's notifications
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAll()
    {
        if(!($user = $this->getUser()))
        {
            return $this->json(["message" => "Please login"], 403);
        }

        $notifssrv = $this->get('bluesquare.notifications_bundle.notifssrv');
        $notifs = $notifssrv->getForUser($user, true);

        return $this->json($notifs);
    }

    /**
     * Delete a notifiation that belong to the current user.
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function delete($id)
    {
        if(!($user = $this->getUser()))
        {
            return $this->json(["message" => "Please login"], 403);
        }

        $em = $this->getDoctrine()->getManager();
        $notif = $em->getRepository(Notification::class)->find($id);

        if (!$notif)
            return $this->json(["message" => "Notification not found"], 404);

        if ($notif->getUser() != $user)
            return $this->json(["message" => "Access denied"], 403);

        $em->remove($notif);
        $em->flush();

        return $this->json(["message" => 'OK']);
    }

    /**
     * Mark a notification of the current user as 'Seen'
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function markSeen($id)
    {
        if(!($user = $this->getUser()))
        {
            return $this->json(["message" => "Please login"], 403);
        }

        $em = $this->getDoctrine()->getManager();
        $notif = $em->getRepository(Notification::class)->find($id);

        if (!$notif)
            return $this->json(["message" => "Notification not found"], 404);

        if ($notif->getUser() != $user)
            return $this->json(["message" => "Access denied"], 403);

        $notif->setSeenAt(new \DateTime());

        $em->persist($notif);
        $em->flush();

        return $this->json(["message" => 'OK']);

    }

    /**
     * Test method that adds a dummy notification to the current user.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
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