<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<title>publish book on amazon</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{asset('publicar/style.css')}}">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src='https://js.stripe.com/v2/' type='text/javascript'></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script type='text/javascript' src='https://js.stripe.com/v3/?ver=5.7.2' id='stripe.js-js'></script>

</head>
<body>

 <div class="modal fade" id="createUser" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->

              <div class="modal-content">
                <div class="" style="text-align:center">
                  
                  <h3 class="" style="text-align: center; margin: 20px;"> Pago seguro </h3>
                </div>
                <div class="container" style="max-width: 100%">
                    <div class="modal-body" style="padding: 0">
                        
                        <div class="cartbody">
                        </div>
                        <br>
                        <table class="table table" style="">
                            <thead></thead>
                            <tbody>
                             


                                <tr><td> Stripe
                                    <div>
                                        
                                            <div class="payment-method w-100 mb-0 div1" style="">
                                                <div class="payment-method-header">
                                                    <div class="row" style="justify-content: right">
                                                        <div class="col-md-6">
                                                            <div class="payment-img float-right">
                                                                <img src="{{asset('assets/img/banner/p-1.jpg')}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="check-out-form collapse show" id="collapsePaymentOne"
                                                     data-parent="#accordion">


<form accept-charset="UTF-8"
      action="{{route('cart.stripe.payment')}}"
      class="require-validation" data-cc-on-file="false"
      data-stripe-publishable-key="pk_live_s93897A5XKpAwFfqQv2q1hIA"
      id="payment-form"
      method="POST">

                                                        <div style="margin:0;padding:0;display:inline">
                                                            <input name="utf8" type="hidden"
                                                                   value="✓"/>
                                                            @csrf
                                                        </div>


                                                        <div class="payment-info">
                                                            <label class=" control-label">Nombre en la tarjeta
                                                                :</label>
                                                            <input type="text" autocomplete='off'
                                                                   class="form-control required card-name"
                                                                   placeholder="@lang('labels.frontend.cart.name_on_card_placeholder')"
                                                                   value="">
                                                        </div>
                                                        <div class="payment-info">
                                                            <label class=" control-label">Número de tarjeta
                                                                :</label>
                                                            <input autocomplete='off' type="text"
                                                                   class="form-control required card-number"
                                                                   placeholder="@lang('labels.frontend.cart.card_number_placeholder')"
                                                                   value="">
                                                        </div>
                                                        <div class="payment-info input-2">
                                                            <label class=" control-label">@lang('labels.frontend.cart.cvv')
                                                                :</label>
                                                            <input type="text" class="form-control card-cvc required"
                                                                   placeholder="@lang('labels.frontend.cart.cvv')"
                                                                   value="">
                                                        </div>
                                                        <div class="payment-info input-2">
                                                            <label class=" control-label">Fecha de expiración
                                                                :</label>
                                                            <input autocomplete='off' type="text"
                                                                   class="form-control required card-expiry-month"
                                                                   placeholder="@lang('labels.frontend.cart.mm')"
                                                                   value=""> <br>
                                                            <input autocomplete='off' type="text"
                                                                   class="form-control required card-expiry-year"
                                                                   placeholder="@lang('labels.frontend.cart.yy')"
                                                                   value="">
                                                        </div>
                                                       <br>
                                                       <div style="text-align: center;">
                                                        <button type="submit" class="btn btn-primary">Pagar</button>
                                                           
                                                       </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12 error form-group d-none">
                                                                <div class="alert-danger alert">
                                                                    @lang('labels.frontend.cart.stripe_error_message')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </td><td></td><td></td></tr>
                            </tbody>
                            
                        </table>
                      
                    </div>
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>
              
            </div>
          </div>

<!-- hero-section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <p>PUBLISH YOUR BOOK ON AMAZON</p>
                <a href="#" onclick="priceplan()" data-toggle="modal" data-target="#createUser" class="btn">Buy Bronze Plan € 230</a>
            </div>
            <div class="col-lg-6 mt-5 text-center">
                <img src="{{asset('publicar/img/tparent.webp')}}" alt="hero" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- icon-section -->
<section class="icon-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <span><i class="fa fa-briefcase"></i></span>
                    </div>
                    <div class="col-md-8">
                        <h5>PROFESSIONAL LAYOUT</h5>
                        <p>Make the book shine to its full magnitude. Make sure you post a text with the proper structure, it makes it easy to read with a beautiful finish.</p>
                    </div>
                </div>
            </div>


            <div class="col-md-6 mt-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <span><i class="fa fa-calculator"></i></span>
                    </div>
                    <div class="col-md-8">
                        <h5>CATEGORY SELECTION AND ACCOUNT CREATION</h5>
                        <p>Make sure your book finds its readers, we choose the most appropriate category and also create your Amazon account.</p>
                    </div>
                </div>
            </div>


            <div class="col-md-6 mt-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <span><i class="fa fa-credit-card"></i></span>
                    </div>
                    <div class="col-md-8">
                        <h5>SUITABLE KEYWORDS</h5>
                        <p>Research and selection of the right keywords, generate sales from the keywords.</p>
                    </div>
                </div>
            </div>

            
            <div class="col-md-6 mt-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <span><i class="fa fa-book"></i></span>
                    </div>
                    <div class="col-md-8">
                        <h5>CREATION OF PROFESSIONAL SYNOPSIS</h5>
                        <p>Arouse the curiosity of the reader, show the strengths of your work, use an irresistible synopsis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!-- price sectiion -->
