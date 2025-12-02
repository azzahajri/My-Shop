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
            <!-- SEARCH (no button) -->
        <div class="mb-4">
            <input id="category-search" type="text" name="search" value="{{ request('search') }}"
                   placeholder="Tapez pour rechercher..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                   
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

                <tbody id="results" class="bg-white divide-y divide-gray-100">
                    @foreach($categories as $c)
                        @include('categories.partials.single-row', ['c' => $c])
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



@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).ready(function() {

    $('#category-search').on('keyup', function() {
        let query = $(this).val();

        $.ajax({
            url: "{{ route('categories.search') }}",
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
