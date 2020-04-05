<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->get('form.factory')
            ->createNamedBuilder('form')
            ->add('_username', TextType::class, ['label' => 'Email', 'attr' => ['class' => 'form__item-label']])
            ->add('_password', PasswordType::class, ['label' => 'Mot de passe', 'attr' => ['class' => 'form__item-submit']])
            ->add('_submit', SubmitType::class, ['label' => 'connexion', 'attr' => ['class' => 'form__item-submit']])
            ->getForm();

        dump($error);
        dump($lastUsername);
        $this->addFlash('success', 'Votre compte à bien été enregistré.');

        return $this->render('block/forms/user-connect.html.twig', [
//            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}
