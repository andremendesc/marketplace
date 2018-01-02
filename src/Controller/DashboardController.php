<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function admin()
    {
        $session = $this->get('session');
        dump($session);
        return new Response('<html><body>Admin page! <a href="/logout">sair</a> </body></html>');
    }

    /**
     * @Route("/", name="landing_page")
     */
    public function index()
    {
        return new Response('<html><body>Landing Page! <br> <a href="/admin">Área de Administração</a> </body></html>');
    }
}

