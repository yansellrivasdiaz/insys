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
    public function camposAfinesAction(Request $request)
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
            return $this->render('@App/Admin/campos_afines.html.twig',array(
                'form' => $form->createView(),
                "message"=>"Registro completado exitosamente!",
                "estatus"=>true
            ));
        }

        return $this->render(
            '@App/Admin/campos_afines.html.twig',
            array('form' => $form->createView())
        );
    }


    /**
     * @Route("/estatus", name="estatuspage")
     */
    public function estatusAction(Request $request)
    {
        $estatus=$this->getDoctrine()->
        getRepository(Estatus::class)
            ->findAll();
//        dump([$estatus]);
//        exit();
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
            return $this->render('@App/Admin/estatus.html.twig',array(
                "message"=>"Registro completado exitosamente!",
                "estatus"=>true
            ));
        }

        return $this->render(
            '@App/Admin/formestatus.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/usuarios", name="usuariospage")
     */
    public function usuariosAction(Request $request)
    {
        return $this->render('@App/Admin/usuarios.html.twig');
    }
}
