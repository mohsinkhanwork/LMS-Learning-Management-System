@extends('newtheme.layout')


<style type="text/css">
    .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>

@section('content')

    <div id="main">


            <!-- Breads -->
            <div class="stm_lms_breadcrumbs stm_lms_breadcrumbs__header_2">
                <div class="stm_breadcrumbs_unit">
                    <div class="container">
                        <div class="navxtBreads">
                            <!-- Breadcrumb NavXT 6.6.0 -->
                            <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage"
                                    title="Go to Escuela de Escritura Creativa." href="{{url('/')}}" class="home"><span
                                        property="name">Escuela de Escritura Creativa</span></a>
                                <meta property="position" content="1">
                            </span> &gt; <span property="itemListElement" typeof="ListItem"><span property="name"
                                    class="post post-page current-item">Cursos</span>
                                <meta property="url" content="index.html">
                                <meta property="position" content="2">
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="post_type_exist clearfix">

                    <div class="stm_lms_courses_wrapper">


                        <div class="courses_filters">
                            <div class="courses_filters__title">
                                <h1>Cursos</h1>
                            </div>
                            <div class="courses_filters__activities">
                                <div class="stm_lms_courses_grid__sort">
                                    <span class="sort_label heading_font">Ordenar por:</span>
                                    <select id="sortBy" class="form-control d-inline w-50">
                                        <option value="">Ninguno</option>
                                        <option value="popular">@lang('labels.frontend.course.popular')</option>
                                        <option value="trending">Más buscados</option>
                                        <option value="featured">Destacados</option>
                                    </select>
                                </div>

                                <div class="courses_filters__switcher">
                                    <i class="lnricons-icons2 grid_view stc active" data-view="grid"></i>
                                    <i class="lnricons-list4 list_view stc" data-view="list"></i>
                                </div>

                            </div>
                        </div>
                        <div class="stm_lms_courses__archive_wrapper">


                            <div class="stm_lms_courses stm_lms_courses__archive">

                                <div class="featured-head">
                                    <h3>
                                        Cursos destacados </h3>
                                    <a href="{{url('/courses?type=featured')}}">
                                        <i class="fas fa-arrow-right"></i>
                                        <span> Mostrar todo </span>
                                    </a>
                                </div>


                                <div class="stm_lms_courses__grid stm_lms_courses__grid_4 stm_lms_courses__grid_right archive_grid featured-courses stm_lms_courses__grid_found_1"
                                    data-pages="1">

                                @if($featured_courses->count() > 0)

                                    
                                    

                                    <div
                                        class="stm_lms_courses__single stm_lms_courses__single_animation no-sale style_1 is_featured">

                                        <div class="stm_lms_courses__single__inner">


                                            <div class="stm_lms_courses__single--image">


                                                <div class="elab_is_featured_product">Featured</div>

                                                <div class="stm_lms_post_status heading_font hot">
                                                    Hot </div>

                                                <a href="{{ route('courses.show', [$featured_courses[0]->slug]) }}" class="heading_font"
                                                    data-preview=" Previsualizar este curso">
                                                    <div>
                                                        <div class='stm_lms_lazy_image'><img
                                                                data-src="{{asset('storage/uploads/'.$featured_courses[0]->course_image)}}"
                                                                src="{{asset('storage/uploads/'.$featured_courses[0]->course_image)}}"
                                                                alt='' class="lazyload lazyload" /></div>
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="stm_lms_courses__single--inner">


                                                <div class="stm_lms_courses__single--terms">
                                                    <div class="stm_lms_courses__single--term">
                                                        {{$featured_courses[0]->category->name}} </div>
                                                </div>

                                                <div class="stm_lms_courses__single--title">
                                                    <a href="{{ route('courses.show', [$featured_courses[0]->slug]) }}">
                                                        <h5>{{$featured_courses[0]->title}}</h5>
                                                    </a>
                                                </div>
                                                <div class="stm_lms_courses__single--meta">


                                                    <div class="average-rating-stars__top">

                                                       {{--  <div class="star-rating">
                                                            <span style="width: 80%">
                                                                <strong class="rating">4</strong>
                                                            </span>
                                                        </div>
                                                        <div class="average-rating-stars__av heading_font">
                                                            4
                                                        </div>
 --}}

                                                      @for($i=1; $i<=(int)$featured_courses[0]->rating; $i++)

                                                            
                                                    <i class="fas fa-star" style="color: gold;"></i>
                                             
                                            
                                                     @endfor
                                                               

                                                            
                                                        <span style="font-weight: 900; font-size: 15px;"> 

                                                            {{$featured_courses[0]->rating}}

                                                            @if($featured_courses[0]->rating)

                                                            / 5

                                                            @endif  

                                                        </span> 

                                                    </div>

                                                    <div class="stm_lms_courses__single--price heading_font">
                                                        <strong>
                                                            @if($featured_courses[0]->free == 1)
                                                                Gratis
                                                            @else
                                                                {!!  $featured_courses[0]->strikePrice  !!}
                                                                {{$appCurrency['symbol'].' '.$featured_courses[0]->price}}
                                                            @endif
                                                            
                                                        </strong>
                                                    </div>

                                                </div>

                                            </div>



                                            <div class="stm_lms_courses__single--info">
                                                <div class="stm_lms_courses__single--info_author">
                                                    <div class="stm_lms_courses__single--info_author__avatar">
                                                        <img alt
                                                            src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            class="avatar avatar-215 photo jetpack-lazy-image"
                                                            height="215" width="215" loading="lazy"
                                                            data-lazy-srcset="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            data-lazy-src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            data-recalc-dims="1"><img alt=''
                                                            src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            class='avatar avatar-215 photo' height='215' width='215'
                                                            loading='lazy' data-recalc-dims="1" />
                                                    </div>
                                                    <div class="stm_lms_courses__single--info_author__login">
                                                        Ray Bolívar Sosa </div>
                                                </div>

                                                <div class="stm_lms_courses__single--info_title">
                                                    <a href="{{ route('courses.show', [$featured_courses[0]->slug]) }}">
                                                        <h4>{{$featured_courses[0]->title}}</h4>
                                                    </a>
                                                </div>

                                                <div class="stm_lms_courses__single--info_rate">

                                                    <div class="star-rating star-rating__big">
                                                        <span style="width: 80%">
                                                            <strong class="rating">4</strong>
                                                        </span>
                                                    </div>


                                                    <div class="average-rating-stars__av heading_font">
                                                        <strong>4</strong>
                                                        (6)
                                                    </div>


                                                </div>

                                                <div class="stm_lms_courses__single--info_excerpt">
                                                    {!! strip_tags($featured_courses[0]->description) !!}


                                                </div>

                                                <div class="stm_lms_courses__single--info_meta">


                                                    <div class="stm_lms_course__meta">
                                                        <i class="stmlms-cats"></i>
                                                        3 Lecturas
                                                    </div>

                                                    <div class="stm_lms_course__meta">
                                                        <i class="stmlms-lms-clocks"></i>
                                                        10 horas
                                                    </div>

                                                </div>

                                                <div class="stm_lms_courses__single--info_preview">
                                                    <a href="{{ route('courses.show', [$featured_courses[0]->slug]) }}"
                                                        title="Los tiempos verbales píldora" class="heading_font">
                                                        Previsualizar este curso </a>
                                                </div>

                                                <div class="stm_lms_courses__single--info_bottom">

                                                    <div class="stm-lms-wishlist" data-add="Add to Wishlist"
                                                        data-add-icon="far fa-heart" data-remove="Wishlisted"
                                                        data-remove-icon="fa fa-heart" data-id="5036">
                                                        <i class="far fa-heart"></i>
                                                        <span>Agregar a la lista de deseos</span>
                                                    </div>

                                                    <div class="stm_lms_courses__single--price heading_font">
                                                        <strong>
                                                            @if($featured_courses[0]->free == 1)
                                                                Gratis
                                                            @else
                                                                {!!  $featured_courses[0]->strikePrice  !!}
                                                                {{$appCurrency['symbol'].' '.$featured_courses[0]->price}}
                                                            @endif
                                                        </strong>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                    
                                    
                                @endif    
                                </div>

                                <div class="stm_lms_courses__grid stm_lms_courses__grid_4 stm_lms_courses__grid_right archive_grid stm_lms_courses__grid_found_24"
                                    data-pages="3">

                                    @if($courses->count() > 0)

                                    @foreach($courses as $course)

                <div class="stm_lms_courses__single stm_lms_courses__single_animation no-sale style_1 ">

                                        

                                            <div class="stm_lms_courses__single__inner">


                                                <div class="stm_lms_courses__single--image">




                                                    <a href="{{ route('courses.show', [$course->slug]) }}" class="heading_font"
                                                        data-preview=" Previsualizar este curso">
                                                        <div>
                                                            <div class='stm_lms_lazy_image'><img
                                                                    data-src="{{asset('storage/uploads/'.$course->course_image)}}"
                                                                    src="{{asset('storage/uploads/'.$course->course_image)}}"
                                                                    alt='' class="lazyload lazyload" /></div>
                                                        </div>
                                                    </a>

                                                </div>

                            <div class="stm_lms_courses__single--inner">


                                                    <div class="stm_lms_courses__single--terms">
                                                        <div class="stm_lms_courses__single--term">

                                                            @if($course->category)
                                                           {{$course->category->name}} 
                                                           @else 
                                                           General
                                                           @endif
                                                     

                                                        </div>
                                                    </div>

                                                    <div class="stm_lms_courses__single--title">
                                                        <a href="{{ route('courses.show', [$course->slug]) }}">
                                                            <h5>{{$course->title}}</h5>
                                                        </a>
                                                    </div>
                                                    <div class="stm_lms_courses__single--meta">


                                                <div class="stm_lms_courses__hours" style="font-size: 28px;">
                                                                
                                                                
                                                     @for($i=1; $i<=(int)$course->rating; $i++)

                                                            
                                                    <i class="fas fa-star" style="color: gold;"></i>
                                             
                                            
                                                     @endfor
                                                               

                                                            
                                                        <span style="font-weight: 900; font-size: 15px;"> 

                                                            {{$course->rating}}

                                                            @if($course->rating)

                                                            / 5

                                                            @endif  

                                                        </span> 
                                                            
   

                                                </div>


                                                        <div class="stm_lms_courses__single--price heading_font">
                                                            <strong>
                                                                @if($course->free == 1)
                                                                    Gratis
                                                                @else
                                                                    {!!  $course->strikePrice  !!}
                                                                    {{$appCurrency['symbol'].' '.$course->price}}
                                                                @endif
                                                            </strong>



                                                        </div> 

                                                       

                                                    </div>              

                                </div>



                                                <div class="stm_lms_courses__single--info">
                                                    <div class="stm_lms_courses__single--info_author">
                                                        <div class="stm_lms_courses__single--info_author__avatar">
                                                            <img alt
                                                                src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                                class="avatar avatar-215 photo jetpack-lazy-image"
                                                                height="215" width="215" loading="lazy"
                                                                data-lazy-srcset="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                                data-lazy-src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                                data-recalc-dims="1"><img alt=''
                                                                src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                                class='avatar avatar-215 photo' height='215' width='215'
                                                                loading='lazy' data-recalc-dims="1" />
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_author__login">
                                                            Ray Bolívar Sosa </div>
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_title">
                                                        <a href="{{ route('courses.show', [$course->slug]) }}">
                                                            <h4>{{$course->title}}</h4>
                                                        </a>
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_rate">



                                                    </div>

                                                   <div class="stm_lms_courses__single--info_excerpt text">
                                                        {!! strip_tags($course->description) !!}


                                                    </div>

                                                    <div class="stm_lms_courses__single--info_meta">


                                                        <div class="stm_lms_course__meta">
                                                            <i class="stmlms-cats"></i>
                                                            2 Lecturas
                                                        </div>

                                                        <div class="stm_lms_course__meta">
                                                            <i class="stmlms-lms-clocks"></i>
                                                            2 horas
                                                        </div>

                                                    </div>

                                                    <div class="stm_lms_courses__single--info_preview">
                                                        <a href="{{ route('courses.show', [$course->slug]) }}"
                                                            title="" class="heading_font">
                                                            Previsualizar este curso </a>
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_bottom">

                                                        <div class="stm-lms-wishlist" data-add="Add to Wishlist"
                                                            data-add-icon="far fa-heart" data-remove="Wishlisted"
                                                            data-remove-icon="fa fa-heart" data-id="52034">
                                                            <i class="far fa-heart"></i>
                                                            <span>Agregar a la lista de deseos</span>
                                                        </div>

                                                        <div class="stm_lms_courses__single--price heading_font">
                                                            <strong>
                                                                @if($course->free == 1)
                                                                    Gratis
                                                                @else
                                                                    {!!  $course->strikePrice  !!}
                                                                    {{$appCurrency['symbol'].' '.$course->price}}
                                                                @endif
                                                            </strong>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>



                </div>

                                    @endforeach

                                    @endif

                                    
                                    <div class="couse-pagination text-center ul-li">
                                        {{ $courses->links() }}
                                    </div>
                                    

                                    
                                </div>


                                <div class="text-center">
                                    <a href="#" class="btn btn-default stm_lms_load_more_courses" data-offset="1"
                                        data-template="courses/grid" data-url=""
                                        data-args='{"image_d":"img-480-380","per_row":"4","posts_per_page":"8","class":"archive_grid"}'>
                                        <span>Load more</span>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="clearfix">
                </div>

            </div>

        </div>


        <script>
            $(document).ready(function () {
                $(document).on('change', '#sortBy', function () {
                    if ($(this).val() != "") {
                        location.href = '{{url()->current()}}?type=' + $(this).val();
                    } else {
                        location.href = '{{route('courses.all')}}';
                    }
                })

                @if(request('type') != "")
                $('#sortBy').find('option[value="' + "{{request('type')}}" + '"]').attr('selected', true);
                @endif
            });

        </script>

@endsection