@extends('master.main2')


@section('title','Verify login')

@section('content')

    <div class="row mt-5 justify-content-center">
        <div class="col-md-6 text-center px-4 py-3 rounded shadow rounded-md bg-gray-800 shadow-md p-6 mt-4">
            @include('includes.flash.error')

            <h2>Sign In Verify</h2>
            <div class="form-group">
                <label>Decrypt the following message:</label>
                <textarea name="decrypt_message" class="form-control" rows="10" style="resize: none;" readonly>{{{ session() -> get('login_encrypted_message') }}}</textarea>
                <p class="text-muted">Decrypt this message, and copy and paste the verification code.</p>
            </div>
            <form method="POST" action="{{ route('auth.verify.post') }}" class="form-inline">
                {{ csrf_field() }}
                <label for="validation_string">Verification Code:</label>
                <input type="text" class="form-control mx-2" required name="validation_string" id="validation_string"/>
                <button class="btn btn-outline-success">Login</button>

            </form>



        </div>
    </div>


@stop