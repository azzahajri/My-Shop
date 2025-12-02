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

    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Créer un Category</h1>

    <form method="POST" action="{{ route('categories.store') }}" class="bg-white shadow-md rounded-lg p-6 space-y-4">
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

        <!-- Slug -->
        <div>
            <label class="block mb-1 font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" value="{{ old('slug') }}"
                   class="w-full px-4 py-2 border @error('slug') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
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
