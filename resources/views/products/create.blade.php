@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10">

    <!-- Success message -->
    @if(session('success'))
        <div id="success-message"
             class="mb-6 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded shadow text-center font-medium">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Créer un Produit</h1>

    <form method="POST" action="{{ route('products.store') }}" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Nom</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Catégorie</label>
            <select name="category_id"
                    class="w-full px-4 py-2 border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">-- choisir --</option>
                @foreach(\App\Models\Category::all() as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price & Stock -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium text-gray-700">Prix</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                       class="w-full px-4 py-2 border @error('price') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('price')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" value="{{ old('stock') }}"
                       class="w-full px-4 py-2 border @error('stock') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('stock')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Description</label>
            <textarea name="description" rows="4"
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <!-- Submit -->
        <div class="text-center">
            <button type="submit"
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition duration-200">
                Créer
            </button>
        </div>
    </form>

</div>

<!-- Script pour faire disparaître le message success -->
@if(session('success'))
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if(msg) msg.remove();
        }, 4000); // disparaît après 4 secondes
    });
</script>
@endif
@endsection
