<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class BibliotecarioController extends AbstractController
{

    /**
     * @Route("/bibliotecario", name="bibliotecario-home")
     * @Security("has_role('ROLE_BIBLIOTECARIO')")
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }
}