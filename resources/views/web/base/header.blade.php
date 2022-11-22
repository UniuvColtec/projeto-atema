<header>
    <nav class="navbar navbar-expand-lg py-4" id="header-navbar">
        <div class="container-md ">
            <a class="navbar-brand " href="/"><img src="{{ asset('assets/img/calendario-integrado-logo.png') }}" alt="Calendário Integrado" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse py-3 py-lg-0 justify-content-lg-between" id="navbarSupportedContent">
                <form class="d-flex m-auto" role="search" action="{{url('/buscar/{search}')}}" method="get" >
                      <input name="search" class="form-control rounded-5 bg-gray" type="search" placeholder="&#128269; Busque aqui!" aria-label="Search">
                </form>
            </div>

           <div class="collapse navbar-collapse py-3 py-lg-0 justify-content-lg-end" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.about') }}">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="{{ url('/contact') }}">Sugerir Evento</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="{{ route('web.event.map') }}">Mapa de Eventos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


