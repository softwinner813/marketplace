@extends('master.confirmation')

@section('confirmation-title', 'Mark the Order as Delivered - ' . $purchase-> short_id)

@section('confirmation-content')
	<div class="alert alert-warning text-center">
	    This action can not be undone! Please Confirm that <strong>{{ $purchase -> offer -> product -> name }}</strong> in quantity of <em>{{ $purchase -> quantity }}</em> has been delivered to you!
	    <br>
	    Purchase ID: {{ $purchase -> short_id }}
	</div>
@endsection

@section('confirmation-back', $backRoute)
@section('confirmation-next', route('profile.purchases.delivered', $purchase))