@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="">
                        <a href="/cate" class="btn btn-primary">文章类型</a>
                        <a href="/article" class="btn btn-primary">文章列表</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
