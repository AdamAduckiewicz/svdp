<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="userHome")
     */
    public function home()
    {

        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();

        return $this->render('user/index.html.twig',
            array(
                'users' => $users
            )
        );
    }

    /**
     * @Route("/user/{id}", name="user_show")
     */
    public function show($id)
    {

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$user->getUsername());
    }




}
