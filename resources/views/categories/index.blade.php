@extends('layouts.app')

@section('content')
<div class="container">
    <div class="max-w-5xl mx-auto">
            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-800">Liste des Catégories</h2>

                <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow"> 
                    + Ajouter une catégorie 
                </a>

            </div>
              <!-- TABLE -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Slug</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700" colspan="2">Actions</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-100">
                @foreach($categories as $c)
                    <tr>
                        <td class="px-6 py-4 text-gray-600 text-sm">{{ $c->name }}</td>
                        <td class="px-6 py-4 text-gray-600 text-sm">{{ $c->slug }}</td>

                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('categories.edit', $c->id) }}"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg shadow">
                                Modifier
                            </a>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('categories.destroy', $c->id) }}" method="POST"
                                onsubmit="return confirm('Supprimer cette catégorie ?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg shadow">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

         <div class="mt-6 flex justify-center">  
            {{ $categories->links() }}
         </div>
    </div>
</div>
@endsection
