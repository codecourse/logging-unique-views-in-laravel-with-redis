<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Article extends Model
{
    use HasFactory;

    public function logView()
    {
        Redis::pfadd(sprintf('articles.%s.views', $this->id), [request()->ip()]);
    }

    public function getViewCount()
    {
        return Redis::pfcount(sprintf('articles.%s.views', $this->id));
    }
}
