@extends('layouts.main')
@section('main-content')
        <!-- Header-->
        <header class="masthead text-center text-light bg-dark" style="padding-top: 130px">
            <div class="masthead-content" display="flex" >
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0 text-primary text-danger">Integral Flex</h1>
                    <h3 class="masthead-subheading mb-0">Fleximaq SPA</h3>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Saber mas...</a>

                </div>
            </div>
            <div class="bg-circle-1 bg-circle" style="padding-top: 280px"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <!-- Content section 1-->
        <section id="scroll" style="bg-success" >
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('assets\img\imagenmision.jpg') }}" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Nuestra mision.</h2>
                            <p>En Integral Flex, nuestra misión es proporcionar a las empresas una solución integral para gestionar sus ventas, usuarios, documentación y procesos esenciales. Nos esforzamos por ofrecer una plataforma fácil de usar y personalizable que se adapte a las necesidades de cada organización. Nuestro objetivo es ayudar a las empresas a mejorar su eficiencia y productividad al simplificar sus procesos internos. Nos enorgullece trabajar con Fleximaq SPA y esperamos seguir colaborando con ellos para mejorar aún más nuestro sistema.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('assets\img\imagenvision.jpg') }}" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Nuestra Vision.</h2>
                            <p>La visión de IntegralFlex es ser un socio confiable en la gestión empresarial. Nos esforzamos por ofrecer soluciones integrales que permitan a las empresas mejorar su eficiencia y productividad. Nuestra visión es continuar trabajando en colaboración con Fleximaq SPA y otras organizaciones para seguir mejorando y personalizando nuestras soluciones, ayudando así a las empresas a simplificar sus procesos internos y alcanzar sus objetivos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="{{ asset('assets\img\logo.jpg') }}" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-3">
                            <h2 class="display-4">Nuestros Valores.</h2>
                            <p>Calidad: Nos comprometemos a ofrecer soluciones de alta calidad para satisfacer las necesidades de las empresas.</p>
                            <p>Innovación: Buscamos constantemente maneras de mejorar y personalizar nuestras soluciones.</p>
                            <p>Colaboración: Valoramos las relaciones a largo plazo y trabajamos en estrecha colaboración con nuestros clientes y socios.</p>
                            <p>Adaptabilidad: Ofrecemos soluciones personalizadas que se ajustan a las necesidades de cada empresa.</p>
                            <p>Integridad: Operamos con honestidad y ética en todas nuestras acciones.</p>
                            <p>Enfoque en el cliente: Nos centramos en comprender y satisfacer las necesidades de nuestros clientes.</p>
                            <p>Mejora continua: Buscamos la mejora constante en todo lo que hacemos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Integral Flex 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        @endsection

