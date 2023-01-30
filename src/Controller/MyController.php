<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MyController extends AbstractController
{
    #[Route('/posts', name: 'app_posts')]
    public function index(): JsonResponse
    {
		echo "Hi";
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PostsController.php',
        ]);
    }
	public function test()
    {
		echo "hi";
		return "hi";
	}
}
