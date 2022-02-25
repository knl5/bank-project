<?php

namespace App\Controller;

use App\Entity\Transfer;
use App\Form\TransferType;
use App\Repository\AccountRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class TransferController extends AbstractController
{
    #[Route('/transfer', name: 'transfer')]
    public function index(Request $request, EntityManagerInterface $entityManager, AccountRepository $accountRepository,  UserInterface $user): Response
    {
        $transfer = new Transfer();
        $form = $this->createForm(TransferType::class, $transfer, ['accounts' => $user->getAccounts()]);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $transfer = $form->getData();
            $accountReceiver = $accountRepository->findOneBy(['RIB' => $transfer->getReceiver()]);
            $accountT = $transfer->getTransmitter();
            $amount = $transfer->getAmount();
            $accountReceiver->setAmount($accountReceiver->getAmount()+$amount);
            $accountT->setAmount($accountReceiver->getAmount()-$amount);
            $entityManager->persist($accountReceiver);
            $entityManager->persist($accountT);
            $entityManager->flush();
        
            return $this->redirectToRoute('homepage');
        }

        return $this->render('transfer/index.html.twig', [
            'controller_name' => 'TransferController',
            'form' => $form->createView(),
        ]);
    }

}
