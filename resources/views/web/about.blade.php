@extends('web.base.page')


@section('content')

    <main class="px-2 px-md-0 my-5">
        <div class="container pb-4">
            <div class="row py-3 justify-content-between">
                <h2 class="w-auto">Quem somos</h2>
                <img src="assets/img/atema-logo.png" class="w-25">
            </div>
            <div class="row py-3">
                <p>A Associação de Turismo e Meio Ambiente do Vale do Iguaçu – ATEMA, fundada aos 11 de julho de 2014 é uma
                    associação de direito privado, sem fins lucrativos, com sede à Rua Dom Pedro II, n.º 303, centro, na
                    cidade de União da Vitória – PR.</p>
                <h5>A ATEMA tem por finalidade precípua:</h5>
            </div>
            <div class="row">
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#98B54D" class="bi bi-tree"
                             viewBox="0 0 16 16">
                            <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Contribuir para a evolução de políticas públicas em
                            geral, com ênfase nas áreas do turismo e meio ambiente, agricultura orgânica, apicultura,
                            agroindústria, agro-floresta e o “Pagamento por Serviços Ambientais”,
                            cultura e patrimônio histórico, voltadas ao desenvolvimento sustentável</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#98B54D" class="bi bi-bank"
                             viewBox="0 0 16 16">
                            <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Trabalhar, gerir, estabelecer por todos os meios lícitos
                            e disponíveis em benefício do turismo e do meio ambiente, como uma alternativa ao
                            desenvolvimento aos municípios atendidos pela ATEMA, pela potencialidade do patrimônio natural,
                            histórico e cultural, e região</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#98B54D"
                             class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Servir de base institucional às comunidades a que se
                            dedica visando o seu desenvolvimento</p>
                    </div>
                </div>
                <div class="col-12 card">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="#98B54D" class="bi bi-building"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Estabelecer relações e estreita articulação com órgãos,
                            empresas públicas ou privadas, autarquias e entidades da União, do Estado e com as
                            municipalidades, bem como instituições do Terceiro Setor e outras entidades ligadas ao turismo e
                            ao meio ambiente tendo em vista somar esforços em torno dos mesmos objetivos</p>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <p style="text-align: justify">
                    A ATEMA no ano de 2021 passou a ser a entidade responsável pela IGR – Instância de Governança Regional
                    da 15ª Região Turística do Estado do Paraná – Região Sul do Paraná. A IGR tem o papel de coordenar o
                    Programa de Regionalização do Turismo, em âmbito regional, como um espaço democrático de debates,
                    proposições e encaminhamentos, em um novo conceito de gestão descentralizada, devendo ainda, assegurar
                    que os interesses e propostas estabelecidas no âmbito municipal sejam respeitados e de fortalecer a
                    parceria público-privado.
                    As Instâncias de Governança Regionais são as responsáveis pela definição de prioridades, pela
                    coordenação das decisões a serem tomadas, pelo planejamento e execução do processo de desenvolvimento do
                    turismo na região turística. Devem participar, também, nas decisões políticas, econômicas e sociais no
                    âmbito regional.
                </p>
            </div>
        </div>
    </main>
@stop
@section('post_content')
    <div id="contato" class="container-fluid" style="background: var(--ci-color-green)">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="assets/img/atema-logo.png" class="img-fluid w-25">
                </div>
                <div class="col-6">
                    <p class="d-flex gap-2 align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg> (42) 3521 2050
                    </p>
                    <p class="d-flex gap-2 align-items-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg> atematurismo@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
