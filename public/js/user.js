$(document).ready(function() {
    getuserdetails(); // function call for user details
});
function getuserdetails(){ // get user record
    //alert('fdsf');
    var URL=$('#base_url').val();
  //  alert(URL);
    $.ajax({
        type:"get",
        data:{},
        url:URL+'/admin/getDetails',
        success: function(data){
            $('#user-detail').html(data)
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
