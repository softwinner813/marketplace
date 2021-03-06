@extends('master.confirmation')

@section('confirmation-title', 'Mark the purchase as Sent - ' . $sale-> short_id)

@section('confirmation-content')
	<div class="alert alert-warning text-center">
	    This action can not be undone! Please Confirm that you have sent <strong>{{ $sale -> offer -> product -> name }}</strong> in quantity of <em>{{ $sale -> quantity }}</em>
	    <br>
	    Purchase ID: {{ $sale -> short_id }}
	</div>

@endsection

@section('confirmation-back', $backRoute)
@section('confirmation-next', route('profile.sales.sent', $sale))