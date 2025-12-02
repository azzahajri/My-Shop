<div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">

    <table class="min-w-full divide-y divide-gray-200">

        <thead class="bg-gray-100">
            <tr>
                <th class="px-9 py-4">Nom</th>
                <th class="px-9 py-4">Catégorie</th>
                <th class="px-9 py-4">Prix</th>
                <th class="px-9 py-4">Stock</th>
                <th class="px-9 py-4">Date</th>
                <th class="px-9 py-4 text-center" colspan="3">Actions</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-100">
            @foreach($products as $p)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $p->name }}</td>
                <td class="px-6 py-4">
                    @if($p->category)
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">
                            {{ $p->category->name }}
                        </span>
                    @else
                        <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm">Aucune</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-green-700 font-semibold">{{ number_format($p->price, 2) }} DT</td>
                <td class="px-6 py-4">
                    @if($p->stock > 10)
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">{{ $p->stock }}</span>
                    @elseif($p->stock > 0)
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">{{ $p->stock }}</span>
                    @else
                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Rupture</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-600 text-sm">{{ $p->created_at->format('Y-m-d') }}</td>

                <td class="px-6 py-4 text-center">
                    <a href="{{ route('products.show', $p->id) }}" class="px-4 py-2 bg-orange-600 text-white rounded-lg">Voir</a>
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ route('products.edit', $p->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Modifier</a>
                </td>
                <td class="px-6 py-4 text-center">
                    <form method="POST" action="{{ route('products.destroy', $p->id) }}">
                        @csrf @method('DELETE')
                        <button class="px-4 py-2 bg-red-600 text-white rounded-lg">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>

<div class="mt-6 flex justify-center">
    {{ $products->links() }}
</div>
