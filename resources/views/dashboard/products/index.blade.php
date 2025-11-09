@extends('layouts.dashboard')

@section('title', 'Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-outline-primary">Create</a>
    </div>

    <x-alert type="success" />
    <x-alert type="info" />

    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.input
            name="name"
            placeholder="Clothes"
            class="mx-2"
            :value="request('name')"
        />
        <x-form.select
            name="status"
            id="status"
            placeholder="All"
            :options="['active' => 'Active', 'archived' => 'Archived']"
            class="mx-2"
        />
        <x-form.button class="mx-2">Filter</x-form.button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td></td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td><img src="{{ $product->image }}" alt="" height="50px" width="60px"></td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                        @csrf
                        <!-- Form method spoofing -->
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-red text-center">No Products Found!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->withQueryString()->links() }}
    </div>
@endsection
