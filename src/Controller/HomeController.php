<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Listephp;
use App\Entity\Linkphp;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $listephps = $this->getDoctrine()
            ->getRepository(Listephp::class)
            ->findAll();

        return $this->render('home/index.html.twig', [
            'liste' => $listephps,
        ]);
    }
    /**
     * @Route("/admin/", name="admin")
     */
    public function admin()
    {
        return $this->render('home/admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
