$(document).on("click", ".del-banner-btn", function (e) {
    e.preventDefault();
    let id = $(this).data("id");

    Swal.fire({
        title: "Are You Sure?",
        text: "Do You Want to Delete this Banner?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "OK",
        cancelButtonText: "CANCEL",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/admin/banner/${id}`,
                method: "DELETE",

                success: function (response) {
                    console.log(response);
                    Swal.fire({
                        icon: "success",
                        title: "SUCCESS",
                        text: "Banner Deleted Successfully",
                    });

                    $(".count").text(`${response.banners.length}`);
                    $("#bannerListTable tbody").load(
                        location.href + " #bannerListTable tbody tr"
                    );
                },
            });
        }
    });
});
