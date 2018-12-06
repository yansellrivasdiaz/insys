<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CamposAfines;
use AppBundle\Entity\UsuarioCamposAfine;
use AppBundle\Form\CamposAfinesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home")
 */
class PanelController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/Panel/home.html.twig');
    }
    /**
     * @Route("/miscamposafines", name="miscamposafinespage")
     */
    public function miscamposafinesAction(Request $request)
    {
        // 1) build the form
        $camposafines = $this->getDoctrine()->getManager()->getRepository(CamposAfines::class)->findAll();
        // 2) handle the submit (will only happen on POST)


        // replace this example code with whatever you need
        return $this->render('@App/Panel/miscamposafines.html.twig',[
            "camposAfines"=>$camposafines
        ]);
    }
}
