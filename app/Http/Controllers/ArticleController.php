<?php

namespace App\Http\Controllers;

use App\Models\Article;

use App\Http\Controllers\Controller;
use App\Http\Daos\ArticleDao;
class ArticleController extends Controller
{
    private $articleDao;

    public function __construct(ArticleDao $articleDao)
    {
      $this->articleDao=$articleDao;
    }

    public function index()
    {
        return 1;
    }
}
