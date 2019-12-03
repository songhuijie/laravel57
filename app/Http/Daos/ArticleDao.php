<?php

namespace App\Http\Daos;

use App\Models\Article;
use Prettus\Repository\Eloquent\BaseRepository;
class ArticleDao extends BaseRepository
{

    /**
     * @return string
     */
    public function model()
    {
        return Article::class;
    }
}
