@extends('layouts.app')
@section('content')
<h2>Menu</h2>
<div class="row">
    @foreach($menus as $menu)
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $menu->name }}</h5>
                <p class="card-text">{{ $menu->description }}</p>
                <p><strong>Category:</strong> {{ $menu->category }}</p>
                <p><strong>Price:</strong> RM {{ $menu->price }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
