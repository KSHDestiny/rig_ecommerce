$(document).ready(function(){
    $(document).on('click', '.del-product-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Product?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            onfirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url   : `/admin/product/${id}`,
                    method: 'DELETE',

                    success: function(){
                        Swal.fire({
                            icon : 'success',
                            title: 'SUCCESS',
                            text : 'Product Deleted Successfully',
                        });

                        $('.count').text(`${response.products.length}`);
                        $('#productListTable tbody').load(location.href + ' #productListTable tbody tr');
                    }
                })
            }
        })
    })

    $('.ProductStatus').change(function(){
        let id = $(this).data('id');

        if($(this).prop('checked') == true){
            $.ajax({
                type: 'POST',
                url : '/admin/update-product-status/',
                data: { status: 1, id: id },

                success: function(response){
                    if (response.message) {
                        showSuccessMessage();
                    }
                }
            })
        }else{
            $.ajax({
                type: 'POST',
                url : '/admin/update-product-status/',
                data: { status: 0, id: id },

                success: function(response){
                    if (response.message) {
                        showSuccessMessage();
                    }
                }
            })
        }
    });

    function showSuccessMessage()
    {
        Swal.fire({
            title: 'SUCCESS',
            text : 'Product Status Update Successfully',
            icon : 'success',
        });
    }
    $('.select2-select-box').select2();
});
