@if(count($products) > 0)
    @foreach($products as $item)
        <div class="card m-2 p-2" style="width: 20rem;">
            <h5>{{ $item->name }}</h5>
            <p>{{ $item->description }}</p>
            <span class="badge bg-primary">{{ $item->price }} DT</span>
        </div>
    @endforeach
@else
    <p class="text-danger">No results found...</p>
@endif
