@extends('master.profile')

@section('page_title', 'PGP Key')
@section('profile-content')
    @include('includes.flash.success')

    <div class="row">
   <!--      <div class="col-md-12">
            <h2 class="mb-3"><i class="fas fa-key"></i> PGP keys</h2>
        </div> -->
        <div class="col-md-6 rounded-md bg-gray-900 px-3 py-2">
            <h4 class="mb-3"><i class="fa fa-key mr-2"></i>Your PGP Key</h4>
            <hr>

            @if(auth() -> user() -> hasPGP())
                <p>Your current PGP Key is:</p>
                <textarea class="disabled form-control" style="resize: none" rows="10" disabled>{{{ auth() -> user() -> pgp_key }}}</textarea>
            @else
                <div class="alert alert-warning text-center my-3">
                    You currently do not have a PGP Key set! Please add your PGP key in the form below.
                </div>
            @endif
            <p><a href="{{ route('profile.pgp.old') }}" class="text-dark"><i class="fa fa-key mr-2"></i>Your Old PGP Keys</a></p>

        </div>
        <div class="col-md-6">
            <div class="col-md-12 rounded-md bg-gray-900 px-3 py-2">
                <h4 class="mb-3">Set a New PGP Key</h4>
                <hr>

                <form method="POST" action="{{ route('profile.pgp.post') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="newpgp">Enter your new PGP Key:</label>
                        <textarea name="newpgp" id="newpgp" style="resize: none" rows="10" class="form-control @error('newpgp', $errors) is-invalid @enderror"></textarea>
                        @error('newpgp', $errors)
                        <div class="invalid-feedback">
                            {{ $errors -> first('newpgp') }}
                        </div>
                        @enderror
                        <p class="text-muted">Paste your PGP Key here, and after you submit your PGP Key you will need to decrypt the message and enter your Verification Code.</p>
                    </div>
                    <div class="form-group text-center">
                        <button class="w-full rounded-md shadow-md text-sm bg-gray-900 px-3 text-gray-400 h-10 border-indigo-400 bg-opacity-50 border-opacity-50 border-2 hover:bg-indigo-400 hover:text-white transition-colors duration-200" type="submit">Add PGP</button>
                    </div>

                </form>
            </div>
        </div>
    </div>




@stop