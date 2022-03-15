@extends('master.main')

@section('title','Product Clone')

@section('content')

    <div class="modal fade in show position-static d-block" tabindex="-1" role="dialog">
        <form action="{{route('profile.vendor.product.clone.post',$product)}}" method="post">
            {{csrf_field()}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product Listing Cloning - {{$product->name}}</h5>

                    </div>
                    <div class="modal-body">
                        Note: Cloning a listing will also duplicate all of the offers and pictures. Please confirm the Product Cloning.
                    </div>
                    <div class="modal-footer text-center justify-content-center">
                        <button type="submit" class="btn btn-success">Confirm</button>
                        <a href="{{route('profile.vendor')}}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>

        </form>
    </div>

@stop