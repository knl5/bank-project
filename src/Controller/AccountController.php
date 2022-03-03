<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\BankAccountRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AccountController extends AbstractController
{
    #[Route('/account', name: 'account')]
    public function index(BankAccountRepository $bankAccountRepository): Response
    {
        return $this->render('account/index.html.twig', [
            'account' => 'AccountController',
            'bank_accounts' => $bankAccountRepository->findAll(),

        ]);
    }
}
