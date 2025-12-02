@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
    <p><strong>Catégorie:</strong> {{ $product->category?->name ?? 'Aucune' }}</p>
    <p><strong>Prix:</strong> {{ number_format($product->price, 2) }} DT</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p class="mt-4">{{ $product->description }}</p>
</div>
@endsection
