$(document).on('click', '.del-category-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Category?",
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
                url   : `/admin/category/${id}`,
                method: 'DELETE',

                success: function(response){
                    Swal.fire({
                        icon : 'success',
                        title: 'SUCCESS',
                        text : 'Category Deleted Successfully',
                    });

                    $('.count').text(`${response.categories.length}`);
                    $('#categoryListTable tbody').load(location.href + ' #categoryListTable tbody tr');
                }
            })
        }
    })
})
