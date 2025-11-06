@extends('layouts.dashboard')

@section('title', 'Trashed Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Categories</li>
    <li class="breadcrumb-item active">Trash</li>
@endsection

@section('content')
    <div class="mb-5">
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
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
                <th>Status</th>
                <th>Deleted At</th>
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
                <td>{{ $category->status }}</td>
                <td>{{ $category->deleted_at }}</td>
                <td>
                    <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-outline-info">Restore</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Force Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-red text-center">No Categories Found!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->withQueryString()->links() }}
    </div>
@endsection
