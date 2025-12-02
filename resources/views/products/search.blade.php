@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="max-w-5xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Liste des Produits</h2>

            <a href="{{ route('products.create') }}"
               class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                + Ajouter un Produit
            </a>
        </div>

        <!-- SEARCH -->
        <div class="mb-4">
            <input id="product-search" type="text" name="search"
                   placeholder="Tapez pour rechercher..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- AJAX RESULTS -->
        <div id="results">
            @include('products.partials.search-result', ['products' => $products])
        </div>

    </div>
</div>
@endsection


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- AJAX SEARCH -->
<script>
    $(document).ready(function(){

        $('#product-search').on('keyup', function(){

            let query = $(this).val();

            $.ajax({
                url: "{{ route('search') }}",
                type: "GET",
                data: { search: query },
                success: function(data){
                    $('#results').html(data);
                }
            });

        });

    });
</script>
