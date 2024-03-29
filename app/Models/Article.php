<?php

namespace App\Models;

use App\Models\Traits\LogsViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Article extends Model
{
    use HasFactory;
    use LogsViews;
}
