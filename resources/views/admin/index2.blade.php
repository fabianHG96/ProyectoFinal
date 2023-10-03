@extends('layouts.home2')
@section('home')
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Bienvenido {{ $user->name }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-left" >
                        <li class="nav-item"><a class="nav-link text-dark" href="{{route('home2')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="{{route('menu2')}}">Menu</a></li>
                    </ul>

                </div>
                    <ul class="navbar-nav nav justify-content-end">
                        <li class="nav-item "><a class="nav-link text-dark" href="{{route('logout')}}">Cerrar sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-light bg-dark" style="padding-top: 130px">
            <div class="masthead-content" display="flex" >
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0 text-primary text-danger">Coffe Time</h1>
                    <h3 class="masthead-subheading mb-0">Cafeteria Chilena</h3>
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
                            <p>En nuestra cafetería, nos enorgullece ofrecer una atención al cliente excepcional. Nuestro personal amable y capacitado siempre está listo para hacer que tu visita sea especial. Tu satisfacción es nuestra prioridad número uno.</p>
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
                            <p>En nuestra cafetería, no solo nos enorgullece ofrecer un excelente servicio al cliente, sino que también nos esforzamos por mantener precios bajos y accesibles. Creemos que todos merecen disfrutar de una taza de café de calidad y deliciosa comida sin que esto signifique gastar una fortuna. Nuestro compromiso es brindar una experiencia placentera y asequible para todos nuestros clientes.</p>
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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://i.pinimg.com/564x/59/fc/75/59fc75f4f0336f0e5fb937cb83d319d1.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Paga como tu quieras</h2>
                            <p>En nuestra cafetería, ofrecemos la flexibilidad que necesitas en tus opciones de pago. Puedes pagar de la forma que más te convenga, ya sea con efectivo, tarjeta de crédito o débito, aplicaciones de pago móvil o cualquier otra forma que prefieras.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        @endsection

