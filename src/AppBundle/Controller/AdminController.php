<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CamposAfines;
use AppBundle\Entity\Estatus;
use AppBundle\Form\CamposAfinesType;
use AppBundle\Form\EstatusType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/camposafines", name="camposafinespage")
     */
    public function camposafinesAction(Request $request)
    {
        $camposafines=$this->getDoctrine()->
        getRepository(CamposAfines::class)
            ->findAll();
        return $this->render('@App/Admin/campos_afines.html.twig',[
            'campos_afines' => $camposafines
        ]);
    }

    /**
     * @Route("/camposafines/nuevo", name="nuevocamposafinespage")
     */
    public function nuevoCamposAfinesAction(Request $request)
    {
        // 1) build the form
        $camposafines = new CamposAfines();
        $form = $this->createForm(CamposAfinesType::class, $camposafines);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($camposafines);
            $entityManager->flush();
            return $this->redirectToRoute('camposafinespage');
        }

        return $this->render(
            '@App/Admin/formcampos_afines.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/camposafines/{id}/edit", name="campo_afin_edit")
     */
    public function camposAfinesEditAction(Request $request,CamposAfines $campoafin)
    {
        $form = $this->createForm(CamposAfinesType::class, $campoafin);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($camposafines);
            $entityManager->flush();
            return $this->redirectToRoute('camposafinespage');
        }

        return $this->render(
            '@App/Admin/formcampos_afines.html.twig',
            array('form' => $form->createView())
        );
    }


    /**
     * @Route("/camposafines/remove/{id}", name="campo_afin_remove")
     */
    public function camposAfinesDelAction(Request $request,CamposAfines $campoafin)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($campoafin);
        $em->flush();
        return $this->redirectToRoute('camposafinespage');
    }


    /**
     * @Route("/estatus", name="estatuspage")
     */
    public function estatusAction(Request $request)
    {
        $estatus=$this->getDoctrine()->
        getRepository(Estatus::class)
            ->findAll();
        return $this->render('@App/Admin/estatus.html.twig',[
            'estatus' => $estatus
        ]);
    }

    /**
     * @Route("/estatus/nuevo", name="nuevoestatuspage")
     */
    public function nuevoestatusAction(Request $request)
    {
        // 1) build the form
        $estatus = new Estatus();
        $form = $this->createForm(EstatusType::class, $estatus);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($estatus);
            $entityManager->flush();
            return $this->redirectToRoute('camposafinespage');
        }

        return $this->render(
            '@App/Admin/formestatus.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/estatus/{id}/edit", name="estatus_edit")
     */
    public function estatusEditAction(Request $request, Estatus $estatus)
    {
        $form = $this->createForm(EstatusType::class, $estatus);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('estatuspage');
        }

        return $this->render(
            '@App/Admin/formestatus.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/estatus/remove/{id}", name="estatus_remove")
     */
    public function estatusDelAction(Request $request, Estatus $estatus)
    {
        $em=$this->getDoctrine()->getManager();
        $em->remove($estatus);
        $em->flush();
        return $this->redirectToRoute('estatuspage');
    }

    /**
     * @Route("/usuarios", name="usuariospage")
     */
    public function usuariosAction(Request $request)
    {
        return $this->render('@App/Admin/usuarios.html.twig');
    }
}
