<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">ISMART</h3>
                <p class="desc">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ
                    ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Thông tin cửa hàng</h3>
                <ul class="list-item">
                    <li>
                        <p>{{ getValueFromSettingsTable('address') }}</p>
                    </li>
                    <li>
                        <p>{{ getValueFromSettingsTable('phone_number') }}</p>
                    </li>
                    <li>
                        <p>{{ getValueFromSettingsTable('email') }}</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Chính sách mua hàng</h3>
                <ul class="list-item">
                    <li>
                        <a href="{{ route('client.detailPost', ['slug'=> 'chinh-sach-bao-hanh-tai-fpt-shop']) }}" title="">Quy định - chính sách</a> 
                    </li>
                    <li>
                        <a href="{{ route('client.detailPost', ['slug'=> 'chinh-sach-bao-hanh-tai-fpt-shop']) }}" title="">Chính sách bảo hành - đổi trả </a>
                    </li>
                    <li>
                        <a href="{{ route('client.detailPost', ['slug'=> 'huong-dan-mua-tra-gop-online-tai-fpt-shop']) }}" title="">Hưỡng dẫn mua trả góp</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">Bảng tin</h3>
                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                <div id="form-reg">
                    <form method="POST" action="">
                        <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                        <button type="submit" id="sm-reg">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">© Bản quyền thuộc về unitop.vn | Php Master</p>
        </div>
    </div>
</div>