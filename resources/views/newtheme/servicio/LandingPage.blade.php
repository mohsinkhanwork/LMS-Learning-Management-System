<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('Landing page/styles.css')}}">

  <!-- font-family: "SF UI Text" sans-serif -->
  <link rel="stylesheet" href="{{asset('Landing page/assets/fonts/fonts.css')}}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  

</head>

<!-- create user modal -->

<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
              

    <div class="modal-header" style="background-color: #0172EB">
            
                  <div class="row">
                    <h3 class="col-md-12  modal-title go-login float-right text-info pr-0 pointer" style="text-align: center; color: white;">

                    Crear una cuenta</h3>
                    
                  
                    
                  </div>
    

                  <button type="button" class="close" data-dismiss="modal">×</button>
      </div>



    <div class="modal-body"  style="background-color: #f0f4fa; padding: 22px;">
    
       <form id="registerForm" autocomplete="off" class="contact_form" action="#" method="post">
                                {!! csrf_field() !!}
                                
                                <div class="row">   
                                <div class="col-md-6 contact-info mb-2">

                                    <label for="usr" style="color:black">Nombre:</label>
                                   
                                    <input type="text" required="required" name="first_name" id="first_name" class="form-control" placeholder="Nombre" style="background-color: #ffffff;">
                                    <span id="first-name-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Apellido:</label>
                                    
                                    <input type="text" name="last_name" required="required" id="last_name" class="form-control" placeholder="Apellido" style="background-color: #ffffff;">
                                    <span id="last-name-error" class="text-danger"></span>

                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Email:</label>
                                   
                                    <input type="email" name="email" required="required" id="email" class="form-control" placeholder="Email" style="background-color: #ffffff;">
                                    <span id="email-error" class="text-danger email-error"></span>

                                </div>
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Contraseña:</label>
                                   
                              <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Contraseña" style="background-color: #ffffff;">
                                    <span id="password-error" class="text-danger password-error"></span>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Repite la contraseña :</label>
                                   
                                     <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite la contraseña " style="background-color: #ffffff;" required="required">
                                </div>
                                <div class="col-md-6">

                <input type="hidden" name="refferal_code_affilate" value="{{request()->refferal_code ?? ''}}">


                 @if(config('access.captcha.registration'))
                                        <div class="contact-info mt-3 text-center">
                                            {{ no_captcha()->display() }}
                                            {{ html()->hidden('captcha_status', 'true')->id('captcha_status') }}
                                            <span id="captcha-error" class="text-danger"></span>

                                        </div><!--col-->
                                    @endif
          <button  type="submit" value="Submit" class="btn btn-success loginmod" style="padding: 20px; margin: 20px; background-color: #84c794; line-height: 0.5;">Crear cuenta</button>
                                </div>
                                </div>
                       
                            </form>

</div>

</div>
</div>
</div>

{{-- end modal --}}

