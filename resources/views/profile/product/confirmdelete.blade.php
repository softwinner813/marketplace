@extends('master.confirmation')

@section('confirmation-title', 'Delete ' . $product -> name)

@section('confirmation-content')
    This action can not be undone! Please Confirm that you are permanently deleting the product <strong>{{ $product -> name }}</strong>? All products offers, delivery options and pictures will be permanently deleted as well!
@endsection

@section('confirmation-back', route('profile.vendor'))
@section('confirmation-next', route('profile.vendor.product.remove', $product -> id))