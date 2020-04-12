<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="security_register")
     */
    public function registration(Request $request,
                                 EntityManagerInterface $manager,
                                 UserPasswordEncoderInterface $encoder, MailerInterface $mailer)
    {
        // création nouvel utilisateur
        $user = new User();
        // création formulaire de type RegistrationType à qui on passe le nouvel utilisateur
        $form = $this->createForm(RegistrationType::class, $user);
        // analyse de la requete
        $form->handleRequest($request);

        // si le form est soumis et est valide, on crypte le password,
        // on persiste et on sauvegarde les données
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setCreatedAt(new \DateTime());

            $manager->persist($user);
            $manager->flush();

            // message de succès
            $this->addFlash(
                'success',
                'Félicitations votre compte a bien été crée ! Connectez-vous dès à présent.'
            );

            // on envoie un mail
            $email = (new TemplatedEmail())
                ->from(new Address('9d4c5346d59fdb@smtp.mailtrap.io', '9d4c5346d59fdb'))
                ->to($user->getEmail())
                ->subject('Bienvenu chez Craft Betting')
                ->htmlTemplate('reset_password/email-register.html.twig')
                ->context([
                    'username' => $user->getUsername()
                ])
            ;

            $mailer->send($email);

            // on redirige sur le form de connexion
            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/registration.html.twig', [
            'form_register' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name="security_login")
     */
    public function login()
    {
        // message de succès
        $this->addFlash(
            'success',
            'Vous êtes bien connecté !'
        );

        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout_message", name="security_logoutmessage")
     */
    public function logoutMessage()
    {
        $this->addFlash('warning', "Vous êtes bien déconnecté !");
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
    }
}
