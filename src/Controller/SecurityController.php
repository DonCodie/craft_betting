<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="security_register")
     */
    public function registration(Request $request,
                                 EntityManagerInterface $manager,
                                 UserPasswordEncoderInterface $encoder)
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
                'notice',
                'Your changes were saved!'
            );

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
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
    }
}
