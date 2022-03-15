<div class="col-md-6 mt-3">
    <div class="col-md-12  h-full w-full  shadow-md pt-4 pb-3 rounded-md bg-gray-800 text-gray-500 duration-200 transition-colors hover:text-gray-400">
        <h3 class="mb-2"><i class="far fa-credit-card mr-2"></i>Payment</h3>
        <hr>

        <div style="display: flex; flex-direction: column; justify-content: space-between; height: 280px;" class="w-full">
            <div class="w-full" style="display: flex;  justify-content: space-between;">
               <label class="">To Pay:</label> 
               <label class="">
                    @if($purchase -> isDelivered())
                        <span class="badge badge-success">Paid</span>
                    @elseif($purchase -> isCanceled())
                        <span class="badge badge-secondary">Canceled</span>
                    @elseif($purchase -> isDisputed() && $purchase -> dispute -> isResolved())
                        <span class="badge badge-success">Resolved</span>
                    @else
                        {{ $purchase -> coin_sum }} <span class="badge badge-info">{{ $purchase -> coin_label }}</span>
                    @endif
               </label>
            </div>
            <div class="w-full" style="display: flex;  justify-content: space-between;">
                <label class="">{{$purchase -> coin_label}} balance:</label> 
                <label>
                    @if($purchase -> isDelivered())
                        <span class="badge badge-success">Paid</span>
                    @elseif($purchase -> isCanceled())
                        <span class="badge badge-secondary">Canceled</span>
                    @elseif($purchase -> isDisputed() && $purchase -> dispute -> isResolved())
                        <span class="badge badge-success">Resolved</span>
                    @else
                        @if($purchase -> coin_balance == 'unavailable')
                            <span class="badge badge-danger">{{ $purchase -> coin_balance }}</span>
                        @else
                            {{ $purchase -> coin_balance }} <span class="badge badge-info">{{ $purchase -> coin_label }}</span>
                        @endif
                        @if($purchase -> enoughBalance()) <span class="badge badge-success">enough</span> @endif
                    @endif
                </label>
            </div>
            <div class="w-full" style="display: flex;  justify-content: space-between;">
                <label class="">Status:</label> 
                <div class="btn-group">
                    <span class="btn disabled btn-sm @if($purchase -> isPurchased()) btn-primary @else btn-outline-secondary @endif">Purchased</span>
                    @if($purchase->type=='normal')
                    <span class="btn disabled btn-sm @if($purchase -> isSent()) btn-primary @else btn-outline-secondary @endif">Sent</span>
                    @endif
                    <span class="btn disabled btn-sm @if($purchase -> isDelivered()) btn-primary @else btn-outline-secondary @endif">Delivered</span>
                    <span class="btn disabled btn-sm @if($purchase -> isDisputed()) btn-danger @else btn-outline-secondary @endif">Disputed</span>
                    <span class="btn disabled btn-sm @if($purchase -> isCanceled()) btn-danger @else btn-outline-secondary @endif">Canceled</span>
                </div>
            </div>
            <div class="w-full" style="display: flex;  justify-content: space-between;">
                <label>Type:</label>
                <label>{{ \App\Purchase::$types[$purchase->type] }}</label>
            </div>
            <div class="w-full" style="display: flex;  justify-content: space-between;">
                @if($purchase->isPurchased())
                    <a href="{{ route('profile.purchases.canceled.confirm', $purchase) }}"
                       class="btn btn-outline-danger"><i class="fas fa-window-close mr-1"></i> Cancel purchase</a>
                @endif


                @if($purchase->type == 'normal' && $purchase -> isPurchased() && $purchase -> isVendor())
                    <a href="{{ route('profile.sales.sent.confirm', $purchase) }}"
                       class="btn btn-outline-mblue"><i class="fas fa-clipboard-check mr-2"></i> Mark as
                        Sent</a>
                @endif

                 @if($purchase->type == 'normal' && $purchase -> isSent() && $purchase -> isBuyer())
                    <a href="{{ route('profile.purchases.delivered.confirm', $purchase) }}"
                       class="btn btn-outline-success"><i class="fas fa-clipboard-check mr-2"></i> Mark as
                        Delivered</a>
                @endif


                @if(!$purchase -> isDisputed() && ($purchase -> isBuyer() || $purchase -> isVendor()))
                    <a href="#dispute" class="btn btn-outline-danger"><i class="fas fa-poop mr-2"></i>
                        Dispute</a>
                @endif
                {{-- Show to vendor if it is delivered --}}
                @if($purchase->hex && $purchase->isDelivered() && $purchase->isVendor())
                    <div class="alert alert-warning">
                        To retrieve funds from this purchase please sign this transaction and send it.
                    </div>
                    <textarea cols="30" rows="5" class="form-control" readonly>{{ $purchase->hex }}</textarea>
                @endif
                {{-- Show to the winner if it is resolved --}}
                @if($purchase->hex && $purchase->isDisputed() && $purchase->dispute->isResolved() && $purchase->dispute->isWinner())
                    <div class="alert alert-warning">
                        To retrieve funds from this purchase please sign this transaction and send it.
                    </div>
                    <textarea cols="30" rows="5" class="form-control" readonly>{{ $purchase->hex }}</textarea>
                @endif
            </div>
        </div>

        {{-- Instructions for escrow --}}
        {{-- Purchased buyer--}}
        @if($purchase -> isPurchased() && $purchase -> isBuyer() && !$purchase -> enoughBalance())
            <div class="alert alert-warning text-center mt-3">
                To proceed with the purchase send enough <em>Bitcoin</em> to the wallet address: <span
                        class="badge badge-info">{{ $purchase -> address }}</span>
            </div>
        @endif

        {{-- Purchased vendor --}}
        @if($purchase -> isVendor() && $purchase -> isPurchased() && $purchase -> enoughBalance())
            <div class="alert alert-warning text-center mt-3">
                The buyer has paid the required amount on the <em>Escrow</em> wallet address. It is recommended to send the
                goods now!
            </div>
        @elseif($purchase -> isVendor() && $purchase -> isPurchased())
            <div class="alert alert-warning text-center mt-3">
                The buyer has not paid the required amount on the <em>Escrow</em> wallet address. Do not send the goods yet!
            </div>
        @endif

        {{-- Sent vendor --}}
        @if($purchase -> isBuyer() && $purchase -> isSent())
            <div class="alert alert-warning text-center mt-3">
                Please Note: By marking this purchase as delivered you will release the funds from the wallet address to the Vendors
                wallet address.
            </div>
        @endif


    </div>
    
</div>