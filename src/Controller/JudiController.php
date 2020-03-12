<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JudiController extends AbstractController
{
    /**
     * @Route("/", name="judi")
     */
    public function index()
    {
        return $this->render('judi/index.html.twig', [
            'controller_name' => 'JudiController',
        ]);
    }

    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer)
    {
        /*
        *   Commande et liens utiles:
        *   Installer NodeJS pour avoir npm
        *   installer Maildev : 
        *       npm install -g maildev
        *
        *   Désactiver la restriction d'usage de script dans le terminal:
        *       Ouvrir le powerShell en (ADMIN!)
        *       taper: Set-ExecutionPolicy Unrestricted
        *       Lui dire Oui
        *
        *   Lancer maildev avec la commande spéciale :
        *       maildev --hide-extensions STARTTLS
        *
        *   Documentation Mailer:
        *       https://symfony.com/doc/current/components/mailer.html
        *       https://symfony.com/doc/current/mailer.html
        *
        *   Pas oublier de décommenter et modifier le MAILER_DSN dans le .env
        */

        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Salut!')
            ->text('Coucou Afpa!');
            //->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        // ...
    }
}
