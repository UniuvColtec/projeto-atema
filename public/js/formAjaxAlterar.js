var jsonForm;
var intervalSubmit;

$(document).ready(function(){
    var btnSubmitText = '';
    const btnSubmit = $(".btn-submit");
    jsonForm = $('.jsonForm');

    jsonForm.ajaxForm({
        dataType:  'json',

        beforeSubmit: function(){
            if ($(".imagemPendente").length>0) {
                $("#fileupload-start").trigger('click');
                if (btnSubmitText==''){
                    iziToast.warning({
                        message: 'Existem imagem não enviadas, aguarde enviar as imagens.',
                        onClosed: function(){
                            intervalSubmit = setInterval( () => {
                                jsonForm.trigger('submit')
                            },2000);
                        }
                    });

                    btnSubmitText = $(".btn-submit").text();
                    btnSubmit.attr("disabled", "true").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Carregando...</span>')
                }

                return false;
            }else{
                clearInterval(intervalSubmit);
            }
        },
        success:   function(d){
            if (btnSubmitText!=''){
                btnSubmit.removeAttr('disabled').text(btnSubmitText);
            }
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
