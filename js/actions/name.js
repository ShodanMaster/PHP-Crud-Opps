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
                    
                    swal({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        $('#createModal').modal('hide');
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
        
        var id = $(this).data('id');
        var name = $(this).data('name');
        
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
                    
                    swal({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        $('#updateModal').modal('hide');
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

    $(document).ready(function() {
        $('.deleteName').on('click', function(e) {
            e.preventDefault();
    
            var id = $(this).data('id');
    
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user!",
                icon: "warning",
                buttons: ["Cancel", "Yes, delete it!"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var formData = new FormData();
                    formData.append('id', id);
    
                    $.ajax({
                        type: "POST",
                        url: "actions/name.php?action=delete",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status === 200) {
                                swal({
                                    title: "Deleted!",
                                    text: response.message,
                                    icon: "success",
                                    button: "OK",
                                }).then(() => {
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
                        },
                        error: function() {
                            swal({
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                }
            });
        });
    });
    

});