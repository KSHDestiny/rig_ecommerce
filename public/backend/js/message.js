$(document).on('click', '.del-msg-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');

    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Message?",
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
                url   : `/admin/message/${id}`,
                method: 'DELETE',

                success: function(response){
                    Swal.fire({
                        icon : 'success',
                        title: 'SUCCESS',
                        text : 'Message Deleted Successfully',
                    });

                    $('#messageListRow').load(location.href + ' #messageListRow .table-responsive');
                }
            })
        }
    })
})
