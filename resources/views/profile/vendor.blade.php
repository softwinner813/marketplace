@extends('master.profile')

@section('title', 'Vendor Settings')
@section('page_title', 'Vendor Settings')

@section('profile-content')
    @include('includes.flash.success')
    @include('includes.flash.error')
    @include('includes.flash.invalid')

    @vendor
        {{-- Vendor Display --}}

        @include('includes.profile.vendor.experience')

        @include('includes.profile.vendor.editprofile')

        @include('includes.profile.vendor.addproduct')

        @include('includes.profile.vendor.products')
    @else
        {{-- Non vendor display --}}

        <div class="rounded-md bg-gray-900 px-3 py-2">
            <h3>Become A Vendor</h3>
            <hr>
            <div class="alert alert-warning text-center my-2">You currently do not have Vendor status yet. Become A Vendor to sell products
                on this marketplace.
            </div>
            <div class="text-center">
                <a href="{{ route('profile.vendor.become') }}" class="btn btn-outline-success btn-md">Become A Vendor</a>
            </div>
            
        </div>

    @endvendor

@stop