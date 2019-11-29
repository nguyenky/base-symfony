<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        // return $this->render('main/index.html.twig', [
        //     'controller_name' => 'MainController',
        // ]);

        return $this->json(['message' => 'Welcome !!!!']);
    }

    /**
     * @Route("/custom/{name?}", name="custom")
     * @param Request $request
     * @return json
     */
    public function custom(Request $request)
    {
        dump($request->attributes->get('name'));
        die;
        return $this->json(['message' => 'Custom !!!!']);
    }
}
