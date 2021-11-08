<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Services\CommentService;
use App\Http\Services\Dto\CreateCommentDto;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CommentController extends Controller
{
    /**
     * @param Article $article
     * @param StoreCommentRequest $request
     * @param CommentService $commentService
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function store(Article $article, StoreCommentRequest $request, CommentService $commentService): JsonResponse
    {
        $dto = new CreateCommentDto(
            articleId: $article->id,
            subject: $request->getDto()->subject,
            body: $request->getDto()->body
        );

        $commentService->create($dto);

        return new JsonResponse(
            [
                'success' => true,
            ],
            200
        );
    }
}
