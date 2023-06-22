<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

// Changes *********************************
#[AsCommand(
    name: 'app:create-user',
    // description: 'Add a short description for your command',
    description:'Create a new user account'
)]
class CreateUserCommand extends Command
{

    // Adding constructor to handle password
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher, private UserRepository $users)
    {
        // Calling the Parent Constructor
        parent::__construct();          
    }
    protected function configure(): void
    {
        // Thes add Argugments is passed after the command name: i.e. symfony console app:create-user argument
        // The addArgument consist of 1. argument name, 2. Optional or required, 3. Addition description
        // The addOption are like flags how this command can behave.
        $this
            // *************** Changes
            // We need two arguments one for email and one password
            // ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addArgument('email', InputArgument::REQUIRED, 'User e-mail')
            ->addArgument('password', InputArgument::REQUIRED, 'User Password')
            
            // Don't need this optional argument so will remove this
            // ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }


    // The following execute method which actually runs your command logic 
    // Changes ********************** 
    // Need two arguments one for email and one for password
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        // $arg1 = $input->getArgument('arg1'); // #### Original
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');

        // ***** Changes we don't need the note anything
        // if ($arg1) {
        //     $io->note(sprintf('You passed an argument: %s', $arg1));
        // }

        // ***** Changes Also we don't need any options
        // if ($input->getOption('option1')) {
        //     // ...
        // }

        // *********** Creating User **********
        $user = new User();
        $user->setEmail($email);
        $user->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user,
                $password
            )
        );
        $this->users->save($user, true);

        // The second argument $email is for the placeholder %s
        $io->success(sprintf('User %s account was created', $email));

        return Command::SUCCESS;
    }
}
