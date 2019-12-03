@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/article" class="btn btn-primary">文章添加</a>


                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="" name="article_title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Content</label>
                        <input type="text" class="form-control" name="article_content" placeholder="content">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>

                        <input type="img" id="article_imgs">
                        <input type="file" id="article_imgs">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>

                    <button type="submit" class="btn btn-default">提交</button>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
