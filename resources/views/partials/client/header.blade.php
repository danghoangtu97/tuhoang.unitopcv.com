<div id="header-wp">
    <div id="head-top" class="clearfix">
        <div class="wp-inner">
            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
            <div id="main-menu-wp" class="fl-right">
                <ul id="main-menu" class="clearfix">
                    <li>
                        <a href="{{ route('client.home') }}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="{{ route('client.listPost', 'news') }}" title="">24H công nghệ</a>
                    </li>
                    <li>
                        <a href="{{ route('client.detailPost', ['slug' => 'gioi-thieu-ve-cong-ty']) }}" title="">Giới
                            thiệu</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="head-body" class="clearfix">
        <div class="wp-inner">
            <a href="{{ route('client.home') }}" title="" id="logo" class="fl-left"><img
                    src="{{ asset('ismart/public/images/logo.png') }}" /></a>
            <div id="search-wp" class="fl-left">
                <form method="POST" action="">
                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                    <button type="submit" id="sm-s">Tìm kiếm</button>
                </form>
            </div>
            <div id="action-wp" class="fl-right">
                <div id="advisory-wp" class="fl-left">
                    <span class="title">Tư vấn</span>
                    <span class="phone">0987.654.321</span>
                </div>
                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="num">2</span>
                </a>
                <div id="cart-wp" class="fl-right">
                    <div id="btn-cart">
                        <a href="{{ route('cart.show') }}" class="color-white">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="countCart" id="num">{{ Cart::count() }}</span>         
                        </a>                                    
                    </div>
                    <div id="dropdownCart">
                        @if (Cart::count() > 0) 
                        <div id="dropdown">
                            <p class="desc">Có <span class="countCart">{{ Cart::count() }} </span>sản phẩm trong giỏ hàng</p>
                            <ul class="list-cart">
                                @foreach (Cart::content() as $item)
                                <li class="clearfix">
                                    <a href="" title="" class="thumb fl-left">
                                        <img src="{{ asset($item->options->thumbnail) }}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="" title="" class="product-name">{{ $item->name }}</a>
                                        <p class="price">{{ number_format($item->price) }}đ</p>
                                        <p class="qty">Số lượng: <span>{{ $item->qty }}</span></p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="total-price clearfix">
                                <p class="title fl-left">Tổng:</p>
                                <p class="price fl-right">{{ Cart::total() }}đ</p>
                            </div>
                            <div class="action-cart clearfix">
                                <a href="{{ route('cart.show') }}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                <a href="{{ route('cart.payment') }}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                            </div>
                        </div>
                    @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
