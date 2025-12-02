@forelse($products as $p)
    @include('products.partials.single-row', ['p' => $p])
@empty
    <tr>
        <td colspan="8" class="p-4 text-center">Aucun produit trouvé</td>
    </tr>
@endforelse
