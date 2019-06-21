$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});



$("#admin_button_edit").click(function(e){

    e.preventDefault();

    var edit_user_name = $("#edit_user_name").val();
    var edit_user_email = $("#edit_user_email").val();
    var user_edit_id = $("#user_edit_id").val();

    if ($('#edit_user_type').is(":checked"))
    {
        $("#edit_user_type").val('1');
    }else{
        $("#edit_user_type").val('0');
    }

    var edit_user_type = $("#edit_user_type").val();

    $.ajax({

        type:'POST',

        url:'/admin_index/admin_users_edit/'+user_edit_id,

        data:{
            edit_user_name:edit_user_name
            , edit_user_email:edit_user_email
            , edit_user_type:edit_user_type
            , user_edit_id:user_edit_id
        },

        success:function(data){
            alert('OK');

        }
        , error:function(data){
            alert(data.message);
        }

    });
});
