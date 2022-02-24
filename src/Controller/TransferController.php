<?php

namespace App\Controller;

use App\Entity\Transfer;
use App\Form\TransferType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransferController extends AbstractController
{
    #[Route('/transfer', name: 'transfer')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $transfer = new Transfer();
        $form = $this->createForm(TransferType::class, $transfer);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($transfer);
            $entityManager->flush();
            

            return $this->redirectToRoute('homepage');
        }

        return $this->render('transfer/index.html.twig', [
            'controller_name' => 'TransferController',
            'form' => $form->createView(),
        ]);
    }

}
