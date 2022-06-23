<?php

namespace App\Controller;

use App\Entity\Topics;
use App\Repository\TopicsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TopicsController extends AbstractController
{
    #[Route('/topics', name: 'app_topics')]
    public function index(TopicsRepository $topicsRepository): Response
    {

        // recupere toute les données
        // $topics = $topicsRepository->findAll();
        // dd($topics);


        $lastTopics = $topicsRepository->findLastTopics();

        return $this->render('topics/index.html.twig', [
            'lastTopics' => $lastTopics,
        ]);
    } 

    //affichage de l'article
     #[Route("/topics/{id}", name: 'topics_read')]

    public function read(Topics $topics){

        return $this->render('topics/read.html.twig', [
            'topics' => $topics,
        ]);

    }
}
