@extends('master.main')

@section('title','Home Page')
@section('page_title','Home')

@section('content')

<div class="row">
    <style>
        @media screen and (max-width : 900px) {
            .bg-none-md {
                background-color: transparent !important;
            }
        }
    </style>
    <div class="col-lg-3 col-md-4 col-sm-12">
        @auth
        <div class="mb-2 rounded-md bg-gray-900 px-3 py-2">
            <header class="flex items-center mt-2"> <span class="text-gray-400 text-sm flex"><i class="gg-profile icon-normal mr-2"></i>Your Profile</span> </header>
            <div class=" mb-2 bg-gray-800 rounded-md sm:flex-row relative mt-2">
                <div class="py-3 px-3">
                    <table class="w-100">
                        <tr >
                            <!-- <td class="text-light "><i class="fa fa-user"></i>Name:</td> -->
                            <td class="flex ">
                                <label class="text-left text-2xl font-mono text-light">{{auth()->user()->username}}</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="leading-tight font-mono  text-gray-500">Joined:</td>
                            <td class="text-right ">
                                <span class="leading-tight font-mono   text-light ">
                                    {{Date('Y.m.d', strtotime(auth()->user()->created_at)) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="leading-tight font-mono  text-gray-500">Total Orders:</td>
                            <td class="text-right ">
                                <span class="leading-tight font-mono   text-light ">
                                    {{count(auth()->user()->purchases) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="leading-tight font-mono  text-gray-500">Trust Level:</td>
                            <td class="text-right"><span class="badge badge-success">Level 1</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endauth
        @include('includes.categories')
        <div class="mb-2 rounded-md bg-gray-900 px-3 py-2 mt-3">
            <div class=" overflow-auto">
                <header class="flex items-center mt-2 mb-2"> 
                    <span class="text-gray-400 text-sm flex">
                        <i class="fa fa-link mr-2"></i>Official Mirrors
                    </span> 
                </header>

                @foreach(config('marketplace.mirrors') as $mirror)
                <a href="{{$mirror}}">
                    <label for="new" class=" text-sm rounded-md bg-gray-800 text-gray-500 duration-200 transition-colors hover:text-gray-400 border-gray-800 border-2 hover:border-opacity-50 hover:border-indigo-400 shadow-md py-1 px-3 w-full flex cursor-pointer  " style="display: flex; justify-content: space-between; ">
                        <span class="flex"> <i class="fa fa-link mr-2"></i>{{$mirror}}</span>
                    </label>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-12 rounded-md bg-gray-900 px-3 py-2 m-3  m-md-0">

        <div class="row">
            <div class="col">
                <h1 class=" text-center bg-none-md py-2 font-mono text-gray-400">Welcome to {{config('app.name')}}</h1>
                <!-- <hr> -->
            </div>
        </div>
        <div class="px-3">

            <div class="row">
                <div class="col font-mono">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid cupiditate dolore enim et
                    eveniet fugiat illum ipsum itaque minus molestias nihil optio porro quisquam quo saepe sunt velit
                    veritatis.
                </div>
            </div>
            
            
            @isModuleEnabled('FeaturedProducts')
            @include('featuredproducts::frontpagedisplay')
            @endisModuleEnabled

            <div class="row mt-4">

                <div class="col-md-4">
                    <h4>
                        <i class="fa fa-users mr-2"></i>
                        Top Vendors
                    </h4>
                    <hr>
                    @foreach(\App\Vendor::topVendors() as $vendor)
                    <a href="{{route('vendor.show',$vendor)}}" style="text-decoration: none; color:#212529">
                        <label for="new" class=" text-sm rounded-md bg-gray-800 text-gray-500 duration-200 transition-colors hover:text-gray-400 border-gray-800 border-2 hover:border-opacity-50 hover:border-indigo-400 shadow-md py-1 px-3 w-full flex cursor-pointer  " style="display: flex; justify-content: space-between; ">
                            <span class="flex"> <i class="gg-profile icon-normal mr-2"></i>{{$vendor->user->username}}</span>
                            <span class="badge @if($vendor->vendor->experience >= 0) badge-success @else badge-danger @endif">Level {{$vendor->getLevel()}}</span>
                        </label>
                    </a>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h4>
                        <i class="fas fa-shopping-cart mr-2"></i>Latest orders
                    </h4>
                    <hr>
                    @foreach(\App\Purchase::latestOrders() as $order)
                    <label for="new" class=" text-sm rounded-md bg-gray-800 text-gray-500 duration-200 transition-colors hover:text-gray-400 border-gray-800 border-2 hover:border-opacity-50 hover:border-indigo-400 shadow-md py-1 px-3 w-full flex cursor-pointer  " style="display: flex; justify-content: space-between; ">
                        <img class="img-fluid mr-2" height="23px" width="23px" src="{{ asset('storage/'  . $order->offer->product->frontImage()->image) }}" alt="{{ $order->offer->product->name }}">
                        <span class="">{{str_limit($order->offer->product->name,50,'...')}}</span>
                        <span class="text-right">Level {{$order->getSumLocalCurrency()}} {{$order->getLocalSymbol()}}</span>
                    </label>
                    @endforeach
                </div>

                <div class="col-md-4">
                    <h4>
                        <i class="fa fa-star mr-2"></i>Rising vendors
                    </h4>
                    <hr>
                    @foreach(\App\Vendor::risingVendors() as $vendor)
                    <label for="new" class=" text-sm rounded-md bg-gray-800 text-gray-500 duration-200 transition-colors hover:text-gray-400 border-gray-800 border-2 hover:border-opacity-50 hover:border-indigo-400 shadow-md py-1 px-3 w-full flex cursor-pointer  " style="display: flex; justify-content: space-between; ">
                        <span class="flex"> <i class="gg-profile icon-normal mr-2"></i><a href="{{route('vendor.show',$vendor)}}" style="text-decoration: none; color:#212529">{{$vendor->user->username}}</a></span>
                        <span class="badge @if($vendor->vendor->experience >= 0) badge-success @else badge-danger @endif">Level {{$vendor->getLevel()}}</span>
                    </label>
                    @endforeach
                </div>


            </div>


        </div>
    </div>

</div>

@stop