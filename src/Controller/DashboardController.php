<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class DashboardController extends BaseAdminController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function admin()
    {
        $session = $this->get('session');
        return new Response('<html><body>Admin page! <a href="/logout">sair</a> </body></html>');
    }

    /**
     * @Route("/", name="landing_page")
     */
    public function index()
    {
        return new Response('<html><body>Landing Page! <br> <a href="/admin">Área de Administração</a> </body></html>');
    }

    public function createNewUserEntity()
    {
        return $this->get('fos_user.user_manager')->createUser();
    }

    public function prePersistUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
    }

    public function preUpdateUserEntity($user)
    {
        $this->get('fos_user.user_manager')->updateUser($user, false);
    }
}

