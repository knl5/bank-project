<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\BankAccount;
use App\Form\AccountType;
use App\Form\BankAccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class CreateBankAccountController extends AbstractController
{
    #[Route('/{id}/bank_account', name: 'bank_account')]
    public function showAccount(Account $bankAccount): Response
    {
        return $this->render("create_bank_account/bank_account.html.twig", [
            "bankAccount" => $bankAccount,
        ]);
    }

    #[Route('/create/bank/account', name: 'create_bank_account')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserInterface $user): Response
    {
        $bank_account = new Account();
        $form = $this->createForm(AccountType::class, $bank_account);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $bank_account = $form->getData();
            $set_rib = rand (0,1000);
            $bank_account->setRIB($set_rib);
            $bank_account->setClient($user);
            $bank_account->setAmount(0);
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
