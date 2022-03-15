@extends('master.main2')


@section('title','Mnemonic')

@section('content')

    <div class="row mt-5 ">
        <div class="col-md-6 offset-md-3 px-4 py-3 rounded shadow rounded-md bg-gray-800 shadow-md p-6 mt-4">
            <h2>Mnemonic Phrase</h2>


            <div class="mt-3">
                <div class="form-group">
                    <p>
                        The following words are your Mnemonic Phrase. It consists of {{config('marketplace.mnemonic_length')}} words.
                        Please write
                        the words down in the correct order. This is the only time that they will be shown to you, and without the words you cannot recover
                        your account
                        in case you lose your password.
                    </p>
                </div>
                <div class="form-group">
                    <textarea name="" id="" cols="30" rows="10" readonly class="form-control">{{$mnemonic}}</textarea>
                </div>
                <div class="form-group text-center">
                    <a href="{{route('auth.signin')}}" class="btn btn-warning">Click here to Sign In</a>
                </div>
            </div>

        </div>
    </div>


@stop