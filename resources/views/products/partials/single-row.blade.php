<tr class="hover:bg-gray-50">
    <td class="px-6 py-4 font-medium text-gray-800">{{ $p->name }}</td>

    <td class="px-6 py-4">
        @if($p->category)
            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">
                {{ $p->category->name }}
            </span>
        @else
            <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm">Aucune</span>
        @endif
    </td>

    <td class="px-6 py-4 text-green-700 font-semibold">
        {{ number_format($p->price, 2) }} DT
    </td>

    <td class="px-6 py-4">
        @if($p->stock > 10)
            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">{{ $p->stock }}</span>
        @elseif($p->stock > 0)
            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">{{ $p->stock }}</span>
        @else
            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm">Rupture</span>
        @endif
    </td>

    <td class="px-6 py-4 text-gray-600 text-sm">
        {{ $p->created_at->format('Y-m-d') }}
    </td>

    <!-- ACTIONS ICONS -->
    <td class="px-6 py-4 text-center">
        <div class="flex justify-center gap-2">
            <!-- VOIR -->
            <a href="{{ route('products.show', $p->id) }}"
               class="flex items-center justify-center w-9 h-9 bg-orange-100 text-orange-600 rounded-lg hover:bg-orange-200 transition"
               aria-label="Voir le produit {{ $p->name }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
            </a>

            <!-- EDIT -->
            <a href="{{ route('products.edit', $p->id) }}"
               class="flex items-center justify-center w-9 h-9 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition"
               aria-label="Modifier le produit {{ $p->name }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20h9"/>
                    <path d="M16.5 3.5a2.1 2.1 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                </svg>
            </a>

            <!-- DELETE -->
            <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="flex items-center justify-center w-9 h-9 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition"
                        aria-label="Supprimer le produit {{ $p->name }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 21 6"/>
                        <path d="M19 6l-1 14H6L5 6"/>
                        <path d="M10 11v6"/>
                        <path d="M14 11v6"/>
                        <path d="M9 6V4h6v2"/>
                    </svg>
                </button>
            </form>
        </div>
    </td>
</tr>
