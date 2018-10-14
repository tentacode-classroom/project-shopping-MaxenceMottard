<?php

namespace App\Command;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class UserAdminCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'user-admin';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $manager = $this->getContainer()->get('doctrine')->getEntityManager('default');

        $mail = $input->getArgument('arg1');
//        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');

        $user =  $this->getContainer()->get('doctrine')
            ->getRepository( User::class )
            ->findOneByMail( $mail );

        if ( !$user ) {
            $io->error('Aucun utilisateur n\'a été trouvé');
            return;
        }

//        $user->setRole( 'ROLE_ADMIN' );

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
