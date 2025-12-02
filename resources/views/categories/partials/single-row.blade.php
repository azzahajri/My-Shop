<tr class="hover:bg-gray-50 transition">
    <!-- Nom de la catégorie -->
    <td class="px-6 py-4 text-gray-700 text-sm font-medium">{{ $c->name }}</td>

    <!-- Slug -->
    <td class="px-6 py-4 text-gray-500 text-sm">{{ $c->slug }}</td>

    <!-- Actions (EDIT + DELETE) -->
    <td class="px-6 py-4 text-center flex justify-center gap-2">
        <!-- EDIT -->
        <a href="{{ route('categories.edit', $c->id) }}"
           class="flex items-center justify-center w-9 h-9 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition"
           aria-label="Modifier la catégorie {{ $c->name }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20h9"/>
                <path d="M16.5 3.5a2.1 2.1 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
            </svg>
        </a>

        <!-- DELETE -->
        <form action="{{ route('products.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Supprimer cette catégorie ?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="flex items-center justify-center w-9 h-9 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition"
                    aria-label="Supprimer la catégorie {{ $c->name }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 21 6"/>
                    <path d="M19 6l-1 14H6L5 6"/>
                    <path d="M10 11v6"/>
                    <path d="M14 11v6"/>
                    <path d="M9 6V4h6v2"/>
                </svg>
            </button>
        </form>
    </td>
</tr>
