<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('header_css/style.css')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('newtheme/content/favico/heart.png')}}" />
<title> CURSOS DE ESCRITURA ONLINE GRATIS </title>

<link rel="stylesheet" href="{{asset('header_css/style.css')}}">
<title> Free Online Writing Course </title>

</head>
<body>
<!-- top-section -->
    <section class="top-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="top-big-txt"><b>CURSOS DE</b> ESCRITURA <b>ONLINE</b> <b>GRATIS</b></p>
                </div>
                <div class="col-lg-6">

                    <p class="top-mini-txt">
                    <a href="{{ route('courses.show', ['slug' => 'como-escribir-una-novela-en-6-meses']) }}" target="_blank"> <b> Si lo que te interesa es el curso de novela online haz clic en este enlace.</b></a>  

                     </p>


                    <p class="top-mini-txt">La escuela no solo imparte cursos online de <b>escritura gratis, en ella podrás beneficiarte de</b> , contenidos estratégicos que impulsarán tu <b>carrera de escritor hasta conseguir tus objetivos. </b> <br> <br> Si lo que te interesa es el curso de novela online haz clic en este enlace. </p>

                </div>
            </div>
        </div>
    </section>
<!-- signup-section -->
    <section class="signup-section">
        <div class="container">
            <h1>Inscríbete</h1>
            <p>Un taller renovador, didáctico y muy interactivo. Aprende las técnicas narrativas más eficientes con clases por videoconferencia</p>

           <form id="registerForm" autocomplete="off" class="contact_form" action="#" method="post">

                                    {!! csrf_field() !!}
                
              

        <div class="row justify-content-center">
                <input type="text" name="first_name" id="first_name" required="required" placeholder="nombre completo">
                <span id="first-name-error" class="text-danger"></span>
           
           
                <input type="email" name="email" required="required" placeholder="E-mail">
                <span id="email-error" class="text-danger email-error"></span>

         
         
                 <input type="hidden" name="refferal_code_affilate" value="{{request()->refferal_code ?? ''}}">

           
                <input id="registerButton" type="submit" value=" Enviar" placeholder="Name" value="I want to register">

        </div>

        <div class="row justify-content-center">
            <p> Su contraseña será enviada a su correo electrónico para la próxima vez que inicie sesión. </p>
        </div>

            </form>
        </div>
         @if(config('access.captcha.registration'))
                                        <div class="contact-info mt-3 text-center">
                                            {{ no_captcha()->display() }}
                                            {{ html()->hidden('captcha_status', 'true')->id('captcha_status') }}
                                            <span id="captcha-error" class="text-danger"></span>

                                        </div><!--col-->
                                    @endif

            <div class="row justify-content-center">
                <input type="text" placeholder="Name">
                <input type="email" placeholder="E-mail">
                <input type="submit" placeholder="Name" value="I want to register">
            </div>
        </div>

    </section>
<!-- banner section -->
    <section class="banner-section">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-md-6 left-banner">
                    <p>Más de 500 alumnos suscritos. Las clases son por videoconferencia. El profesor es escritor.</p>
                </div>
                <div class="col-md-4 right-banner">
                    <p>Taller de escritura creativa gratuito</p>
                    <hr>
                    <span>Los tres primeros martes de cada mes.  Horario: martes a las 8 pm. Hora de España.  Modalidad:videoconferencia. </span>
                </div>
            </div>
        </div>
    </section>
<!-- talk section -->
    <section class="talk-section pb-5">
        <div class="container">
            <h2>Consulta las próximas charlas</h2>


            <p class="lead">Consulta las próximas sesiones del taller en Facebook. <a href="https://www.facebook.com/groups/1404729079560733" target="_blank"> Únete a nuestro grupo.</a></p>

            <p class="lead">Consulta las próximas sesiones del taller en Facebook. Únete a nuestro grupo.</p>

<!--   <p class="lead">Check the next creative writing classes <a href="https://escuela-ray-bolivar-sosa.com/clases-de-escritura-creativa/">in the events section. </a></p>
 -->


        </div>
    </section>
