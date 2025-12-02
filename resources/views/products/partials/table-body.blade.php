<tbody class="bg-white divide-y divide-gray-100">
@foreach($products as $p)
    @include('products.partials.single-row', ['p' => $p])
@endforeach
</tbody>
