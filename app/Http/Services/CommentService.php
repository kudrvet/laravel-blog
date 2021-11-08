<?php

namespace App\Http\Services;

use App\Http\Services\Dto\CreateCommentDto;
use App\Jobs\CreateCommentJob;

class CommentService
{
    /**
     * @param CreateCommentDto $dto
     */
    public function create(CreateCommentDto $dto): void
    {
        CreateCommentJob::dispatch($dto);
    }
}
