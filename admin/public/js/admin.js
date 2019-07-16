$(document).ready(function() {
    $('#users_table').DataTable({
        "iDisplayLength": 20
        , "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
        , "processing": true
    });
});


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
    window.location.replace('/admin_index/admin_users_edit/'+user_edit_id+'/update');

    $.ajax({

        type:'POST',

        url:'/admin_index/admin_users_edit/'+user_edit_id+'/update',

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


$("#add_sboy_btn").click(function(e){

    e.preventDefault();



    var sboy_ticket = $("#sboy_ticket").val();
    var user_edit_id = $("#user_edit_id").val();

    window.location.replace('/admin_index/admin_users_edit/'+user_edit_id+'/add_sboy');

    $.ajax({

        type:'POST',

        url:'/admin_index/admin_users_edit/'+user_edit_id+'/add_sboy',

        data:{
            sboy_ticket:sboy_ticket
            , user_edit_id:user_edit_id
        },

        success:function(data){

        }
        , error:function(data){
            alert('Не вдалось додати школяра!');
        }

    });
});

function deleteSboy(id){

    var user_edit_id = $("#user_edit_id").val();

    window.location.replace('/admin_index/admin_users_edit/'+user_edit_id+'/delete');

    $.ajax({

        type:'POST',

        url:'/admin_index/admin_users_edit/'+user_edit_id+'/delete',

        data:{
            id:id
        },

        success:function(data){

        }
        , error:function(data){
            alert('Помилка');
        }

    });
}

function addUser(){

    if ($('#edit_user_type').is(":checked"))
    {
        $("#edit_user_type").val('1');
    }else{
        $("#edit_user_type").val('0');
    }

    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var type = $("#edit_user_type").val();
    var password_confirmation = $("#password-confirm").val();

    if(password != password_confirmation){
        alert('Паролі не співпадають');
        return false;
    }

    window.history.pushState('','','/admin_index/nav-new-users');

    $.ajax({

        type:'post',

        url:'/admin_index/nav-new-users',

        data:{
            name:name
            , email:email
            , password:password
            , type:type
            , password_confirmation:password_confirmation
        },

        success:function(data){
            alert('Користувача додано');
            window.location.replace('/admin_index/admin_users_edit/'+data.data+'/update');
            window.history.pushState('','','/admin_index#nav-new-users');
        },
        error:function(data){
            alert('Помилка!');
            window.history.pushState('','','/admin_index#nav-new-users');
        }
    });
}

$("#nav-tab a").on('click', function(e) {

    var href = $(this).attr('href');
    window.history.pushState('','', 'http://127.0.0.1:8000/admin_index'+href);

});

$(document).ready(function(){

    var url = document.location.toString();
    if (url.match('#')) {
        $(".nav-tabs a[href='#"+url.split('#')[1]+"']").tab('show') ;
    } else {
        $(".nav-tabs a[href='#nav-users']").tab('show') ;
    }
});

