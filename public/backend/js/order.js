$(document).on('click', '.del-order-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Order Record?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK',
        cancelButtonText: 'CANCEL',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url   : `/admin/order/${id}`,
                method: 'DELETE',

                success: function(response){
                    Swal.fire({
                        icon : 'success',
                        title: 'SUCCESS',
                        text : 'Order Deleted Successfully',
                    });

                    $('.count').text(`${response.orders.length}`);
                    $('#orderListTable tbody').load(location.href + ' #orderListTable tbody tr');
                }
            })
        }
    })
})
