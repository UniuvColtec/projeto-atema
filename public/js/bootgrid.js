$(document).ready(function () {
    // var source = $('meta[name="data-path"]').attr('content');
    var source = document.URL + '/bootgrid';

    var grid = $("#grid-data").bootgrid({
        ajax: true,
        post: function ()
        {
            return {
               _token: $('meta[name="csrf-token"]').attr('content')
            };
        },
        url: source,
        formatters: {
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-xs btn-success command-show\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-eye\"></span></button> " +
                    "<button type=\"button\" class=\"btn btn-xs btn-info command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fas fa-pencil-alt\"></span></button></button> " +
                    "<button type=\"button\" class=\"btn btn-xs btn-danger command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash\"></span></button>";
            }
        }
    }).on("loaded.rs.jquery.bootgrid", function()
    {
        grid.find(".command-edit").on("click", function(e)
        {
            var row_id = $(this).data("row-id");
            document.location = document.URL + '/' + $(this).data("row-id") + '/edit';
        }).end().find(".command-show").on("click", function(e)
        {
            var row_id = $(this).data("row-id");
            document.location = document.URL + '/' + $(this).data("row-id");
        }).end().find(".command-delete").on("click", function(e)
        {
            var row_id = $(this).data("row-id");

            iziToast.question({
                timeout: 20000,
                close: false,
                overlay: true,
                color: 'white',
                displayMode: 'once',
                zindex: 999,
                message: 'Deseja realmente excluir o cadastro?',
                position: 'center',
                buttons: [
                    ['<button><b>Sim</b></button>', function (instance, toast) {
                        $.ajax({
                                url: document.URL + '/' + row_id,
                                type: 'DELETE',
                                data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                                success: function () {
                                    iziToast.success({
                                        message: 'Cadastro excluído com sucesso!'
                                    });
                                    grid.bootgrid("reload")
                                },
                                error: function (data){
                                    var erro = JSON.parse(JSON.stringify(data));
                                    iziToast.error({
                                        message: erro.responseText
                                    });
                                }
                            });

                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                    }, true],
                    ['<button>Não</button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }]
                ]
            });
        });
    });
});
