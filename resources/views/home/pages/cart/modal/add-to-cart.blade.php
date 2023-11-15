<div class="modal-body">
    <div class="ltn__quick-view-modal-inner">
        <div class="modal-product-item">
           <div class="row">
               <div class="col-12">
                {{-- @forelse ($cart as $item)
                    <div class="modal-product-img">
                    </div>
                    <div class="modal-product-info">
                        <h5><a href="product-details.html">{{$item->title}}</a></h5>
                        <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                        <div class="btn-wrapper">
                            <a href="{{route('cart.index')}}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                            <a href="{{route('cart.index')}}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                        </div>
                    </div>
                @empty --}}
                    <div class="modal-product-info">
                        {{-- <h5><a href="product-details.html">{{$item->title}}</a></h5> --}}
                        <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Cart</p>
                        <div class="btn-wrapper">
                            <a href="{{route('cart.index')}}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                            <a href="{{route('cart.index')}}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                        </div>
                    </div>
                {{-- @endforelse --}}
                    <!-- additional-info -->
                    <div class="additional-info d-none">
                       <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                       <div class="payment-method">
                           <img src="{{url('themes-frontend/img/icons/payment.png')}}" alt="#">
                       </div>
                    </div>
               </div>
           </div>
        </div>
    </div>
</div>
