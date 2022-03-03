<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
// use Doctrine\ORM\EntityManagerInterface;

#[AsCommand(
    name: 'app:create-admin-user',
    description: 'Add ADMIN role to exist user.',
    hidden: false,
    aliases: ['app:create-admin-user']
)]

class CreateAdminUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-admin-user';

    // the command description shown when running "php bin/console list"
    protected static $defaultDescription = 'Add ADMIN role to exist user.';

    protected function configure(): void
    {
        $this
        ->addArgument('userId', InputArgument::REQUIRED, 'Tape user id')
        ->setHelp('This command allows you to add ADMIN role to exist user.')
        ;

        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ADMIN';

        $this->roles = $roles;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user
        $output->writeln([
            'Add role USER_ADMIN',
            '============',
            '',
        ]);
    
        // the value returned by someMethod() can be an iterator (https://secure.php.net/iterator)
        // that generates and returns the messages with the 'yield' PHP keyword
        //$output->writeln($this->someMethod());
    
        // outputs a message followed by a "\n"
        $output->writeln('waaaa!');
    
        // outputs a message without adding a "\n" at the end of the line
        $output->write('You are about to ');
        $output->write('add ROLE_ADMIN to a user.');

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }


}