<?php

declare(strict_types=1);

namespace App\API;

use App\Post\Application\Query\GetPostQuery;
use App\Shared\Domain\Bus\QueryBus;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use App\Post\Domain\Post;
use App\Post\Domain\PostRepository;
use App\Post\Application\Query\PostResponse;

#[Route(path: '/posts/{id}', methods: ['GET'])]
class GetPostController
{
    public function __construct(
        private readonly QueryBus $queryBus
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {  
        $query = new GetPostQuery(id: (string)$id);

        try {
            $result = $this->queryBus->ask(
                query: $query
            );
        } catch (Exception $exception) {
            return new JsonResponse(
                [],
                404,
            );
        }
        return new JsonResponse(
            [
                'post_id' => $result->getObject()->getId(),
                'title' => $result->getObject()->getTitle(),
                'summary' => $result->getObject()->getsummary(),
            ],
            Response::HTTP_OK,
        );
    }
}