<body>

  <section class="l-cover-section">
    <div class="l-cover">
      <div class="l-cover-h"> Gana dinero con nuestros cursos, <br> COMISIONES DEL 80% </div>
      <div class="l-cover-p"> Usa tu enlace de afiliado entre tus seguidores y <br>
        convierte tu influencia en un negocio</div>

      <a href="#" class="l-cover-btn" data-toggle="modal" data-target="#createUser">
        Crear una cuenta
      </a>
    
    </div>
  </section>

  <section class="l-section-2">
    <div class="l-box-container">
      <div class="row">
        <div class="col-sm-6">

          <div class="l-box">
            <div class="l-box-left">
              <div class="l-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="33" aria-hidden="true" focusable="false"
                  data-prefix="fas" data-icon="dollar-sign" role="img" viewBox="0 0 288 512">
                  <path fill="currentColor"
                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z" />
                </svg>
              </div>
            </div>
            <div class="l-box-right">
              <div class="l-box-title">
                Gana comisiones del 80%
              </div>
              <div class="l-box-text">
                Ganarás el 80% del precio del valor del
                curso.
              </div>
            </div>
          </div>

          <div class="l-box">
            <div class="l-box-left">
              <div class="l-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="33" aria-hidden="true" focusable="false"
                  data-prefix="fas" data-icon="share-alt" role="img" viewBox="0 0 448 512">
                  <path fill="currentColor"
                    d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z" />
                </svg>
              </div>
            </div>
            <div class="l-box-right">
              <div class="l-box-title"> COMPARTE TU ENLACE DE AFILIADO </div>
              <div class="l-box-text">
                Cuando creas una cuenta obtienes un enlace único. Cada vez que una persona realice una compra a través
                de tu enlace recibirás el 80%..
              </div>
            </div>
          </div>

        </div>
        <div class="col-sm-6">

          <div class="l-box">
            <div class="l-box-left">
              <div class="l-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="33" aria-hidden="true" focusable="false"
                  data-prefix="fab" data-icon="paypal" role="img" viewBox="0 0 384 512">
                  <path fill="currentColor"
                    d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4.7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9.7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z" />
                </svg>
              </div>
            </div>
            <div class="l-box-right">
              <div class="l-box-title">
                RECIBE EL DINERO EN PAYPAL
              </div>
              <div class="l-box-text">
                Hacemos los pagos al finalizar cada mes.
              </div>
            </div>
          </div>

          <div class="l-box">
            <div class="l-box-left">
              <div class="l-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="33" aria-hidden="true" focusable="false"
                  data-prefix="fas" data-icon="book-reader" role="img" viewBox="0 0 512 512">
                  <path fill="currentColor"
                    d="M352 96c0-53.02-42.98-96-96-96s-96 42.98-96 96 42.98 96 96 96 96-42.98 96-96zM233.59 241.1c-59.33-36.32-155.43-46.3-203.79-49.05C13.55 191.13 0 203.51 0 219.14v222.8c0 14.33 11.59 26.28 26.49 27.05 43.66 2.29 131.99 10.68 193.04 41.43 9.37 4.72 20.48-1.71 20.48-11.87V252.56c-.01-4.67-2.32-8.95-6.42-11.46zm248.61-49.05c-48.35 2.74-144.46 12.73-203.78 49.05-4.1 2.51-6.41 6.96-6.41 11.63v245.79c0 10.19 11.14 16.63 20.54 11.9 61.04-30.72 149.32-39.11 192.97-41.4 14.9-.78 26.49-12.73 26.49-27.06V219.14c-.01-15.63-13.56-28.01-29.81-27.09z" />
                </svg>
              </div>
            </div>
            <div class="l-box-right">
              <div class="l-box-title"> CURSOS DE ESCRITURA ÚNICOS </div>
              <div class="l-box-text">
                Los alumnos acceden al curso online, pero también hay clases por videoconferencia y herramientas
                excepcionales.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="quote-section">
    <div class="l-quote">
      "La formación que ofrece la escuela es la más
      completa a nivel internacional. Los alumnos
      acceden a cursos online complementados con
      clases por videoconferencia, reciben un
      seguimiento personalizado y se integran en una
      poderosa comunidad enfocada en sacar adelante a
      los escritores".
    </div>
    <div class="l-author">
      <div class="l-img"> </div>
      <div>
        <div class="name"> Ray Bolívar </div>
        <div class="text"> Experto en Escritura Creativa</div>
      </div>
    </div>
  </section>


  <section class="faq-section">
    <div class="l-faq-title"> PREGUNTAS FRECUENTES </div>
    <div class="faq-content">

      <div class="l-question">
        <input type="checkbox" id="question1" name="q" class="questions">
        <div class="plus"></div>
        <label for="question1" class="question">
          ¿Qué debo hacer para unirme al programa de afiliados?
        </label>
        <div class="answers">
          Crea una cuenta y empieza a compartir tu enlace entre tus amigos o entre tu audiencia.
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question2" name="q" class="questions">
        <div class="plus"></div>
        <label for="question2" class="question">
          ¿Puedo ganar 300€ con cada venta?
        </label>
        <div class="answers">
          Puedes ganar 349€ con cada venta. Para ello, es preciso convertirte en un embajador de la escuela. Para
          convertirse en embajador necesitas vender un mínimo de 5 suscripciones de 39.99€. Una vez que vendas estas
          suscripciones recibirás ofertas con descuentos especiales creados exclusivamente para ti.
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question3" name="q" class="questions">
        <div class="plus"></div>
        <label for="question3" class="question">
          ¿Cobraré el 80% por cada compra que realicen las personas que remita a la escuela?
        </label>
        <div class="answers">
          No, cobrarás el 80% de la primera venta.
          <br><br>
          Ejemplo.
          <br><br>
          Si el suscriptor compra una suscripción de <b> 39.99€ </b> ganarás una comisión de <b> 29.99€ solo una vez.
          </b>
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question4" name="q" class="questions">
        <div class="plus"></div>
        <label for="question4" class="question">
          ¿Qué pasa si envío a mucha gente, pero prefieren matricular en el curso gratuito?
        </label>
        <div class="answers">
          Generalmente en el plazo de 6 - 8 semanas, los alumnos inscritos en el curso gratuito deciden beneficiarse de
          los contenidos premium de la escuela. Aunque haya pasado un año o incluso dos, cuando el suscriptor realice la
          compra recibirás el dinero en tu cuenta de afiliado.
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question5" name="q" class="questions">
        <div class="plus"></div>
        <label for="question5" class="question">
          ¿La escuela me enseña a vender los cursos?
        </label>
        <div class="answers">
          Sí. Una vez que te registras en la escuela compartiremos contigo un <b>conjunto de técnicas </b> que te
          ayudarán a sacar provecho de las ventajas de nuestra formación.
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question6" name="q" class="questions">
        <div class="plus"></div>
        <label for="question6" class="question">
          ¿Cuándo recibiré los pagos?
        </label>
        <div class="answers">
          Entre el día 1 y 5 del mes siguiente.
          <br><br>
          Ejemplo.
          <br><br>
          Si el alumno compra el día 14 de octubre. Entre el día 1 y 5 de noviembre tendrás el dinero en tu cuenta de
          Paypal.
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question7" name="q" class="questions">
        <div class="plus"></div>
        <label for="question7" class="question">
          ¿Recibiré los pagos en mi cuenta de Paypal?
        </label>
        <div class="answers">
          Sí.
        </div>
      </div>

      <div class="l-question">
        <input type="checkbox" id="question8" name="q" class="questions">
        <div class="plus"></div>
        <label for="question8" class="question">
          ¿La calidad de los cursos es buena?
        </label>
        <div class="answers">
          Es excepcional, tanto la calidad como la atención personalizada que recibe cada uno de los alumnos.
        </div>
      </div>

      <p>Si tienes alguna duda haz clic en el siguiente
        enlace y escríbenos, nos encantar estar en
        contacto con el mundo <a href="{{ url('/contacto') }}" target="_blank">Escríbenos</a> </p>

    </div>
  </section>

  <footer class="l-footer">
    <div class="copyright">© 2021 - Escuela de Escritura Creativa</div>
  </footer>


