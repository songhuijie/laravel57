@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/article_add" class="btn btn-primary">文章添加</a>


                    <div class="card-header">文章列表</div>


                    <table class="table table-bordered ">
                        <tr>
                            <td>id</td>
                            <td>title</td>
                            <td>content</td>
                            <td>operation</td>
                        </tr>

                        @foreach($articles as $k=>$v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->article_title}}</td>
                                <td>{{$v->article_content}}</td>
                                <td>
                                    <a href="/article/edit/{{$v->id}}" class="btn btn-warning">修改</a>
                                    <a href="/article/del/{{$v->id}}" class="btn btn-danger">删除</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
