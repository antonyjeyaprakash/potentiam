<?php

declare(strict_types=1);

namespace App\Post\Application\Query;

use App\Post\Domain\Post;
use App\Post\Domain\PostRepository;
//use App\Shared\Domain\Bus\Response;
use App\Post\Application\Query\PostResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Shared\Domain\Bus\QueryHandler;
use Symfony\Component\Uid\Uuid;

class GetPostQueryHandler implements QueryHandler
{
    public function __construct(
        private readonly PostRepository $repository
    ) {
    }

    public function __invoke(GetPostQuery $command) : PostResponse
    {
		$ulid = new Uuid($command->id);
		$result = $this->repository->find($ulid);
        $data = new PostResponse($result);
        return $data;
    }
}                

