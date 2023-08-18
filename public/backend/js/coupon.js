$(document).on('click', '.del-coupon-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');
    console.log(id)

    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Coupon Code?",
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
                url   : `/admin/coupon/${id}`,
                method: 'DELETE',

                success: function(response){
                    Swal.fire({
                        icon : 'success',
                        title: 'SUCCESS',
                        text : 'Coupon Deleted Successfully',
                    });

                    $('.count').text(`${response.coupons.length}`);
                    $('#couponCodeTable tbody').load(location.href + ' #couponCodeTable tbody tr');
                }
            })
        }
    })
})
