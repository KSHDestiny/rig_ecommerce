<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="	sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script src="{{ asset('frontend/js/heightline.js')}}"></script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.sec-about .service-bx fieldset').heightLine({
            fontSizeCheck: true,
        });

        $('.add-to-cart').click(function(e){
            e.preventDefault();

            let data  = {
                'product_id' : $(this).data('id'),
                'qty'        : $(this).closest('.link-blk').find('.item_qty').val(),
            }

            // console.log(data);
            $.ajax({
                type: 'POST',
                url : '/add-to-cart',
                data: data,

                success: function(response){
                    console.log(response);
                    let cart_count = Object.keys(response.cart).length;
                    console.log(response);

                    if( response.status == 'success' ){
                        toastr.success('Item Added to Your Cart Successfully &nbsp;<i class="far fa-check-circle"></i>', 'SUCCESS', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-bottom-right",
                        });
                    }else{
                        toastr.error('Item Already Exists in Your Cart &nbsp;<i class="far fa-times-circle"></i>', 'WARNING', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: "toast-bottom-right",
                        });
                    }

                    $('.cart-count').html(cart_count);
                }
            })
        })

        $('.cart_quantity_down').click(function(e){
            e.preventDefault();
            let qty   = $(this).parent('.cart_quantity_button').find('.qty').val();
            let value = parseInt(qty, 10);
            value     = isNaN(value) ? 0 : value;

            if (value > 1) {
                value--;
                $(this).parent('.cart_quantity_button').find('.qty').val(value);
            }
        });

        $('.cart_quantity_up').click(function(e){
            e.preventDefault();
            let qty   = $(this).parent('.cart_quantity_button').find('.qty').val();
            let value = parseInt(qty, 10);
            value     = isNaN(value) ? 0 : value;

            if (value < 50) {
                value++;
                $(this).parent('.cart_quantity_button').find('.qty').val(value);
            }else{
                toastr.error('The Maximum Value of Order Quantity is 50 Units &nbsp;<i class="far fa-times-circle"></i>', 'WARNING', {
                    closeButton: true,
                    progressBar: true,
                    preventDuplicates: true,
                });
            }
        });

        $('.category').click(function(e){
            $('#category_input').val($(this).data('category-slug'))
            $('#filter_form').submit();
        })
        $('.brand-link').click(function(e){
            $('#brand_input').val($(this).data('brand-slug'))
            $('#filter_form').submit();
        })
    })
</script>
@yield('js')
