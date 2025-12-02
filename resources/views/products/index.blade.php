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
                <tbody id="results" class="bg-white divide-y divide-gray-100">
                    @foreach($products as $p)
                        @include('products.partials.single-row', ['p' => $p])
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

@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function() {

    $('#product-search').on('keyup', function() {
        let query = $(this).val();

        $.ajax({
            url: "{{ route('products.search') }}",
            type: "GET",
            data: { search: query },
            success: function(data) {
                $('#results').html(data);
            },
            error: function(xhr) {
                console.log("AJAX ERROR:", xhr.responseText);
            }
        });
    });

});
</script>
