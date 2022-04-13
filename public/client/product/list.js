function addToCart(even){
    even.preventDefault();
    let url = $(this).data('url'); 
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            if(data.code == 200){
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Thêm sản phẩm vào giỏ hàng thành công',
                showConfirmButton: false,
                timer: 1500
                })
            }
        },
        error: function () {

        }
    });
}

$(function(){
    $(document).on('click', '.add_to_cart' ,addToCart);
});