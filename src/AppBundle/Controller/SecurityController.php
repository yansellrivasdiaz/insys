<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Form\UsuarioType;
use AppBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registrarse", name="registrarsepage")
     */
    public function registrarseAction(Request $request,UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario->setHabilitado(true);

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getPlainPassword());
            $usuario->setPassword($password);

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            //return $this->redirectToRoute('replace_with_some_route');
            //return new Response("Usuario registrado");
            // replace this example code with whatever you need
            return $this->render('@App/Security/login.html.twig', array(
                'message' => "Usuario registrado"
            ));
        }

        return $this->render(
            '@App/Security/registrarse.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
 * @Route("/login", name="login")
 * @param AuthenticationUtils $authenticationUtils
 * @return \Symfony\Component\HttpFoundation\Response
 */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // replace this example code with whatever you need
        return $this->render('@App/Security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }

    /**
    * @Route("/logout", name="logout")
    */
    public function logoutAction(Request $request){
        // return $this->redirectToRoute('login');
    }
}
