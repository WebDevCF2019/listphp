<?php

namespace App\Controller;

use App\Entity\Listephp;
use App\Form\ListephpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/listephp")
 */
class ListephpController extends AbstractController
{
    /**
     * @Route("/", name="listephp_index", methods={"GET"})
     */
    public function index(): Response
    {
        $listephps = $this->getDoctrine()
            ->getRepository(Listephp::class)
            ->findAll();

        return $this->render('listephp/index.html.twig', [
            'listephps' => $listephps,
        ]);
    }

    /**
     * @Route("/new", name="listephp_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $listephp = new Listephp();
        $form = $this->createForm(ListephpType::class, $listephp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($listephp);
            $entityManager->flush();

            return $this->redirectToRoute('listephp_index');
        }

        return $this->render('listephp/new.html.twig', [
            'listephp' => $listephp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idlistephp}", name="listephp_show", methods={"GET"})
     */
    public function show(Listephp $listephp): Response
    {
        return $this->render('listephp/show.html.twig', [
            'listephp' => $listephp,
        ]);
    }

    /**
     * @Route("/{idlistephp}/edit", name="listephp_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Listephp $listephp): Response
    {
        $form = $this->createForm(ListephpType::class, $listephp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('listephp_index', [
                'idlistephp' => $listephp->getIdlistephp(),
            ]);
        }

        return $this->render('listephp/edit.html.twig', [
            'listephp' => $listephp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idlistephp}", name="listephp_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Listephp $listephp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$listephp->getIdlistephp(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($listephp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('listephp_index');
    }
}
