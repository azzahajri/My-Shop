@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="max-w-5xl mx-auto"> <!-- CENTRER LE TABLEAU -->

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            
            <h2 class="text-3xl font-bold text-gray-800">Liste des Produits</h2>

            <a href="{{ route('products.create') }}"
               class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                + Ajouter un Produit
            </a>
        </div>

        <!-- SEARCH (no button) -->
        <div class="mb-4">
            <input id="product-search" type="text" name="search" value="{{ request('search') }}"
                   placeholder="Tapez pour rechercher..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                   
        </div>
        <!-- TABLE -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">

            <table class="min-w-full divide-y divide-gray-200">

                <!-- HEADERS -->
                <thead class="bg-gray-100" >
                    <tr>
                        <th class="px-9 py-4 text-left text-sm font-semibold text-gray-900">Nom</th>
                        <th class="px-9 py-4 text-left text-sm font-semibold text-gray-900">Catégorie</th>
                        <th class="px-9 py-4 text-left text-sm font-semibold text-gray-900">Prix</th>
                        <th class="px-9 py-4 text-left text-sm font-semibold text-gray-900">Stock</th>
                        <th class="px-9 py-4 text-left text-sm font-semibold text-gray-900">Date</th>
                        <th class="px-9 py-4 text-center text-sm font-semibold text-gray-900" colspan="3">Actions</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="bg-white divide-y divide-gray-100">

                    @foreach($products as $p)
                    <tr class="hover:bg-gray-50">
                        <!-- NAME -->
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $p->name }}
                        </td>

                        <!-- CATEGORY -->
                        <td class="px-6 py-4">
                            @if($p->category)
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">
                                    {{ $p->category->name }}
                                </span>
                            @else
                                <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm">
                                    Aucune
                                </span>
                            @endif
                        </td>

                        <!-- PRICE -->
                        <td class="px-6 py-4 text-green-700 font-semibold">
                            {{ number_format($p->price, 2) }} DT
                        </td>

                        <!-- STOCK -->
                        <td class="px-6 py-4">
                            @if($p->stock > 10)
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                    {{ $p->stock }}
                                </span>
                            @elseif($p->stock > 0)
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">
                                    {{ $p->stock }}
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">
                                    Rupture
                                </span>
                            @endif
                        </td>

                        <!-- DATE -->
                        <td class="px-6 py-4 text-gray-600 text-sm">
                            {{ $p->created_at->format('Y-m-d') }}
                        </td>

                         <td class="px-6 py-4 text-center">
                            <a href="{{ route('products.show', $p->id) }}"
                               class="px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-medium rounded-lg shadow-md transition duration-200">
                                Voir
                            </a>
                        </td>

                        <!-- EDIT BUTTON (FIXED BLUE) -->
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('products.edit', $p->id) }}"
                               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-md transition duration-200">
                                Modifier
                            </a>
                        </td>

                        <!-- DELETE BUTTON -->
                        <td class="px-6 py-4 text-center">
                            <form action="{{ route('products.destroy', $p->id) }}" method="POST"
                                  onsubmit="return confirm('Supprimer ce produit ?');">
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

        <!-- PAGINATION -->
        <div class="mt-6 flex justify-center">
            {{ $products->links() }}
        </div>

    </div>
</div>
@endsection
