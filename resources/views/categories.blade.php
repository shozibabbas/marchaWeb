@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List of All Categories</div>

                <div class="panel-body">
                    <ul class="list-group">
                    @foreach ($data as $category)
    <li class="list-group-item">{{ $category->id }}&emsp;{{ $category->name }}</li>
@endforeach
</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
