<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CamposAfines;
use AppBundle\Entity\UsuarioCamposAfine;
use AppBundle\Form\CamposAfinesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home")
 */
class CamposAfinesController extends AbstractController
{
//    /**
//     * @Route("/rest/camposafines", name="get_campos_afinespage", methods={"GET"})
//     */
//    public function getAllCamposAfinesAction(Request $request)
//    {
//        $camposAfines = $this->getDoctrine()->getRepository(CamposAfines::class)
//            ->findAll();
//        $camposAfines = $this->get('serializer')->serialize($camposAfines,'json');
//        $dataJson = json_decode($camposAfines,true);
//        return new JsonResponse($dataJson);
//    }
    /**
     * @Route("/rest/miscamposafines", name="guardar_mis_campos_afinespage", methods={"POST"})
     */
    public function guardarMisCamposAfinesAction(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data,true);
        dump($data);
        die;
        $campoafin = new CamposAfines();
        //$campoafin->setDescripcion($data["descripcion"]);

        $form = $this->createForm(CamposAfinesType::class,$campoafin);
        $form->submit($data);

        if($form->isValid()){
            // Aqui se llama la doctrine para insertar
            $em = $this->getDoctrine()->getManager();
            $em->persist($campoafin);
            $em->flush();
        }else{
            return new JsonResponse(array("error"=>true,"message"=>"Data incompleta"),400);
        }
        // se convierte a json de nuevo para devolverlo hacia el formulario
        $campoafin = $this->get('serializer')->serialize($campoafin,'json');
        $dataJson = json_decode($campoafin,true);

        return new JsonResponse($dataJson);
    }
}
