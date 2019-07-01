$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

function saveChanges(){

    window.history.pushState('', '', 'http://127.0.0.1:8000/home/settings/edit');

    var name = $("#user_name").val();
    var email = $("#user_email").val();
    var password = $("#password").val();
    var password_confirmation = $("#password-confirm").val();
    var user_id = $("#user_id").val();

    if(password != password_confirmation){
        alert('Паролі не співпадають');
        return false;
    }



    $.ajax({

        type:'POST',

        url:'/home/settings/edit',

        data:{
            name:name
            , user_id:user_id
            , email:email
            , password:password
            , password_confirmation:password_confirmation
        },

        success:function(data){
            window.history.pushState('', '', 'http://127.0.0.1:8000/home/settings');
            alert('Зміни збережено');
        }
        , error:function(data){
            window.history.pushState('', '', 'http://127.0.0.1:8000/home/settings');
            alert('Можливо користувач з такою електронною поштою зареєстрований');
        }
    });
}

function dataSettings(user_id){
    $.ajax({

        type:'POST',

        url:'/home/settings',

        data:{
            user_id:user_id
        },

        success:function(data){
            $("#user_name").val(data.name);
            $("#user_email").val(data.email);
        }
        , error:function(data){
            alert('Можливо користувач з такою електронною поштою зареєстрований');
        }
    });
}

$(document).ready(function(){
    var user_id = $("#user_id").val();
    dataSettings(user_id);
});
