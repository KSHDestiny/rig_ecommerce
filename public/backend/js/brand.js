$(document).on('click', '.del-brand-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Brand?",
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
                url   : `/admin/brand/${id}`,
                method: 'DELETE',

                success: function(response){
                    Swal.fire({
                        icon : 'success',
                        title: 'SUCCESS',
                        text : 'Brand Deleted Successfully',
                    });

                    $('.count').text(`${response.brands.length}`);
                    $('#brandListTable tbody').load(location.href + ' #brandListTable tbody tr');
                }
            })
        }
    })
})
