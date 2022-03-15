@extends('master.profile')

@section('profile-content')
    @include('includes.flash.error')
    @include('includes.flash.success')

    <h1 class="my-3">Banned Account</h1>

    <div class="alert alert-danger text-center">
        You have been banned until {{ $until }}.
    </div>

@stop