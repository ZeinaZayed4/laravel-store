@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <div class="mb-5">
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary">Create</a>
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
                <th>Parent</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td></td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td><img src="{{ asset('storage/' . $category->image) }}" alt="" height="50px" width="60px"></td>
                <td>{{ $category->parent_name }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                        @csrf
                        <!-- Form method spoofing -->
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-red text-center">No Categories Found!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->withQueryString()->links() }}
    </div>
@endsection
