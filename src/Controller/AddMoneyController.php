<?php

namespace App\Controller;

use App\Entity\AddMoney;
use App\Form\AddMoneyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddMoneyController extends AbstractController
{
    #[Route('/add/money', name: 'add_money')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $add_money = new AddMoney();
        $form = $this->createForm(AddMoneyType::class, $add_money);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($add_money);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('add_money/index.html.twig', [
            'controller_name' => 'AddMoneyController',
            'form' => $form->createView(),
        ]);
    }
}