<section class="price-seection">
    <h1>PERFECT PLANS FOR YOUR POCKET</h1>
    <p>All plans include publication in both paper and digital format</p>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">
                <div class="card">
                    <h1>€ 150</h1>
                    <p>BASIC PLAN</p>
                    <hr>
                    <ul>
                        <li>Professional layout</li>
                        <li>Selection of categories</li>
                        <li>Keywords</li>
                        <li>Creation of professional synopsis</li>
                    </ul>
                    <a href="#" onclick="priceplan()" data-toggle="modal" data-target="#createUser"><div class="btn">To buy</div></a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="card mid-card">
                    <h1>€ 230</h1>
                    <p>BRONZE PLAN</p>
                    <hr>
                    <ul>
                        <li>Includes all basic plan options</li>
                        <li>Cover creation</li>
                        <li>Unlimited reviews</li>
                        <li>Advice during launch</li>
                    </ul>
                    <a href="#" onclick="priceplan()" data-toggle="modal" data-target="#createUser"><div class="btn">To buy</div></a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="card">
                    <h1>€ 320</h1>
                    <p>GOLD PLAN</p>
                    <hr>
                    <ul>
                        <li>Professional layout</li>
                        <li>Selection of categories</li>
                        <li>Keywords</li>
                        <li>Creation of professional synopsis</li>
                    </ul>
                    <a href="#" onclick="priceplan()" data-toggle="modal" data-target="#createUser"><div class="btn">To buy</div></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-section -->
<section class="test-section">
    <h1>WHAT CUSTOMERS SAY</h1>
    <div class="container">
        <div class="row">


            <div class="col-md-6 mt-5">
                <p>"Ray has helped me to layout the book and publish it on Amazon. He has been professional and efficient. He has been generous. Since I have started a series of technical books, I will continue to hire his services. I recommend his work, if you really want me to your book goes ahead with success. "</p>
                <div class="row align-items-center ml-1">
                    <img src="{{asset('publicar/img/susi.webp')}}" alt="susi" class="img-fluid">
                    <span><b>SUSI GRAU</b><br>Writer</span>
                </div>
            </div>


            <div class="col-md-6 mt-5">
                <p>"I think I'm the oldest, teariest, and whiniest client Ray has. But Ray is the wisest, most patient, and most empathetic literary coach I've ever had. (... I love working with him and highly recommend him)."</p>
                <div class="row align-items-center ml-1">
                    <img src="{{asset('publicar/img/fotoluisa.webp')}}" alt="susi" class="img-fluid">
                    <span><b>LUISA HORNO</b><br>Writer</span>
                </div>
            </div>


            <div class="col-md-6 mt-5">
                <p>"I have nothing but good words for Ray and his great help in publishing the book, thank you very much for everything."</p>
                <div class="row align-items-center ml-1">
                    <img src="{{asset('publicar/img/angel.webp')}}" alt="susi" class="img-fluid">
                    <span><b>ANGEL LUIS GONZALEZ</b><br>Writer</span>
                </div>
            </div>


            <div class="col-md-6 mt-5">
                <p>He worked on my book, on its cover and on the inside. I am very happy with your work. Ray is very communicative, responds quickly to doubts, is always willing to explain, I recommend him. "</p>
                <div class="row align-items-center ml-1">
                    <img src="{{asset('publicar/img/fanny.webp')}}" alt="susi" class="img-fluid">
                    <span><b>FANNY TAQUIVAS</b><br>Writer</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cover-section -->
<section class="cover-section">
    <h1>Cover designs</h1>
    <p>Take a look at our designs</p>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center"><img src="{{asset('publicar/img/book1.webp')}}" alt="books" class="img-fluid"></div>
            <div class="col-md-4 text-center"><img src="{{asset('publicar/img/book2.webp')}}" alt="books" class="img-fluid"></div>
            <div class="col-md-4 text-center"><img src="{{asset('publicar/img/book3.webp')}}" alt="books" class="img-fluid"></div>
        </div>
    </div>
</section>



















