$(document).ready(function(){
    $('.jsonForm').ajaxForm({
        dataType:  'json',

        beforeSubmit: function(){
            if ($(".imagemPendente").length>0) {
                $("#fileupload-start").trigger('click');
                iziToast.warning({message: 'Existem imagem não enviadas, aguarde enviar as imagens.'});
                return false;
            }
        },
        success:   function(d){
            if (d.status==0){
                iziToast.error({
                    message: d.message
                });
            }else{
                iziToast.success({
                    message: d.message,
                    onClosed: function(){
                        document.location = document.referrer;
                    }
                });
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
