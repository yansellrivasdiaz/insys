<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CamposAfines;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/solicitud")
 */
class SolicitudController extends AbstractController
{
    /**
     * @Route("/", name="solicitudpage")
     */
    public function solicitudAction(Request $request)
    {
        $camposafines = $this->getDoctrine()->getManager()->getRepository(CamposAfines::class)->findAll();
        // replace this example code with whatever you need
        return $this->render('@App/Panel/solicitudes.html.twig');
    }

    /**
     * @Route("/crear", name="formsolicitudpage")
     */
    public function formsolicitudAction(Request $request)
    {
        $camposafines = $this->getDoctrine()->getManager()->getRepository(CamposAfines::class)->findAll();
        // replace this example code with whatever you need
        return $this->render('@App/Panel/form.solicitud.html.twig',[
            "camposafines"=>$camposafines
        ]);
    }
}
