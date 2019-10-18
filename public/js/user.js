$(function () {
    //setup ajax error handling
    $.ajaxSetup({
        error: function (x, status, error) {
            if (x.status === 422) {
                toastr.error(x.responseJSON.message)
            }
        }
    });
});


$(document).ready(function () {
    getuserdetails(); // function call for user details
    $('body').on('click', '.deleteuser', function () { //delete user
        var userData = $(this).data('user');
        displayDeleteuser(userData.id);
    });
    $('body').on('click', '#saveusers', function () {  // Add User
        $('#saveusers').show();
        $('#upadteuser').hide();
        createuser();
    });
    $('body').on('click', '#adduser', function () {  // Add User
        $("#insertuser")[0].reset();
        $('#blah').attr('src', '');
        });

    $('body').on('click', '#upadteuser', function () { // Update User
        updateuser()
    });


    $("body").on("click", "a.userEdit", function () {   // Get record from user table
        var URL = $('#base_url').val();
        var userData = $(this).data('user');
        $("#modal-default").modal('show');
        $("#userid").val(userData.id);
        $("#name").val(userData.name);
        $("#email").val(userData.email);
        if (userData.image) {
            var imagePath = URL + '/storage/users/' + userData.image;
            $('#img_id').html('<img id="blah" src="' + imagePath + '" style="width: 57%"  />');
        } else {
            $('#img_id').html('');
        }
        $('#saveusers').hide();
        $('#upadteuser').show();

    });
    $('body').on('click','#saveuserdata',function(){ // save profile details handleEvent
        var formda=$('#userupdate').serializeArray();
        var URL=$('#base_url').val();
        $.ajax({
            type:"post",
            data:formda,
            url: URL + '/user/updateprofile',
            success: function(data){
                if(data.status=="success"){
                    toastr.success(data.message);
                    $('#username').html(data.data)
                }else{
                    toastr.error(data.message);
                }
            }
        });
    })
});




function getuserdetails() { // get user record
    var URL = $('#base_url').val();
    $.ajax({
        type: "get",
        data: {},
        url: URL + '/admin/getDetails',
        success: function (data) {
            $('#user-detail').html(data);
            $('#example1').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'responsive': true
            })
        }
    });
}

function displayDeleteuser(id) { // delete record from user table
    swal({
            title: "Delete",
            text: "Are You Sure ? You Want To Delete This User.",
            showCancelButton: true,
            confirmButtonClass: " btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        },
        function (result) {
            if (result == true) {
                deleteuser(id);
            }
        });
}

function deleteuser(id) { // delete USer function
    var URL = $('#base_url').val();
    $.ajax({
        type: 'get',
        data: {delete_userid: id},
        url: URL + '/admin/delete_user',
        success: function (data) {
            if (data.status == "success") {
                toastr.success(data.message);
                getuserdetails();
            }
            if (data.status == "error") {
                toastr.error(data.message);
            }
        }
    });
}

function createuser() {  // save user information
    var formda = new FormData($("#insertuser")[0]);
    var URL = $('#base_url').val();
    $('#saveusers').show();
    $('#upadteuser').hide();
   $.ajax({
        type: "post",
        data: formda,
        url: URL + '/admin/create',
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == "success") {
                toastr.success(data.message);
                $("#insertuser")[0].reset();
                $("#modal-default").modal('hide');
                getuserdetails();
            }
        },

    });
}


function updateuser() { // update user details
    var formda = new FormData($("#insertuser")[0]);
    var URL = $('#base_url').val();
    var userid = $('#userid').val();
    $.ajax({
        type: "post",
        data: formda,
        url: URL + '/admin/update',
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == "success") {
                toastr.success(data.message);
                $("#modal-default").modal('hide');
                $("#insertuser")[0].reset();
                getuserdetails();
            } else {
                toastr.error(data.message);
            }
        }
    })
}

$('body').on('click','#savepassword',function(){ // Save user profile password logo handleEvent
    var formda=$('#changepassword').serializeArray();
    var URL=$('#base_url').val();
    $.ajax({
        type:"post",
        data:formda,
        url: URL + '/user/changepassworduser',
        success: function(data){
            if(data.status=="success"){
                toastr.success(data.message);
            }else{
                toastr.error(data.message);
            }
        }
    });
})

function password_match(){	// password and confirm password validation
    re = /[a-z && A-Z]/;
    if($('#password').val()=='' || $('#cpassword').val()==''){
        toastr.error("all fields are required");
        return false;
    }else if($('#password').val().length < 4 || $('#cpassword').val().length < 4){
        toastr.error("Password must contain at least four characters!");
    }else if($('#password').val()!=$('#cpassword').val()){
        toastr.error("Password does't match please check");
        return false;
    }else{
        return true;
    }
}

