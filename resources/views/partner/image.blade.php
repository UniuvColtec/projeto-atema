<div id="fileupload">
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">
        <div class="col-lg-7">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
             <i class="far fa-plus"></i>
              <span>Adicionar...</span>
              <input type="file" name="files[]" multiple accept="image/png, image/jpeg" />
            </span>
            <button type="submit" id="fileupload-start" class="btn btn-primary start">
                <i class="fas fa-upload"></i>
                <span>Iniciar envio</span>
            </button>
            <button type="reset" class="btn btn-warning cancel">
                <i class="fas fa-ban"></i>
                <span>Cancelar envio</span>
            </button>
            <button type="button" class="btn btn-danger delete">
                <i class="far fa-trash-alt"></i>
                <span>Excluir selecionados</span>
            </button>
            <input type="checkbox" class="toggle" />
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
        </div>
        <!-- The global progress state -->
        <div class="col-lg-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div
                class="progress progress-striped active"
                role="progressbar"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div
                    class="progress-bar progress-bar-success"
                    style="width: 0%;"
                ></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation" class="table table-striped">
        <tbody class="files"></tbody>
    </table>
</div>


<!-- The blueimp Gallery widget -->
<div
    id="blueimp-gallery"
    class="blueimp-gallery blueimp-gallery-controls"
    aria-label="image gallery"
    aria-modal="true"
    role="dialog"
    data-filter=":even"
>
    <div class="slides" aria-live="polite"></div>
    <h3 class="title"></h3>
    <a
        class="prev"
        aria-controls="blueimp-gallery"
        aria-label="previous slide"
        aria-keyshortcuts="ArrowLeft"
    ></a>
    <a
        class="next"
        aria-controls="blueimp-gallery"
        aria-label="next slide"
        aria-keyshortcuts="ArrowRight"
    ></a>
    <a
        class="close"
        aria-controls="blueimp-gallery"
        aria-label="close"
        aria-keyshortcuts="Escape"
    ></a>
    <a
        class="play-pause"
        aria-controls="blueimp-gallery"
        aria-label="play slideshow"
        aria-keyshortcuts="Space"
        aria-pressed="false"
        role="button"
    ></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>Edit</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="btn btn-primary start" disabled>
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <input type="hidden" name="pendente[]" class="imagemPendente" value="1">
                      <button class="btn btn-warning cancel">
                          <i class="fas fa-ban"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  <p class="name">
                      {% if (file.url) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                      {% } else { %}
                          <span>{%=file.name%}</span>
                      {% } %}
                  </p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="far fa-trash-alt"></i>
                          <span>Excluir</span>
                      </button>
                      <input type="hidden" name="images[]" value="{%=file.id%}">
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="fas fa-ban"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>


@section('js')
    <script src="/js/blueimp/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/js/blueimp/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/js/blueimp/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/js/blueimp/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/js/blueimp/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="/js/blueimp/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="/js/blueimp/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="/js/blueimp/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="/js/blueimp/jquery.fileupload-ui.js"></script>

    <script>
        $(function () {
            'use strict';

            // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                @if (isset($partner))
                    url: '{{ route('partner.uploadImageGet', $partner->id) }}'
                @else
                    url: '{{ route('partner.uploadImageGet') }}'
                @endif
            });


            // Load existing files:
            $('#fileupload').addClass('fileupload-processing');
            $.ajax({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: $('#fileupload').fileupload('option', 'url'),
                dataType: 'json',
                context: $('#fileupload')[0]
            })
                .always(function () {
                    $(this).removeClass('fileupload-processing');
                })
                .done(function (result) {
                    $(this)
                        .fileupload('option', 'done')
                        // eslint-disable-next-line new-cap
                        .call(this, $.Event('done'), { result: result });
                });
        });
    </script>
@endsection
