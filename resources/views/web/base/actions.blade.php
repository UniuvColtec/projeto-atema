<div class="container py-3 home-action-buttons">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 g-4 text-center px-2 justify-content-evenly">
        <a href="{{ url('/contact') }}" class="useless">
            <div class="card h-100 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/calendario.svg">
                    <p class="m-0 p-0">Sugerir<br>Evento</p>

                </div>
            </div>
        </a>
        <a href="{{ route('web.event') }}" class="useless">
            <div class="card h-80 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#0a8f72" class="bi bi-calendar-event" viewBox="0 0 16 16">
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                    <p class="m-0 p-0" ><br>Eventos</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.event.map') }}" class="useless">
            <div class="card h-80 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0" >
                    <img src="/assets/img/botoes-home/mapa-dos-eventos.svg" >
                    <p class="m-0 p-0"  >Mapa dos<br>Eventos</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.partner') }}">
            <div class="card h-80 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/parceiros.svg">
                    <p class="m-0 p-0">Parceiros</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.typicalfood') }}">
            <div class="card h-80 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/comidas-tipicas.svg" >
                    <p class="m-0 p-0">Comidas<br>Típicas</p>
                </div>
            </div>
        </a>
        <a href="{{ route('web.touristspot') }}">
            <div class="card h-80 py-3">
                <div class="card-body d-flex justify-content-evenly align-items-center flex-column flex-sm-row gap-3 gap-sm-0">
                    <img src="/assets/img/botoes-home/turismo-local.svg" >
                    <p class="m-0 p-0">Turismo<br>Local</p>
                </div>
            </div>
        </a>
    </div>
</div>
