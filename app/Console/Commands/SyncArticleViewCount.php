<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class SyncArticleViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-article-view-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $views = Article::select('id')->pluck('id')->map(function ($id) {
            return ['id' => $id, 'view_count' => Redis::pfcount('articles.' . $id . '.views')];
        })
            ->toArray();

        batch()->update(new Article(), $views, 'id');
    }
}
