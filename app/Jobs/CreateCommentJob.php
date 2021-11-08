<?php

namespace App\Jobs;

use App\Http\Services\Dto\CreateCommentDto;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCommentJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $timeout = 0;

    private CreateCommentDto $dto;

    public function __construct(CreateCommentDto $dto)
    {
        $this->dto = $dto;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article = Article::find($this->dto->articleId);
        if ($article) {
            sleep(600);
            $article->comments()->create($this->dto->only('subject', 'body')->toArray());
        }
    }
}
