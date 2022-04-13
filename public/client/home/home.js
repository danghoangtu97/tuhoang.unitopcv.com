function addToCart(even){
    even.preventDefault();
    let url = $(this).data('url'); 
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            if(data.code == 200){    
                alertify.success(data.msg);
                $('.countCart').text(data.count);
                $('#dropdownCart').html(data.view);
            }
        },
        error: function () { 

        }
    });
}

$(function(){
    $(document).on('click', '.add_to_cart' ,addToCart);
});