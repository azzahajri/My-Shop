@forelse($categories as $c)
    @include('categories.partials.single-row', ['c' => $c])
@empty
    <tr>
        <td colspan="8" class="p-4 text-center">Aucun category trouvé</td>
    </tr>
@endforelse
