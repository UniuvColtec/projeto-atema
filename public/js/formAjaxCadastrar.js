$(document).ready(function(){
    $('.jsonForm').ajaxForm({
    dataType:  'json',

    success:   function(d){
        if (d.status==0){
            iziToast.error({
                message: d.message
            });
        }else{
            iziToast.success({
                message: d.message
            });
            $('.jsonForm').trigger("reset");
            $(".select2").val('');
            $(".select2").trigger('change');
        }
    },
    error: function(d){

        if (d.status===401){
            document.location = '/'
        }
        if (d.status===422){
            var message = '';
            var errors = d.responseJSON.errors

            $.each(errors, function(key, value){
                message += '- ' + value + '<br>'
            })

            iziToast.error({
                message: message
            });
        }
    }

    })

});
