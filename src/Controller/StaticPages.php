<?php
namespace App\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Livre;
use App\Repository\LivreRepository;
 
class StaticPages extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(LivreRepository $LivreRepository): Response
    {
        return $this->render('home.html.twig', [
            'Livre' => $LivreRepository->findAll(),
        ]);
    }
}