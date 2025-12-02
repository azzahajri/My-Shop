@extends('layouts.app')

@section('content')
<div class="container py-10 flex justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Modifier Category</h2>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div id="success-message"
                 class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    const msg = document.getElementById('success-message');
                    if(msg) msg.remove();
                }, 4000); // disparait après 5 secondes
            </script>
        @endif

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

             <div class="mb-4">
                <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                <input type="text" id="slug" name="slug"
                       value="{{ old('slug', $category->slug) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('slug') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

        
            <div class="flex justify-center">
                <button type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition duration-200">
                    Mettre à jour
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