<!-- school section -->
    <section class="school-section">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <div class="row mb-4 left-school">
                        <div class="col-5">
                            <span class="lead">Compártelo:</span>
                        </div>
                        <div class="col-5">
                            <div class="row justify-content-around">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 right-school">

                    <h1>FORMACIÓN EN LA ESCUELA</h1>


                    <h2>Formación de la escuela</h2>

                    <p>La formación está dirigida a dotar a los alumnos de las habilidades técnicas necesarias para generar textos memorables que impacten en el lector generando un recuerdo duradero. El plan de estudio abarca la creación del inicio y el final, el desarrollo del clímax y de la trama, la elaboración del final, la caracterización del personaje, entre otros aspectos.</p>

                    <h2>Por qué te conviene inscribirte en el taller de escritura creativa</h2>

                    <p>El curso online de escritura gratis más conocido como el taller de escritura, es uno de los espacios más demandados por los alumnos. Cada semana, los alumnos reciben un email con una invitación al taller.</p>

                    <p>No es necesario que te muevas de casa. Tan solo necesitas un ordenador y conexión a Internet. En los talleres los alumnos interactúan con el profesor bajo un entorno agradable que les permite aprender nuevas habilidades escriturales, aclarar las dudas y participar en los debates.</p>


                    <p class="lead"> <b>LAS MAYORES VENTAJAS DE PARTICIPAR EN EL TALLER</b></p>
                    <ul>
                        <li>Aprender técnicas narrativas para escribir una novela o un cuento.</li>

                    <p class="lead">LAS MAYORES VENTAJAS DE PARTICIPAR EN EL TALLER</p>
                    <ul>
                        <li>Aprender técnicas narrativas para escribir una novela o un cuento</li>

                        <li>Desarrollar habilidades comunicativas.</li>
                        <li>Aclarar dudas.</li>
                        <li>Ejercer la crítica responsable.</li>
                        <li>Recibir consejos y recomendaciones de otros talleristas.</li>
                    </ul>


                    <p class="lead"> <b>CURSOS DE ESCRITURA ONLINE GRATIS</b></p>

                    <p class="lead">CURSOS DE ESCRITURA ONLINE GRATIS</p>


                    <p>La escuela de escritura creativa madrid no solo imparte cursos online de escritura gratis, en ella podrás beneficiarte de contenidos estratégicos que te ayudarán a impulsar tu carrera de escritor hasta conseguir tus objetivos.</p>

                    <p>Trabajamos regularmente con estudiantes interesados en mejorar sus habilidades creativas. La formación es online y muy efectiva. Abarca charlas, tutorías personalizadas, discusión y elaboración de textos, y la enseñanza de técnicas narrativas que son considerados un pilar para convertirse en escritor.</p>



                    <p><b>Píldoras de escritura creativa</b></p>

                    <p>Están enfocadas a los principiantes o a escritores que tienen dificultades con un tema en concreto. La mayor virtud de las píldoras es su concisión. Los escritores acceden a un contenido especializado que eliminará sus dudas. Puedes consultar las píldoras en este enlace.
                    La escuela de escritura creativa madrid cuenta con un amplio catálogo de cursos que te guiarán hasta conseguir las destrezas escriturales que necesitas. La formación en escritura creativa madrid es personalizada, por eso se admite solo un grupo de alumnos cada vez. Durante la formación recibirás asesorías personalizadas muy efectivas para avanzar en el desarrollo de la trama y conseguir una obra redonda.</p>

                    <p><b>Paga 39.99€/mes y accede a todos los cursos</b></p>

                    <p>La escuela ofrece acceso a todos los cursos a partir de dos planes básicos. Puedes elegir entre el <a href="https://escuela-ray-bolivar-sosa.com/public/subscription/price_plans" target="_blank"> plan de 39.99€/mes o el de 68€</a>. Ambos planes te ofrecen la posibilidad de acceder a todos los contenidos. Sin embargo, el plan de 68€/mes te brindará la posibilidad de trabajar con un tutor especializado. <a href="https://escuela-ray-bolivar-sosa.com/public/subscription/price_plans" target="_blank">Consulta los planes en este enlace </a>. </p>

                    <p>La escuela de escritura creativa madrid cuenta con un amplio catálogo de cursos que te guiarán hasta conseguir las destrezas escriturales que necesitas</p>

                    <p>Píldoras de escritura creativa</p>

                    <p>Están enfocadas a los principiantes o a escritores que tienen dificultades con un tema en concreto. La mayor virtud de las píldoras es su concisión. Los escritores acceden a un contenido especializado que eliminará sus dudas. Puedes consultar las píldoras en este enlace</p>

                    <p><b>Paga 39.99€/mes y accede a todos los cursos</b></p>

                    <p>La escuela ofrece acceso a todos los cursos a partir de dos planes básicos. Puedes elegir entre el plan de 39.99€/mes o el de 68€. Ambos planes te ofrecen la posibilidad de acceder a todos los contenidos. Sin embargo, el plan de 68€/mes te brindará la posibilidad de trabajar con un tutor especializado. Consulta los planes en este enlace. </p>


                    <p>La formación que ofrece la escuela es integral. Aprenderás a escribir una novela memorable y desarrollarás habilidades para vender tu libro online, crear tu página de Facebook, publicar un libro en Amazon o escribir historias cortas con personajes memorables. </p>

                    <p><b>Máster de escritura creativa </b></p>

                    <p>El máster admite alumnos con un nivel inicial. No es necesario tener estudios universitarios. La formación es didáctica y muy intuitiva. Los alumnos desarrollan las habilidades necesarias para producir textos con un alto valor literario.</p>
                    
                    <p><b>Curso de novela online</b></p>

                    <p>El curso de novela online te ayudará a escribir la novela de tus sueños. A lo largo de la formación trabajaremos el inicio y el final, la trama, el desarrollo de los personajes, la evolución de la trama, entre otros aspectos.</p>


                
                    <p>La formación en escritura creativa madrid es personalizada, por eso se admite solo un grupo de alumnos cada vez. Durante la formación recibirás asesorías personalizadas muy efectivas para avanzar en el desarrollo de la trama y conseguir una obra redonda</p>

                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">

        $(document).ready(function () {

         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

         $(document).on('submit','#registerForm', function (e) {
                    e.preventDefault();
                    var $this = $(this);

                    $.ajax({
                        type: $this.attr('method'),
                        url: "{{  route('frontend.auth.register_lead')}}",
                        data: $this.serializeArray(),
                        dataType: $this.data('type'),
                        success: function (data) {
                            $('#first-name-error').empty()
                            $('#email-error').empty()
                            $('#captcha-error').empty()
                            if (data.errors) {
                                if (data.errors.first_name) {
                                    $('#first-name-error').html(data.errors.first_name[0]);
                                }
                                
                                if (data.errors.email) {
                                    $('.email-error').html('Este email ya existe');
                                }
                                
                                var captcha = "g-recaptcha-response";
                                if (data.errors[captcha]) {
                                    $('#captcha-error').html(data.errors[captcha][0]);
                                }
                            }
                            if (data.success) {

                                // window.location.href = "{{route('firstuser')}}";
                                window.location.href = "{{url('/')}}";
                   
                        }
                    }
                });
            });
        });

</script>



</body>
</html>