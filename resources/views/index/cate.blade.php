@extends('layouts.app')

@section('model')
    {{--类型添加的模态框--}}
    <div class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{--类型添加的模态框--}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">类型添加</button>
                <div class="card">

                    <div class="card-header">类型列表</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <table class="table table-bordered ">
                        <tr>
                            <td>id</td>
                            <td>name</td>
                            <td>parent_id</td>
                            <td>operation</td>
                        </tr>

                        @foreach($cates as $k=>$v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->cate_name}}</td>
                                <td>{{$v->parent_id}}</td>
                                <td>
                                    <a href="/cate_edit/{{$v->id}}" class="btn btn-success">修改</a>
                                    <a href="/cate_del/{{$v->id}}" class="btn btn-danger">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
