$(document).ready(function () {
    
    $(document).on('submit', '#nameForm',function (e) {
        e.preventDefault();
        var formData = new FormData(this);
    
        $.ajax({
            type: "POST",
            url: "actions/name.php?action=create",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === 200) {
                    // console.log(response);
                    
                    swal({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        $('#addUserModal').modal('hide');
                        $('#nameForm')[0].reset();
                        location.reload();
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: response.message,
                        icon: "error",
                        button: "OK",
                    });
                }
            }
    
        });
    });
  
    $('.updateName').on('click', function(e){
        e.preventDefault();

        console.log('button clicked');
        
        var id = $(this).data('id');
        var name = $(this).data('name');

        console.log(id, name);

        $('#editId').val(id);
        $('#editName').val(name);
    });

    $(document).on('submit', '#udpateForm',function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "actions/name.php?action=update",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === 200) {
                    // console.log(response);
                    
                    swal({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        $('#addUserModal').modal('hide');
                        $('#nameForm')[0].reset();
                        location.reload();
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: response.message,
                        icon: "error",
                        button: "OK",
                    });
                }
            }

        });
    });

});