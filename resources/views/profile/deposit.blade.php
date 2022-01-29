@extends('master.profile')
@section('page_title', 'Deposit')

@section('profile-content')
    @include('includes.flash.error')
    @include('includes.flash.success')

    <div class="rounded-md bg-gray-900 px-3 py-2">
        <h1 class="my-3 text-2xl">
            <i class="mr-2  far fa-money-bill-alt"></i>
            Deposit
        </h1>

        <h3 class="mt-2">Generate Deposit Address</h3>
        <div class="row mt-2">
            <div class="col-md-12">
                <form action="{{ route('profile.deposit.getAddress') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        
                        <div class="col-md-6">
                            <select name="coin" id="coin" class="appearance-none w-full rounded-md shadow-md bg-gray-700 px-3 text-gray-400 h-10 cursor-pointer  border-indigo-400 border-opacity-50 focus:border-2 form-control-md d-flex" value="xmr"
                            >
                                <!-- <option>Coin</option> -->
                                @foreach(config('coins.coin_list') as $supportedCoin => $instance)
                                    @if($history->isNotEmpty() && $history[0]->status == 0 && $history[0]->coin == $supportedCoin) 
                                    <option selected value="{{ $supportedCoin }}">{{ strtoupper(\App\Address::label($supportedCoin)) }}</option>
                                    @else
                                    <option value="{{ $supportedCoin }}">{{ strtoupper(\App\Address::label($supportedCoin)) }}</option>
                                    @endif                            
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 ">
                            <button class="w-full rounded-md shadow-md text-sm bg-gray-900 px-3 text-gray-400 h-10 border-indigo-400 bg-opacity-50 border-opacity-50 border-2 hover:bg-indigo-400 hover:text-white transition-colors duration-200">Generate Address</button>
                        </div>
                        <div class="col-md-12 mt-4">
                            <input type="text" class="form-control form-control-md d-flex" name="address" id="address" placeholder="Here will be address to deposit" readonly
                            value="@if($history->isNotEmpty() && $history[0]->status == 0){{$history[0]->address}}@endif">
                        </div>

                    </div>
                </form>
                <br>
                <p class="text-muted">Once click GENERATE button, you will get a address to deposit.On this address you will receive coin from deposit! Funds will be charged to your account!</p>

                

                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 p-0">
                <h3 class="mt-4 col-md-12 text-2xl"><i class="fa fa-history mr-2"></i>Deposit History
                    <!-- <button style="float: right;" class="btn  btn-outline-danger"><i class="fa fa-trash"></i></button> -->
                    <a href="{{route('profile.deposit')}}" class="mr-2 btn btn-outline-success" style="float: right;"><i class="fa fa-refresh">&#xf021;</i></a>
                </h3>
                @if($history -> isNotEmpty())
                <div class="bg-gray-900 rounded-md shadow-md mt-3">
                    <div class="p-1 bg-gray-800 rounded-t-md flex">
                        <div class="ml-2 text-gray-500 font-semibold col-md-3">Date</div>
                        <div class="ml-2 text-gray-500 text-left col-md-4">Address</div>
                        <div class="ml-2 text-gray-500 text-center col-md-1">Coin</div>
                        <div class="ml-2 text-gray-500 text-right col-md-2">Amount</div>
                        <div class="ml-2 text-gray-500 text-center col-md-2">Action</div>
                    </div>
                    @foreach($history as $key => $deposit)

                    <div class="p-1 flex border-gray-850 @if(!$loop->last) border-dashed border-b @endif">
                        <div class="ml-2 text-gray-500 col-md-3">{{$deposit->updated_at}}</div>
                        <div class="ml-2 text-gray-500 text-left col-md-4">
                            @if($deposit->status)
                            {{substr(base64_decode($deposit->address), 0,7)}}...{{substr(base64_decode($deposit->address), -7,strlen($deposit->address))}}
                            @else
                            {{substr($deposit->address, 0,7)}}...{{substr($deposit->address, -7,strlen($deposit->address))}}
                            @endif
                        </div>
                        <div class="ml-2 text-gray-500 text-center col-md-1">
                            <span class="badge badge-info">{{strtoupper($deposit->coin)}}</span>
                        </div>
                        <div class="ml-2 text-gray-500 text-sm text-right col-md-2">
                            {{$deposit->balance}}
                        </div>
                        <div class="ml-2 text-gray-500 text-sm text-center col-md-2">
                            @if($deposit->balance > 0 && $deposit->status == 0)
                            <a href="{{ route('profile.deposit.add', $deposit->id) }}" class="btn btn-primary btn-md"><i class="fa fa-plus mr-1"></i>Deposit</a>
                            @else
                            <a href="{{ route('profile.deposit.delete', $deposit->id) }}" class="btn btn-danger btn-sm text-sm"><i class="fa fa-trash mr-1"></i>Delete</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-3 ml-2">
                        {{ $history -> links() }}
                    </div>

                </div>
                @else
                <div class="alert text-center alert-warning">Your Deposit history is empty!</div>
                @endif
            </div>
        </div>
    </div>
@stop