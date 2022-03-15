<div class="row">
    <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
        <div class="bg-gray-900 rounded-md shadow-md px-4 pt-3 pb-4">
            <header class="flex items-center"> <span class="text-gray-400 text-sm">Your Balance</span> </header>

            <div class="px-1 mt-6 mb-3  overflow-hidden" title="Bitcoin"> 
                <a href="#">
                    <div class="bg-gray-800 rounded-md flex">
                        <div class="bg-clip-border flex items-center justify-center flex-shrink-0 mt-4 ml-3 h-10 w-10 bg-cover"
                            style="background-image: url('/img/BTC.png')"></div>
                        <div
                            class="w-full flex flex-col pt-4 pb-6 sm:pb-4 px-6 border-b sm:border-b-0 sm:border-r border-gray-800 border-opacity-50">
                            <span class="text-gray-400 text-xl">
                               {{auth()->user()->btc_balance}}
                            </span> <span class="font-bold text-sm text-gray-600">
                                BTC
                            </span> </div>
                    </div>
                </a> 
            </div>

            <div class="px-1 mt-10 mb-3  overflow-hidden" title="XMR"> 
                <a href="#">
                    <div class="bg-gray-800 rounded-md flex">
                        <div class="bg-clip-border flex items-center justify-center flex-shrink-0 mt-4 ml-3 h-10 w-10 bg-cover"
                            style="background-image: url('/img/xmr_icon.png')"></div>
                        <div
                            class="w-full flex flex-col pt-4 pb-6 sm:pb-4 px-6 border-b sm:border-b-0 sm:border-r border-gray-800 border-opacity-50">
                            <span class="text-gray-400 text-xl">
                                {{auth()->user()->xmr_balance}}
                            </span> <span class="font-bold text-sm text-gray-600">
                                XMR
                            </span> </div>
                    </div>
                </a> 
            </div>

            <div class="px-1 mt-10 mb-2  overflow-hidden" title="USD"> 
                <a href="#">
                    <div class="bg-gray-800 rounded-md flex">
                        <div class="bg-clip-border flex items-center justify-center flex-shrink-0 mt-4 ml-3 h-10 w-10 bg-cover"
                            style="background-image: url('/img/USD.png')"></div>
                        <div
                            class="w-full flex flex-col pt-4 pb-6 sm:pb-4 px-6 border-b sm:border-b-0 sm:border-r border-gray-800 border-opacity-50">
                            <span class="text-gray-400 text-xl">
                                ${{auth()->user()->usd_balance}}
                            </span> <span class="font-bold text-sm text-gray-600">
                                USD
                            </span> </div>
                    </div>
                </a> 
            </div>
            
        </div>
    </div>
   
    <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
        <div class="bg-gray-900 rounded-md shadow-md px-4 pt-3 pb-4">
            <header class="flex items-center"> <span class="text-gray-400 text-sm">Exchange</span> </header>
            <form action="{{ route('profile.exchange.detail') }}" class="mt-6" method="POST" >
                {{ csrf_field() }}
                <div class="form-row flex" style="justify-content: flex-between;">
                    <div class="col-md-12 col-sm-12">
                        <label><i class="fa fa-coins mr-2"></i>Choose the currency to exchange</label>
                        <select name="coin" id="coin" class="appearance-none w-full rounded-md shadow-md bg-gray-700 px-3 text-gray-400 h-10 cursor-pointer mt-2 border-indigo-400 border-opacity-50 focus:border-2" value="btc">
                            <!-- <option>Coin</option> -->
                            @foreach(config('coins.coin_list') as $supportedCoin => $instance)
                            <option value="{{ $supportedCoin }}">{{ strtoupper(\App\Address::label($supportedCoin)) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                   <div class="col-md-12 text-center">
                        <header class="mt-1 text-center"> <span class="text-gray-400 text-sm">Exchange Rate</span> </header>
                        <div class="mt-2">
                                    <span class="text-gray-400 text-sm">
                                        $1.00
                                    </span> <span class="font-bold text-sm text-gray-600">
                                        USD
                                    </span> ~ 
                                    <span class="text-gray-400 text-sm">
                                        {{$usdToBtc}}
                                    </span> <span class="font-bold text-sm text-gray-600">
                                        BTC
                                    </span>
                        </div>
                        <div class="mt-2">
                                    <span class="text-gray-400 text-sm">
                                        $1.00
                                    </span> <span class="font-bold text-sm text-gray-600">
                                        USD
                                    </span> ~ 
                                    <span class="text-gray-400 text-sm">
                                        {{$usdToXmr}}
                                    </span> <span class="font-bold text-sm text-gray-600">
                                        XMR
                                    </span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label><i class="fa fa-coins mr-2"></i>Enter amount to exchange</label>
                        <input type="number" step="0.00001" max="100.0" min="0.0001"
                            class="appearance-none w-full rounded-md shadow-md bg-gray-700 px-3 text-gray-400 h-10 cursor-pointer mt-2 border-indigo-400 border-opacity-50 focus:border-2" name="balance" id="balance" placeholder="Enter Dollar ($) amount:"
                            value="">
                    </div>
                    
                    <div class="col-md-12 mt-10 ">
                        <button class="btn btn-block btn-success btn-md">
                            <i class="mr-2 fas fa-exchange-alt"></i> EXCHANGE</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>

