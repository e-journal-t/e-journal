$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});


$(document).ready(function() {
    var date = new Date().getFullYear();

    $('#rating_year').datetimepicker({
        useCurrent: true
        ,format: 'YYYY'
        ,locale: 'ru'
        ,allowInputToggle: true
    }).val(date);
    getSboys();


});

function getSboys(){
    var user_id = $("#user_id").val();

    $.ajax({

        type:'POST',

        url:'/home/rating',

        data:{
            user_id:user_id
        },

        success:function(data){
            $('#sboys_select').append(data.data);
        }
        , error:function(data){
            alert(data.message);
        }
    });
}

$('#search_form').submit(function(e){

    e.preventDefault();
    var rating_period = $("#rating_period").val();
    var rating_year = $("#rating_year").val();
    var sboy_id = $("#sboys_select").val();
    var rating_type = $("#rating_type").val();

    window.history.pushState('','', '/home/rating/search');

    $.ajax({

        type:'POST',

        url:'/home/rating/search',

        data:{
            rating_period:rating_period
            , rating_year:rating_year
            , sboy_id:sboy_id
            , rating_type:rating_type
        },

        success:function(data){
            $('#journal').removeClass('d-none');
            $('#subjects_table').html(data.subjects);
            $('#days_table').html('<td>Предмети / Дні</td>'+data.days_table);
            $('#rating_table').html(data.rating_table);

        }
    });
});

