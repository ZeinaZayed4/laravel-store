@extends('layouts.dashboard')

@section('title', $category->name)

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">{{ $category->name }}</li>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Image</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $products = $category->products()->with('store')->paginate(5);
            @endphp
            @forelse($products as $product)
                <tr>
                    <td></td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ $product->image }}" alt="" height="50px" width="60px"></td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-red text-center">No Product Found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->withQueryString()->links() }}
    </div>
@endsection
