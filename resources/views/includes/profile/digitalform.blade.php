@extends('includes.profile.addingform')

@section('form-content')
    <h3>Add Digital Content</h3>
    <hr>
    <form method="POST" action="{{ route('profile.vendor.product.digital.post', $digitalProduct) }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="product_content">Product's Content:</label>
            <textarea name="product_content" id="product_content"
                      class="form-control @error('content', $errors) is-invalid @enderror" rows="5"
                      placeholder="Details about the product">{{ $digitalProduct -> content }}</textarea>
            <p class="text-muted">You may leave it blank, if you do not want your Digital Content to have Automatic Delivery, otherwise put each
                product in a separate line!</p>
            @error('product_content', $errors)
            <div class="invalid-feedback d-block text-center">
                {{ $errors -> first('product_content') }}
            </div>
            @enderror
        </div>

        <div class="form-check mx-2 mb-2 ">
            <input class="form-check-input" type="checkbox" value="1" name="autodelivery"
                   id="autodelivery" {{ $digitalProduct -> autodelivery == true ? 'checked' : '' }}>
            <label class="form-check-label" for="autodelivery">
                Automatic delivery
            </label>
            <p class="text-muted">If this is checked, the quantity of this product will be the number of lines in the product content.</p>
        </div>


        <div class="form-row justify-content-center">
            <div class="form-group col-md-3 text-center">
                @if(request() -> is('profile/vendor/product/edit/*'))
                    <button class="btn btn-outline-success" type="submit"><i class="far fa-save mr-2"></i> Save</button>
                    <a href="{{ route('profile.vendor.product.edit', [$basicProduct, 'images']) }}"
                       class="btn btn-outline-primary"><i class="fas fa-chevron-down mr-2"></i> Next</a>
                @elseif(request() -> is('admin/product/*'))
                    <button class="btn btn-outline-success" type="submit"><i class="far fa-save mr-2"></i> Save</button>
                    <a href="{{ route('admin.product.edit', [$basicProduct, 'images']) }}"
                       class="btn btn-outline-primary"><i class="fas fa-chevron-down mr-2"></i> Next</a>
                @else
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-chevron-down mr-2"></i> Next
                    </button>
                @endif
            </div>
        </div>
    </form>
@stop