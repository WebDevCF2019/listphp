<?php

namespace App\Controller;

use App\Entity\Linkphp;
use App\Form\LinkphpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * @Route("/admin/linkphp")
 */
class LinkphpController extends AbstractController
{
    /**
     * @Route("/", name="linkphp_index", methods={"GET"})
     */
    public function index(): Response
    {

        /*$linkphps = $this->getDoctrine()
            ->getRepository(Linkphp::class)
            ->findAll();*/

        /*
         * doc for pagination:
         * https://github.com/whiteoctober/Pagerfanta/blob/master/README.md
         * https://github.com/whiteoctober/WhiteOctoberPagerfantaBundle
         *
         * doc query builder
         * https://symfony.com/doc/3.3/doctrine.html
         */

        $queryBuilder = $this->getDoctrine()->getManager()->createQueryBuilder()
            ->select('u')
            ->from(Linkphp::class, 'u');


        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);

        if (isset($_GET["page"])) {
            $pagerfanta->setCurrentPage($_GET["page"]);
        }

        return $this->render('linkphp/index.html.twig', [
             'my_pager' => $pagerfanta,
        ]);
    }

    /**
     * @Route("/new", name="linkphp_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $linkphp = new Linkphp();
        $form = $this->createForm(LinkphpType::class, $linkphp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($linkphp);
            $entityManager->flush();

            return $this->redirectToRoute('linkphp_index');
        }

        return $this->render('linkphp/new.html.twig', [
            'linkphp' => $linkphp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idlinkphp}", name="linkphp_show", methods={"GET"})
     */
    public function show(Linkphp $linkphp): Response
    {
        return $this->render('linkphp/show.html.twig', [
            'linkphp' => $linkphp,
        ]);
    }

    /**
     * @Route("/{idlinkphp}/edit", name="linkphp_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Linkphp $linkphp): Response
    {
        $form = $this->createForm(LinkphpType::class, $linkphp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('linkphp_index', [
                'idlinkphp' => $linkphp->getIdlinkphp(),
            ]);
        }

        return $this->render('linkphp/edit.html.twig', [
            'linkphp' => $linkphp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idlinkphp}", name="linkphp_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Linkphp $linkphp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$linkphp->getIdlinkphp(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($linkphp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('linkphp_index');
    }
}
