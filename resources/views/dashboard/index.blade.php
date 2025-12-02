@extends('layouts.app')

@section('content')

<h2 class="fw-bold mb-4 text-primary">📊 Tableau de Bord</h2>

<!-- STAT CARDS -->
<div class="row g-4">

    <div class="col-md-4">
        <div class="p-4 shadow-sm bg-white rounded position-relative overflow-hidden">
            <span class="fw-bold text-primary">Produits</span>
            <h2 class="fw-bold mt-2">{{ $productsCount }}</h2>
            <div class="position-absolute end-0 bottom-0 opacity-25">
                <svg width="90" height="90"><circle cx="45" cy="45" r="40" fill="#0d6efd"/></svg>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-4 shadow-sm bg-white rounded position-relative overflow-hidden">
            <span class="fw-bold text-success">Catégories</span>
            <h2 class="fw-bold mt-2">{{ $categoriesCount }}</h2>
            <div class="position-absolute end-0 bottom-0 opacity-25">
                <svg width="90" height="90"><circle cx="45" cy="45" r="40" fill="#198754"/></svg>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-4 shadow-sm bg-white rounded position-relative overflow-hidden">
            <span class="fw-bold text-warning">Total Général</span>
            <h2 class="fw-bold mt-2">{{ $productsCount + $categoriesCount }}</h2>
            <div class="position-absolute end-0 bottom-0 opacity-25">
                <svg width="90" height="90"><circle cx="45" cy="45" r="40" fill="#ffc107"/></svg>
            </div>
        </div>
    </div>

</div>

<!-- CHARTS -->
<div class="row mt-5 g-4">

    <div class="col-md-6">
        <div class="bg-white rounded shadow-sm p-4">
            <h5 class="fw-bold mb-3">📦 Produits vs Catégories</h5>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div class="bg-white rounded shadow-sm p-4">
            <h5 class="fw-bold mb-3">🧭 Répartition</h5>
            <canvas id="donutChart"></canvas>
        </div>
    </div>

</div>

<!-- LAST TABLES -->
<div class="row mt-5 g-4">

    <div class="col-md-6">
        <div class="bg-white shadow-sm rounded p-4">
            <h5 class="fw-bold mb-3">🆕 Derniers Produits</h5>
            <table class="table table-sm">
                <thead class="bg-light">
                <tr><th>Nom</th><th>Prix</th></tr>
                </thead>
                <tbody>
                @foreach($lastProducts as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }} DT</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">Voir tous</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="bg-white shadow-sm rounded p-4">
            <h5 class="fw-bold mb-3">🆕 Dernières Catégories</h5>
            <table class="table table-sm">
                <thead class="bg-light">
                <tr><th>Nom</th><th>Slug</th></tr>
                </thead>
                <tbody>
                @foreach($lastCategories as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->slug }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('categories.index') }}" class="btn btn-success btn-sm">Voir toutes</a>
        </div>
    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // PIE CHART
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: ['Produits', 'Catégories'],
            datasets: [{
                data: [{{ $productsCount }}, {{ $categoriesCount }}],
                backgroundColor: ['#0d6efd', '#198754']
            }]
        }
    });

    // DONUT
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: ['Produits', 'Catégories'],
            datasets: [{
                data: [{{ $productsCount }}, {{ $categoriesCount }}],
                backgroundColor: ['#0d6efd', '#ffc107']
            }]
        }
    });
</script>

@endsection
