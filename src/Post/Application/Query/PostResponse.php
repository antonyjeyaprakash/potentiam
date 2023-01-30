<?php

declare(strict_types=1);

namespace App\Post\Application\Query;
use App\Shared\Domain\Bus\Response;
use App\Post\Domain\Post;
class PostResponse implements Response
{
  private Post $data ;

  public function __construct(Post $x) {
    $this->data = $x;

  }
  public function getObject(){
    return $this->data;
  }

}