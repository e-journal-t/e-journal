$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});



$(".btn-submit").click(function(e){

    e.preventDefault();



    var sboy_ticket = $("#sboy_ticket").val();
    var user_id = $("#user_id").val();





    $.ajax({

        type:'POST',

        url:'/addsboys',

        data:{
            sboy_ticket:sboy_ticket
            , user_id:user_id
        },

        success:function(data){
            alert('OK');

        }
        , error:function(data){
            alert(data.message);
        }

    });
});