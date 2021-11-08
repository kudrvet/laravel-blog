<?php

namespace App\Http\Services\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class CreateCommentDto extends DataTransferObject
{
    public int $articleId;
    public string $subject;
    public string $body;
}
