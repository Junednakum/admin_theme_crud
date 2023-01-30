// item delete js function with ajax call 
$(document).on('click', '#deleteitem', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url: schedule_routes.deleteitem,
                method: 'delete',
                data: {
                    id: id,
                    _token: csrf
                },
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Deleted!',
                            'Item has been deleted.',
                            'success'
                        ).then((result) => {
                            if (result.value) {
                                /* remove the shift block */
                                $('#item_'+id).remove()
                            }
                        });
                    } else if (response.status == 400) {
                        Swal.fire({
                            title: 'Not Allowed!',
                            text: response.message,
                            icon: 'warning',
                        })
                    }
                }
            });
        }
    })
});

// add or store item 
$('#add_item_form').validate({
    rules: {
        name: {
            required: true
        },
        item_no: {
            required: true
        },
    },
    messages: {
        name: {
            required: "Please Enter Name."
        },
        item_no: {
            required: "Please Enter Item No."
        },
    },
    submitHandler: function (form) {
        $.ajax({
            url: schedule_routes.add_item,
            type: 'post',
            data: $(form).serialize(),
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Added!',
                        response.messages,
                        'success'
                    ).then((result) => {

                        if (result.value) {
                            //window.location.reload();
                        }

                    });

                    $("#add_item_form")[0].reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.messages,
                    }).then((result) => {
                        if (result.value) { }
                    });
                }
            }
        });
    }
});
