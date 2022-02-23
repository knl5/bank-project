<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AddMoney;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $amount = AddMoney::class;

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'amount' => $amount,
        ]);
    }
}
