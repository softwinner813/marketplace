@extends('master.profile')

@section('profile-content')

    @include('includes.flash.error')

    <h1 class="mt-5 mb-3">Confirm your PGP Key:</h1>
    <hr>
    <div class="form-group">
        <label for="decrypt_message">Decrypt the following message:</label>
        <textarea name="decrypt_message" id="decrypt_message" class="form-control " rows="10" style="resize: none;"  readonly>{{{ session() -> get(\App\Marketplace\PGP::NEW_PGP_ENCRYPTED_MESSAGE) }}}</textarea>
        <p class="text-muted">Decrypt this message and get your Verification Code.</p>
    </div>
    <form method="POST" action="{{ route('profile.pgp.store') }}" class="form-inline">
        {{ csrf_field() }}
        <label for="validation_number">Enter the PGP Verification Code:</label>
        <input type="number" class="form-control mx-2" required name="validation_number" id="validation_number"/>
        <button class="btn btn-outline-success">Submit PGP Code</button>

    </form>
@stop