<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
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
       //TODO
    }

    public function create()
    {
        //TODO
    }

    public function store(Request $request)
    {
        //TODO
    }

    public function show($id)
    {
        //TODO
    }

    public function edit($id)
    {
        //TODO
    }

    public function update(Request $request, $id)
    {
        //TODO
    }

    public function destroy($id)
    {
        //TODO
    }
}
