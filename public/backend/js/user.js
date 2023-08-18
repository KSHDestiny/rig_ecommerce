$(document).on('click', '.del-user-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    if (id == 1) {
        Swal.fire({
            icon : 'info',
            title: 'ACCESS DENIED',
            text : 'You Cannot Delete System Admin !'
        })

        return false;
    }

    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this User?",
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
                url   : `/admin/user/${id}`,
                method: 'DELETE',

                success: function(response){
                    Swal.fire({
                        icon : 'success',
                        title: 'SUCCESS',
                        text : 'User Deleted Successfully',
                    });

                    $('.count').text(`${response.users.length}`);
                    $('#userListTable tbody').load(location.href + ' #userListTable tbody tr');
                }
            })
        }
    })
})
