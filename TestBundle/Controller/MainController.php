<?php

namespace Bluesquare\TestBundle\Controller;

use Bluesquare\TestBundle\Service\FooService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    public function index(Request $request)
    {
        die($request->getMethod());
        // ON PEUT PAS INJECTER UN SERVICE DU BUNDLE EN QUESTION DANS LES ARGS DONC ON LE récupère ainsi :
        $this->get('bluesquare.test_bundle.foo')->foo();
        die('hello');
    }
}