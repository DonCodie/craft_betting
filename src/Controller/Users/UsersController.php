<?php

namespace App\Controller\Users;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class UsersController extends AbstractController
{
    /**
     * @Route("/users-connection ", name="users_connection")
     */
    public function index()
    {
        return $this->render('pages/homepage/homepage.html.twig',
            ['tests' => $this->userConnection()]
        );
    }

    public function userConnection()
    {
        return $test = $this->getDoctrine()
            ->getRepository(Users::class)->findAll();
    }
}