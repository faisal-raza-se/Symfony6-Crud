<?php 

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/', name:'app_index')]
    public function index(UserProfileRepository $profiles): Response
    {

        return $this->render(
            'hello/index.html.twig', []
        );
        

    }
}






?>