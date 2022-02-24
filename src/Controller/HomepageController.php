<?php

namespace App\Controller;

use App\Repository\AddMoneyRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(AddMoneyRepository $addMoneyRepository): Response
    {
        $total = 0;

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'amounts' => $addMoneyRepository->findAll(),
            'total' => $total,
        ]);
    }
}
