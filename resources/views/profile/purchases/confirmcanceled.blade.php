@extends('master.confirmation')

@section('confirmation-title', 'Mark the purchase as canceled - ' . $sale-> short_id)

@section('confirmation-content')
	<div class="alert alert-warning text-center">
	    This action can not be undone! Please Confirm that you really want to mark this purchase as canceled. <strong>{{ $sale -> offer -> product -> name }}</strong> in quantity of <em>{{ $sale -> quantity }}</em>
	    <br>
	    Purchase ID: {{ $sale -> short_id }}
	</div>

@endsection

@section('confirmation-back', $backRoute)
@section('confirmation-next', route('profile.purchases.canceled', $sale))