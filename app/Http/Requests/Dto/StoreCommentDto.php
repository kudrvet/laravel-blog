<?php

namespace App\Http\Requests\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class StoreCommentDto extends DataTransferObject
{
    public string $subject;
    public string $body;
}
