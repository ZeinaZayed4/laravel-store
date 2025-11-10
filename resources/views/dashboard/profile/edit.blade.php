@extends('layouts.dashboard')

@section('title', 'Edit Profile')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection

@section('content')
    <x-alert type="success" />

    <form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-row mb-3">
            <div class="col-md-6">
                <x-form.input name="first_name" id="first_name" label="First Name" :value="$user->profile->first_name" />
            </div>
            <div class="col-md-6">
                <x-form.input name="last_name" id="last_name" label="Last Name" :value="$user->profile->last_name" />
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-md-6">
                <x-form.input type="date" name="birthday" id="birthday" label="Birthday" :value="$user->profile->birthday" />
            </div>
            <div class="col-md-6">
                <x-form.radio name="gender" label="Gender"
                              :options="['male' => 'Male', 'female' => 'Female']"
                              :selected="$user->profile->gender"/>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-md-4">
                <x-form.input name="street_address" id="street_address" label="Street Address" :value="$user->profile->street_address" />
            </div>
            <div class="col-md-4">
                <x-form.input name="city" id="city" label="City" :value="$user->profile->city" />
            </div>
            <div class="col-md-4">
                <x-form.input name="state" id="state" label="State" :value="$user->profile->state" />
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-md-4">
                <x-form.input name="postal_code" id="postal_code" label="Postal Code" :value="$user->profile->postal_code" />
            </div>
            <div class="col-md-4">
                <x-form.select name="country" label="Country" id="country"
                               :options="$countries"
                               :value="$user->profile->country" />
            </div>
            <div class="col-md-4">
                <x-form.select name="locale" label="Locale" id="locale"
                               :options="$locales"
                               :value="$user->profile->locale" />
            </div>
        </div>
        <x-form.button class="mt-2">Update</x-form.button>
    </form>
@endsection

