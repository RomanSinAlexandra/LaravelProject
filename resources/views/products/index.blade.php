@extends('layout')

@section('title', 'Каталог')

@section('content')
<h2>Каталог товаров</h2>
<div class="grid">
@foreach($products as $product)
    <div class="item">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" width="150">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }} грн</p>
        <a href="{{ route('product.show', $product->id) }}">Подробнее</a>
    </div>
@endforeach
</div>
@endsection
