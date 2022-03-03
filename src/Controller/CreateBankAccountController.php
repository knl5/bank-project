<?php

namespace App\Controller;

use App\Entity\BankAccount;
use App\Form\BankAccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateBankAccountController extends AbstractController
{
    #[Route('/{id}/bank_account', name: 'bank_account')]
    public function showAccount(BankAccount $bankAccount): Response
    {
        return $this->render("create_bank_account/bank_account.html.twig", [
            "bankAccount" => $bankAccount,
        ]);
    }

    #[Route('/create/bank/account', name: 'create_bank_account')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bank_account = new BankAccount();
        $form = $this->createForm(BankAccountType::class, $bank_account);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bank_account);
            $entityManager->flush();

            return $this->redirectToRoute('account');
        }

        return $this->render('create_bank_account/index.html.twig', [
            'controller_name' => 'CreateBankAccountController',
            'form' => $form->createView(),
        ]);
    }
}
