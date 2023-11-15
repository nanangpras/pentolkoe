<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">
            @if ($cart)
                @forelse ($cart as $item)
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="{{$item['image']}}" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">{{$item['title']}}</a></h6>
                            <span class="mini-cart-quantity">{{$item['qty']}} x {{$item['price']}} </span>
                        </div>
                    </div>
                @empty
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="{{url('themes-frontend/img/product/2.png')}}" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Tidak ada keranjang</a></h6>
                        </div>
                    </div>
                @endforelse
            @else
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="{{url('themes-frontend/img/product/2.png')}}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Tidak ada keranjang</a></h6>
                    </div>
                </div>
            @endif

        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal: <span>{{$subtotal}}</span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="{{route('cart.index')}}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                <a href="{{route('checkout.index')}}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
            <p>Free Shipping on All Orders Over $100!</p>
        </div>

    </div>
</div>
