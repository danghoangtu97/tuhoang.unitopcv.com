<div class="sidebar fl-left">
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                @foreach ($productBestSeller as $product)
                    <li class="clearfix">
                        <a href="{{ route('client.detailProduct', $product->id) }}" title="" class="thumb fl-left">
                            <img src="{{ asset($product->feature_image_path) }}" alt="">
                        </a>
                        <div class="info fl-right">
                            <a href="{{ route('client.detailProduct', $product->id) }}" title="" class="product-name">{{ $product->name }}</a>
                            <div class="price">
                                <span class="new">{{ number_format($product->price) }}đ</span>
                                <span class="old">{{ number_format($product->price) }}đ</span>
                            </div>
                            <a href="{{ route('cart.add', $product->id) }}" title="" class="buy-now">Mua ngay</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>