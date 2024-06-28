<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{
    #[Route('/team', name: 'team.index')]
    public function index(Request $request, UserRepository $repository): Response
    {
        $users = $repository->findAll();
        return $this->render('team/index.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/team/{slug}-{id}', name: 'team.show', requirements:['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id, UserRepository $repository): Response
    {
        $user = $repository->find($id);
        if($user->getslug() != $slug) {
            return $this->redirectToRoute('team.show', ['slug' => $user->getSlug(), 'id' => $user->getId()]);
        }
        return $this->render('team/show.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('team/create', name: 'team.create')]
    public function create(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        $user = new User();
       
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $mail = (new TemplatedEmail())
                ->to('lorent.max@gmail.com')
                ->from($user->getEmail())
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['data' => $user]);
            $mailer->send($mail);
            $em->flush();
            $this->addFlash('success', "L'utilisateur a bien été créée. Un email a été envoyé à l'adresse enregistrée.");
            return $this->redirectToRoute('team.index');
        }
        return $this->render('team/create.html.twig', [
            'form' => $form
        ]);
    } 

    #[Route('/team/{id}/edit', name: 'team.edit', methods: ['GET', 'POST'])]
    public function edit( User $user, Request $request, EntityManagerInterface $em ): Response
    {       
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Le profil a bien été modifié');
            return $this->redirectToRoute('team.index');
        }
        return $this->render('team/edit.html.twig', [
            'user' => $user,
            'form' => $form
        ]);
    }

    #[Route('/team/{id}', name: 'team.delete', methods: ['DELETE'])]
    public function delete(User $user, EntityManagerInterface $em)
    {
        $em->remove($user);
        $em->flush();
        $this->addFlash('success', 'La personne a bien été supprimée');
        return $this->redirectToRoute('team.index');
    }

}
