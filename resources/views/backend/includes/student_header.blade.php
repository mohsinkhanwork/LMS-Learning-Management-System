<header class="app-header navbar">

<style type="text/css">
    
  .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
  background-color: #17A2B8;
  }
  .dropdown-menu{
  top: 65px;
  right: 0px;
  left: unset;
  box-shadow: 0px 5px 7px -1px #c1c1c1;
  padding-bottom: 0px;
  padding: 0px;
  }
  
  @media screen                                           
    and (min-device-width: 1200px) 
    and (max-device-width: 1600px) 
    and (-webkit-min-device-pixel-ratio: 1) { 
  
  .dropdown-menu {
  width: 48% !important;
  
  }
  
  }
  
  
  .dropdown-menu:before{
  content: "";
  position: absolute;
  top: -20px;
  right: 12px;
  border:10px solid #343A40;
  border-color: transparent transparent #343A40 transparent;
  }
  .head{
  padding:5px 15px;
  border-radius: 3px 3px 0px 0px;
  }
  .footer{
  padding:5px 15px;
  border-radius: 0px 0px 3px 3px;
  }
  .notification-box{
  padding: 10px 0px;
  }
  .bg-gray{
  background-color: #eee;
  }
  @media (max-width: 640px) {
  .dropdown-menu{
  width: 262px;
  }
  .nav{
  display: block;
  }
  .nav .nav-item,.nav .nav-item a{
  padding-left: 0px;
  }
  .message{
  font-size: 13px;
  }
  }
  </style>

  <div class="row" style="width: 100% !important;">

    <div class="col-md-1 col-12" style="text-align: left">  
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="col-md-6 col-12"  style="text-align: left">
      <a href="{{ url('/') }}">
      <img src="{{ asset('new_img/images/home2.png') }}" height="50px" width="50px" />
    </a>
    </div>
    <div class="col-md-3 col-12">
      
      @if(auth()->user())


                                            
                                  <nav class="navbar navbar-collapse pull-right">


<div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">

<ul class="nav nav-pills mr-auto justify-content-end">


<li class="nav-item dropdown">
<a style="font-size: 20px;" class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i style="color: blue;" class="fas fa-th"></i>
</a>

<ul class="dropdown-menu" style="width: 308px !important;">

<li class="head text-light bg-dark">
<div class="row">
<div class="col-sm-2">
  <div style="text-align: right">Crear</div>
  </div>

</div>
</li>


<li class="notification-box">
  <div class="row">

  <div class="col-sm-2" style="text-align: center;">

  <div style="margin-left: 3px;background-color: lightgray;border-radius: 10px;font-size: 17px;">
      <i class="fas fa-book-open"></i>
  </div>

  </div>
  <div class="col-sm-4" style="font-weight: bold"><a href="{{url('history')}}"> Historia </a></div>
</div>


</li>

<li class="notification-box">
  <div class="row">
<div class="col-sm-2" style="text-align: center;">
<div style="margin-left: 3px;background-color: lightgray;border-radius: 10px;font-size: 17px;">
  <i class="fas fa-edit"></i>
</div>  
</div>
<div class="col-sm-4" style="font-weight: bold">

  <a href="{{url('history/create')}}">Escena</a> 

</div>
</div>


</li>


</ul>

</li>
</ul>
</div>
</nav>


                   @endif

    </div>

  </div>
  



   
</header>
