<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome(){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        if (in_array('ROLE_ADMIN',$user->getRoles()))
        {
            return $this->redirectToRoute('admin-home');
        }elseif (in_array('ROLE_BIBLIOTECARIO',$user->getRoles()))
        {
            return $this->redirectToRoute('bibliotecario-home');
        }elseif (in_array('ROLE_USER',$user->getRoles()))
        {
            return $this->redirectToRoute('user-home');
        }else {
            return $this->redirectToRoute('home');
        }
    }
}