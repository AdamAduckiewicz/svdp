<?php

namespace App\Controller;

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\CharityCase;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {

        $repository = $this->getDoctrine()->getRepository(CharityCase::class);
        $clients = $repository->orderBy('c.last_name','ASC');

        return $this->render('home/index.html.twig',
            array(
                'clients' => $clients
            )
        );
    }
}
