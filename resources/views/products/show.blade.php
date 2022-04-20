@extends('layout')
@section('title') One Product
@endsection
@section('content')
    <div class="card m-auto" style="width: 30%;">
        <img src="/storage/{{ $product->image }}" class="card-img-top" width="400px"alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <strong>Description:</strong>
            <p class="card-text">{{ $product->description }}</p>
            <strong>Status:</strong>
            <p>{{ $product->status }}</p>
            <strong>Tags:</strong>
            @foreach($product->tags as $tag)
                <p value="{{$tag->id}}">{{$tag->name}}</p>
            @endforeach
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
@endsection
