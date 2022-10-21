<div class="container py-3 home-action-buttons">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4 text-center px-2 justify-content-evenly">
        <a href="{{ url('/contact') }}" class="useless">
            <div class="card h-100 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">

                    <img src="/assets/img/botoes-home/calendario.svg">
                    <p class="m-0 p-0">Sugerir<br>Evento</p>

                </div>
            </div>
        </a>
        <a href="{{ route('web.event.map') }}" class="useless">
            <div class="card h-100 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/mapa-dos-eventos.svg">
                    <p class="m-0 p-0">Mapa dos<br>Eventos</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.partner') }}">
            <div class="card h-100 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/parceiros.svg">
                    <p class="m-0 p-0">Parceiros</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.typicalfood') }}">
            <div class="card h-100 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/comidas-tipicas.svg" >
                    <p class="m-0 p-0">Comidas<br>Típicas</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.touristspot') }}">
            <div class="card h-100 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/turismo-local.svg" >
                    <p class="m-0 p-0">Turismo<br>Local</p>
                </div>
            </div>
        </a>
    </div>
</div>
