@extends('web.base.page')


@section('content')

    <main class="px-2 px-md-0 my-5">
        <div class="container pb-4">
            <div class="row py-3 justify-content-between">
                <h2 class="w-auto">Quem somos</h2>
                <img src="assets/img/SulPR_logo.png" class="w-25">
            </div>
            <div class="row py-3">
                <p>A marca Sul do Paraná nasce gigante. </p>
                    <p style="text-align : justify">Inspirada nas imagens e experiências percebidas neste destino diverso
                    pode ser utilizada para expressar a essência deste território. Uma terra de
                    gigantes, guardiães da natureza, da história e do tempo onde as várias
                    etnias fazem o melhor para bem receber.</p>
                    <p style="text-align: justify">O uso desta marca facilitará a comunicação dos valores da nossa gente
                    conferindo credibilidade a nossa mensagem. Seguir as orientações deste
                    livro garantirá a integridade da identidade visual da Região Turística Sul do
                Paraná que já nasce madura, experiente.</p>
                    <p style="text-align: justify">Todos aqueles que se utilizam da comunicação como meio de promover o
                    Sul do Paraná e suas riquezas devem se apropriar deste guia. Pessoas,
                    empresas, instituições, todos podem buscar inspiração nos princípios aqui
                    expressados para promover o nosso território.</p>
                <h5>Nossa mensagem:</h5>
            </div>
            <div class="row">
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#0a8f72" class="bi bi-tree"
                             viewBox="0 0 16 16">
                            <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify"><b>Vivemos à sombra das araucárias:</b> Protegemos o meio ambiente como ninguém e em
                            troca, ele nos protege. Disso depende o sustento
                            e a riqueza de nosso povo.
                            Ao conservar araucárias centenárias e o
                            ecossistema da Mata Atlântica garantimos
                            abundância de águas. Usamos de forma
                            sustentável o melhor dessa terra banhada pelo
                            velho Rio Iguaçu.
                            No Sul do Paraná, assim como a história, tudo se
                            passa à sombra das araucárias.</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#0a8f72" class="bi bi-flower3" viewBox="0 0 16 16">
                            <path d="M11.424 8c.437-.052.811-.136 1.04-.268a2 2 0 0 0-2-3.464c-.229.132-.489.414-.752.767C9.886 4.63 10 4.264 10 4a2 2 0 1 0-4 0c0 .264.114.63.288 1.035-.263-.353-.523-.635-.752-.767a2 2 0 0 0-2 3.464c.229.132.603.216 1.04.268-.437.052-.811.136-1.04.268a2 2 0 1 0 2 3.464c.229-.132.489-.414.752-.767C6.114 11.37 6 11.736 6 12a2 2 0 1 0 4 0c0-.264-.114-.63-.288-1.035.263.353.523.635.752.767a2 2 0 1 0 2-3.464c-.229-.132-.603-.216-1.04-.268zM9 4a1.468 1.468 0 0 1-.045.205c-.039.132-.1.295-.183.484a12.88 12.88 0 0 1-.637 1.223L8 6.142a21.73 21.73 0 0 1-.135-.23 12.88 12.88 0 0 1-.637-1.223 4.216 4.216 0 0 1-.183-.484A1.473 1.473 0 0 1 7 4a1 1 0 1 1 2 0zM3.67 5.5a1 1 0 0 1 1.366-.366 1.472 1.472 0 0 1 .156.142c.094.1.204.233.326.4.245.333.502.747.742 1.163l.13.232a21.86 21.86 0 0 1-.265.002 12.88 12.88 0 0 1-1.379-.06 4.214 4.214 0 0 1-.51-.083 1.47 1.47 0 0 1-.2-.064A1 1 0 0 1 3.67 5.5zm1.366 5.366a1 1 0 0 1-1-1.732c.001 0 .016-.008.047-.02.037-.013.087-.028.153-.044.134-.032.305-.06.51-.083a12.88 12.88 0 0 1 1.379-.06c.09 0 .178 0 .266.002a21.82 21.82 0 0 1-.131.232c-.24.416-.497.83-.742 1.163a4.1 4.1 0 0 1-.327.4 1.483 1.483 0 0 1-.155.142zM9 12a1 1 0 0 1-2 0 1.476 1.476 0 0 1 .045-.206c.039-.131.1-.294.183-.483.166-.378.396-.808.637-1.223L8 9.858l.135.23c.241.415.47.845.637 1.223.083.19.144.352.183.484A1.338 1.338 0 0 1 9 12zm3.33-6.5a1 1 0 0 1-.366 1.366 1.478 1.478 0 0 1-.2.064c-.134.032-.305.06-.51.083-.412.045-.898.061-1.379.06-.09 0-.178 0-.266-.002l.131-.232c.24-.416.497-.83.742-1.163a4.1 4.1 0 0 1 .327-.4c.046-.05.085-.086.114-.11.026-.022.04-.03.041-.032a1 1 0 0 1 1.366.366zm-1.366 5.366a1.494 1.494 0 0 1-.155-.141 4.225 4.225 0 0 1-.327-.4A12.88 12.88 0 0 1 9.74 9.16a22 22 0 0 1-.13-.232l.265-.002c.48-.001.967.015 1.379.06.205.023.376.051.51.083.066.016.116.031.153.044l.048.02a1 1 0 1 1-1 1.732zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify"><b>Cultivamos a melhor erva-mate:</b> A erva-mate do Sul do Paraná mantém o sabor da
                            tradição a cada geração. Para isso, aprimoramos o
                            sistema produtivo milenar e seguimos cultivando
                            as plantas à sombra de araucárias nativas.
                            Aliados às técnicas milenares de extração
                            sustentável das folhas estão o respeito ao
                            agricultor e a tecnologia de ponta na produção.
                            Com isso, levamos nossa identidade às mesas do
                            chá da tarde na Europa, passando pelas praias
                            cariocas com o refrescante mate gelado, até
                            chegar às rodas de chimarrão no Sul do Brasil.</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#0a8f72" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                            <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
                            <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
                        </svg>

                        <p class="m-0" style="text-align: justify"><b>Produzimos a fartura:</b> No Sul do Paraná a mesa é farta e sempre a taça
                            transborda. Um sem fim de produtos típicos
                            transforma a experiência gastronômica em um
                            verdadeiro banquete.
                            Além da erva-mate nativa, você vai encontrar
                            produtos de excelência como sucos de uva e
                            vinhos cultivados no alto das serras do Rio Iguaçu,
                            mel nativo, tilápias fresquinhas e um sem fim de
                            iguarias preparadas com carinho na região.
                           </p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#0a8f72" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                        </svg>

                        <p class="m-0" style="text-align: justify"><b>Vivemos bem em comunidade: </b> Descendentes de poloneses, ucranianos, italianos
                            e alemães, caboclos e indígenas. Todos se fizeram
                            brasileiros do bem no Sul do Paraná.
                            Assim como nos desenhos das pêssankas
                            ucranianas, os traços se cruzam e se fundem para
                            criar uma mistura cultural sem igual.
                            É bonito de ver a nossa gente compartilhando o
                            mate, as receitas e a vida com todos que vêm nos
                            visitar. Danças, folclore, cultura e arte estão no
                            DNA de nossa gente!</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#0a8f72" class="bi bi-bag-heart" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify"><b>Servimos o melhor aos visitantes: </b> Eventos, turismo, gastronomia. Somos
                            hospitaleiros por natureza e gostamos que nossos
                            visitantes se sintam bem, assim como a gente.
                            Aroma, sabor, saber, vivência. Preparamos tudo
                            para garantir uma experiência única para ser
                            levada na memória.</p>
                    </div>
                </div>

                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#0a8f72" class="bi bi-balloon" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 9.984C10.403 9.506 12 7.48 12 5a4 4 0 0 0-8 0c0 2.48 1.597 4.506 4 4.984ZM13 5c0 2.837-1.789 5.227-4.52 5.901l.244.487a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.244-.487C4.789 10.227 3 7.837 3 5a5 5 0 0 1 10 0Zm-6.938-.495a2.003 2.003 0 0 1 1.443-1.443C7.773 2.994 8 2.776 8 2.5c0-.276-.226-.504-.498-.459a3.003 3.003 0 0 0-2.46 2.461c-.046.272.182.498.458.498s.494-.227.562-.495Z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify"><b>Vivemos bem perto do céu:</b> Sonhos, vontades, fé. A gente vive no alto, bem
                            perto do céu, em todos os sentidos.
                            No inverno as temperaturas ficam negativas e o
                            vento que sopra nas altitudes próximas de 1.300
                            m carregam a expectativa de neve. Enquanto isso,
                            a paixão aquece a fé de um povo devoto a sua
                            religião e deixa tudo mais perto do que é divino.
                            Sem dúvidas, a vontade do povo do Sul do Paraná
                            o faz alcançar feitos notáveis e vencer os
                            extremos mais inimagináveis.</p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <main class="px-2 px-md-0 my-5">
        <div class="container pb-4">
            <div class="row py-3 justify-content-between">
                <h2 class="w-auto">Quem somos</h2>
                <img src="assets/img/atema-logo-colorido.png" class="w-25">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#0a8f72" class="bi bi-tree"
                             viewBox="0 0 16 16">
                            <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Contribuir para a evolução de políticas públicas em
                            geral, com ênfase nas áreas do turismo e meio ambiente, agricultura orgânica, apicultura,
                            agroindústria, agro-floresta e o “Pagamento por Serviços Ambientais”,
                            cultura e patrimônio histórico, voltadas ao desenvolvimento sustentável.</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#0a8f72" class="bi bi-bank"
                             viewBox="0 0 16 16">
                            <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Trabalhar, gerir, estabelecer por todos os meios lícitos
                            e disponíveis em benefício do turismo e do meio ambiente, como uma alternativa ao
                            desenvolvimento aos municípios atendidos pela ATEMA, pela potencialidade do patrimônio natural,
                            histórico e cultural, e região.</p>
                    </div>
                </div>
                <div class="col-12 card mb-3">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#0a8f72"
                             class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Servir de base institucional às comunidades a que se
                            dedica visando o seu desenvolvimento.</p>
                    </div>
                </div>
                <div class="col-12 card">
                    <div class="card-body d-flex gap-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="#0a8f72" class="bi bi-building"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                        </svg>
                        <p class="m-0" style="text-align: justify">Estabelecer relações e estreita articulação com órgãos,
                            empresas públicas ou privadas, autarquias e entidades da União, do Estado e com as
                            municipalidades, bem como instituições do Terceiro Setor e outras entidades ligadas ao turismo e
                            ao meio ambiente tendo em vista somar esforços em torno dos mesmos objetivos.</p>
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
    <div id="contato" class="container-fluid" style="background: #0a8f72">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-6">
                    <img src="/assets/img/SulPR_logo_h_branca_transp.png" class="img-fluid w-25">
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