<!-- faq section -->
<section class="faq-section">
    <h1>FREQUENT QUESTIONS</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    DOES PUBLISHING A BOOK ON AMAZON COST ANYTHING?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <h1>Publish book on Amazon</h1>
                                <p><b>It costs nothing</b> . You can do the whole process yourself. You are paying for the experience and knowledge that we have. Amazon is the largest market for book sales, encompassing 80% of the market. Hundreds of books are published every day, which makes it difficult to stand out and the author frequently makes mistakes that affect the sales of his works.</p>
                                <h2>Do it on your own</h2>
                                <p>If you want to publish on your own, in this link you will find a very cheap course, for just € 12 you will learn everything you need to publish a book.</p>
                                <a class="mb-2" href="https://escuela-ray-bolivar-sosa.com/courses/aprende-a-publicar-en-amazon/">Course how to publish on Amazon Click here.</a>
                            </div>
                        </div>
                    </div>



                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    WHAT WILL I RECEIVE WHEN I CONTRACT THE SERVICE?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>You will receive the comprehensive publishing service according to the chosen plan. <br><br>

                                    It generally includes: <br><br>
                                    
                                    -creation and configuration of an Amazon account.  <br><br>
                                    
                                    -the layout of the book. <br><br>
                                    
                                    -the choice of the right keywords. <br><br>
                                    
                                    -the creation of a synopsis to publish on your Amazon page and capture the attention of readers. <br><br>
                                    
                                    -the selection of the most suitable categories. <br><br>
                                    
                                    -Specialized advice throughout the process.  <br><br>
                                    
                                    <b>-includes cover design Bronze plan.</b> <br><br>
                                    
                                    -Includes correction of the work.  <b>Gold plan.</b> <br><br>
                                    
                                    -Includes unlimited revisions until the completion of the job. <b>Bronze and gold plan.</b>  <br><br>
                                    
                                    -Includes advice during publication. <b>Bronze and gold plan.</b> </p>
                            </div>
                        </div>
                    </div>






                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    HOW IS THE WORK PROCESS?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p><b>We offer advice during the process</b> <br><br>

                                    We will work closely with the writer throughout the process. A meeting is coordinated through our videoconference system to lay the foundations of your project. <br><br>
                                    
                                    * Keep in mind that to be able to interact through our videoconferencing system it is necessary that you have headphones. <br><br>
                                    
                                    <b>What will we do in this meeting?</b> <br><br>
                                    
                                    We lay the foundations for the publication of your book to be a success.  <br><br> 
                                    
                                    <b>Phase I</b> <br><br>
                                    
                                    Once the interview is done, we will start depending on the publication of your work. We will carry out a thorough analysis that will provide us with valuable information and we will start working. <br><br>
                                    
                                    <b>The author must provide the work in Word format and the cover (basic plan).</b> <br><br>
                                    
                                    <b>Phase ii</b> <br><br>
                                    
                                    We submit an example of the synopsis and request the approval of the writer. <br><br>
                                    
                                    <b>Phase III</b> <br><br>
                                    
                                    With the prior authorization of the writer, we publish the work. The author orders a book in physical format to assess the quality of the publication. <br><br>
                                    
                                    <b>Phase IV</b> <br><br>
                                    
                                    The author sells many books and readers talk about him a lot. They won't always speak well! <br><br>
                                    
                                    We are all happy and we eat partridges!</p>
                            </div>
                        </div>
                    </div>






                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    WHEN WILL I HAVE MY BOOK PUBLISHED?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <p>The book will be available for publication within 30 - 45 days.</p>
                            </div>
                        </div>
                    </div>






                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    WILL I RECEIVE A BOOK AT HOME?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <p><b>Publish book to amazon</b><br><br>

                                    Once the book is published and even before we can request a proof. The price of the book that will arrive at your house will range between 9 and 14 euros, it depends on Amazon. <br><br>
                                    
                                    <b>* The price of this test is paid by the writer.</b></p>
                            </div>
                        </div>
                    </div>






                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    DOES THIS SERVICE INCLUDE A PHYSICAL PRESENTATION OF THE BOOK?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                                <p><b>Publish book on Amazon</b><br><br>

                                    This service does not include the physical presentation of a book but we can help you organize the presentation and you will save a lot of money.  </p>
                            </div>
                        </div>
                    </div>






                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    IN WHAT FORMAT SHOULD I SUBMIT THE FUTURE BOOK?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">
                                <p><b>Publish book on Amazon</b><br><br>

                                    All texts must be submitted in word format, as an attached file. New Times Roman font 12.  </p>
                            </div>
                        </div>
                    </div>





                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    WHAT IS THE MAXIMUM NUMBER OF PAGES THAT WILL BE CORRECTED IN THE GOLD PLAN?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                            <div class="panel-body">
                                <p><b>Publish book on Amazon</b><br><br>

                                    The maximum number of pages is <b>180 pages</b> written in Times New Roman, 12 double-spaced font. In case the book has more pages, it will be budgeted separately.  
                                    
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>


    
</section>



<script type="text/javascript">
            function priceplan(){
                $("#createUser").modal('show');
                $(".card-errors").hide();
                $('.planname').html('Membresía <b> €39.99 cada mes</b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€39.99/mes</h2><br><b style="font-weight: 200"> Precio </b> <b>€39.99 cada mes</b><br><br><b style="font-weight:200">Descripción</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Tutorías y correcciones personalizadas por email</li><li>Acceso al taller (videoconferencia)</li></ol> ');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

               $.ajax({
        type: "POST",
        url: "{{ url('cart/checkout') }}",
        data:$("#asset-form").serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function (data) {
            
        }
    });
            }
</script>


<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>




</body>
</html>