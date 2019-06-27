<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrador")
 */
class AdministradorController extends AbstractController
{
    /**
     * @Route("/", name="administrador_index")
     */
    public function index()
    {
        return $this->render('administrador/index.html.twig', [
            'controller_name' => 'AdministradorController',
        ]);
    }
}
