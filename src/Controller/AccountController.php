<?php

namespace App\Controller;

use App\Repository\AccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\BankAccountRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountController extends AbstractController
{
    #[Route('/account', name: 'account')]
    public function index(UserInterface $user): Response
    {
        return $this->render('account/index.html.twig', [
            'account' => 'AccountController',
            'bank_accounts' => $user->getAccounts(),
        ]);
    }
}
