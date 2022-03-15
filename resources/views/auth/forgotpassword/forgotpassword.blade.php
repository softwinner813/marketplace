@extends('master.main2')


@section('title','Forgot Password')

@section('content')

    <div class="row mt-5 justify-content-center " >
        <div class="col-md-4 text-center px-4 py-3 rounded shadow rounded-md bg-gray-800 shadow-md p-6 mt-4">
            <h2>Forgot your password?</h2>
            <div class="alert alert-warning">
                Note: Your previous messages encrypted with your old password will be unreadable after reseting your password.
            </div>
            <div class="mt-3">
                <p>Please choose a recovery method</p>

                <form method="GET" action="/forgotpassword/pgp">
                    <div class="form-group text-center">
                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary btn-block">PGP Key</button>
                        </div>
                    </div>
                </form>

                <form method="GET" action="/forgotpassowrd/mnemonic">
                    <div class="form-group text-center">
                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary btn-block">Mnemonic Phrase</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop