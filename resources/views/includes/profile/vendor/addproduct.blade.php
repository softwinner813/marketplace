<div class="rounded-md bg-gray-900 px-3 py-2 mt-3">

    <h3><i class="fa fa-add mr-2"></i>Add Product</h3>
    <hr>
    <div class="card-deck">
        <div class="card">
            <h5 class="card-header"><i class="fas fa-shopping-bag"></i> Physical Items</h5>
            <div class="card-body text-center">
                <p class="card-text">Physical Items need to include shipping options.</p>
                <a href="{{ route('profile.vendor.product.add') }}" class="btn btn-primary">Add Physical Item</a>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header"><i class="fas fa-compact-disc"></i>
                Digital Items</h5>
            <div class="card-body text-center">
                <p class="card-text">Digital Items can be delivered automatically, and they do not have shipping options.</p>
                <a href="{{ route('profile.vendor.product.add', 'digital') }}" class="btn btn-primary">Add Digital Item</a>
            </div>
        </div>
    </div>
</div>