<script type="text/javascript">

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
                        url: "{{  route('frontend.auth.register_one')}}",
                        data: $this.serializeArray(),
                        dataType: $this.data('type'),
                        success: function (data) {
                            $('#first-name-error').empty()
                            $('#last-name-error').empty()
                            $('#email-error').empty()
                            $('#password-error').empty()
                            $('#captcha-error').empty()
                            if (data.errors) {
                                if (data.errors.first_name) {
                                    $('#first-name-error').html(data.errors.first_name[0]);
                                }
                                if (data.errors.last_name) {
                                    $('#last-name-error').html(data.errors.last_name[0]);
                                }
                                if (data.errors.email) {
                                    $('.email-error').html('Este email ya existe');
                                }
                                if (data.errors.password) {
                        $('.password-error').html('Su contraseña debe tener más de 8 caracteres, debe contener al menos 1 mayúscula, 1 minúscula y 1 número');
                                }

                                var captcha = "g-recaptcha-response";
                                if (data.errors[captcha]) {
                                    $('#captcha-error').html(data.errors[captcha][0]);
                                }
                            }
                            if (data.success) {
                              // alert('success');
                                window.location.href = "{{ url('/user/Student_affliate') }}";
                               
                            }
                        }
                    });
                });
  
</script>


<script type="text/javascript">
    $( document ).ready(function() {
    $('input').attr('autocomplete','off');
});
</script>



</body>
</html>