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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://i.pinimg.com/750x/ab/c8/81/abc88166e368d4b7099c7b84d01ec324.jpg" alt="..." /></div>
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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://i.pinimg.com/750x/b1/37/af/b137afd3d1ccb907a2f5aa0bc9874b46.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Nuestra Vision.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut arcu vel nulla tempus tempus ut sit amet tortor. Phasellus tempus a nibh eu malesuada. Praesent interdum pulvinar vulputate. Vestibulum finibus justo mi, ut lacinia enim vehicula vel. Cras in sapien convallis, vulputate leo nec, dignissim velit. Nunc id nunc vitae risus sagittis malesuada ut id est. Integer volutpat dui felis, et fringilla enim laoreet id. In mattis mollis leo id mattis.</p>
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
                        <div class="p-5">
                            <h2 class="display-4">Nuestros Valores.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut arcu vel nulla tempus tempus ut sit amet tortor. Phasellus tempus a nibh eu malesuada. Praesent interdum pulvinar vulputate. Vestibulum finibus justo mi, ut lacinia enim vehicula vel. Cras in sapien convallis, vulputate leo nec, dignissim velit. Nunc id nunc vitae risus sagittis malesuada ut id est. Integer volutpat dui felis, et fringilla enim laoreet id. In mattis mollis leo id mattis.</p>
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

