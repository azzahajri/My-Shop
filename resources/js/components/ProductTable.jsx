import React, { useState, useEffect } from 'react';

export default function ProductTable() {
    const [products, setProducts] = useState([]); // stockage des produits
    const [search, setSearch] = useState(''); // texte de recherche

    // Cette fonction va chercher les produits depuis Laravel
    useEffect(() => {
        fetch(`/api/products?search=${search}`)
            .then(res => res.json())
            .then(data => setProducts(data));
    }, [search]); // chaque fois que search change, on refait fetch

    return (
        <div className="container py-5">
            <h2 className="text-3xl font-bold mb-4">Liste des Produits</h2>

            {/* Input de recherche */}
            <input
                type="text"
                placeholder="Tapez pour rechercher..."
                value={search}
                onChange={e => setSearch(e.target.value)}
                className="w-full px-4 py-2 border rounded mb-4"
            />

            {/* Tableau */}
            <table className="min-w-full divide-y divide-gray-200">
                <thead className="bg-gray-100">
                    <tr>
                        <th className="px-4 py-2">Nom</th>
                        <th className="px-4 py-2">Catégorie</th>
                        <th className="px-4 py-2">Prix</th>
                        <th className="px-4 py-2">Stock</th>
                        <th className="px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    {products.length > 0 ? (
                        products.map(p => (
                            <tr key={p.id} className="hover:bg-gray-50">
                                <td className="px-4 py-2">{p.name}</td>
                                <td className="px-4 py-2">{p.category?.name || 'Aucune'}</td>
                                <td className="px-4 py-2">{parseFloat(p.price).toFixed(2)} DT</td>
                                <td className="px-4 py-2">{p.stock}</td>
                                <td className="px-4 py-2">{new Date(p.created_at).toLocaleDateString()}</td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="5" className="text-center py-4">Aucun produit trouvé</td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
}
