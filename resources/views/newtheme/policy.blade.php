@extends('newtheme.layout')


@section('content')



    <title>Escuela de Escritura Creativa</title>





<link rel='stylesheet' id='stm_theme_custom_styles-css'  href="{{url('presend/wp-content/uploads/stm_lms_styles/custom_stylesdbc8.css?ver=1628162812')}}" type='text/css' media='all' />
<link rel='stylesheet' id='language_center-css'  href="{{url('presend/wp-content/themes/masterstudy/assets/layout_icons/language_center/styleb5ca.css?ver=1628162811')}}" type='text/css' media='all' />

<link rel='stylesheet' id='jetpack_css-css'  href="{{url('c0wpcom/p/jetpack/10.0/css/jetpack.css')}}" type='text/css' media='all' />






    

				<style type="text/css" id="wp-custom-css">
			.stm-lms-course__assignment .stm-lms-course__assignemnt-attachments__new {

    display: none!important;
}
.stm_lms_user_bio {
	
	text-align: justify;
	line-height: 40px !important;
	font-size : 17px !important;
}
.entry-header {
	
	background-color: #4ED7A8;
}

.entry-header .entry-title .h1{
	color:white;
	text-transform:uppercase;
}
.stm_lms_course_sticky_panel__button a{
	background-color:#195ec8;
}

.stm_lms_course_sticky_panel .stm_lms_course_sticky_panel__button .btn,.stm_lms_course_sticky_panel .stm_lms_course_sticky_panel__button .btn{
	background-color:#195ec8 !important;
}

.stm_lms_courses__single--info_author__avatar > img:first-child{
	display:none;
}

.meta-unit.teacher.clearfix .pull-left > img:first-child{
	display:none;
}

.stm-lms-user_avatar > img:first-child{
	display:none;
}
.stm_zoom_content .zoom_image img {
    border-radius: 10px;
}
.stm_zoom_content h2 {
    font-size: 36px;
    line-height: 42px;
    margin: 0 0 30px;
}

@media (max-width: 640px) {
    .stm_zooom_countdown .countDays .countdown_label,
    .stm_zooom_countdown .countHours .countdown_label,
    .stm_zooom_countdown .countMinutes .countdown_label,
    .stm_zooom_countdown .countSeconds .countdown_label {
        font-size: 9px !important;
    }
}
 

@media screen and (max-width: 857px){

.stm_zoom_content .stm-join-btn {
    padding:5px 30px;
    border-radius: 40px;
	font-size: 12px;
}

}



@media screen and (min-width: 780px) and (max-width: 970px){
	
		.join-buttons {
    position: relative;
    top: -110px;
    right: -45%;
    width: 300px;
}
}

@media (max-width: 1024px) {
    .stm_zoom_content .zoom_image, .stm_zoom_content .zoom_description{
        padding: 0 15px !important;
    }
}

@media (max-width: 767px) {
    .stm_zoom_content {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .stm_zoom_content .zoom_image {
        text-align: center;
    }

    .stm_zoom_content .zoom_image,
    .stm_zoom_content .zoom_info,
    .stm_zoom_content .zoom_info,
    .stm_zoom_content .zoom_description{
        width: 100% !important;
    }
}		</style>
		<style type="text/css" title="dynamic-css" class="options-output">.logo-unit .logo{font-family:Montserrat;color:#000000;font-size:23px;}#header .header_default, #header .header_default .stm_header_links a, #header .header_default .header_main_menu_wrapper a, #header .header_default .header_top_bar a, #header .header_default .header_top_bar{color:#000000;}#header .header_default .stm_header_links a:hover, #header .header_default .header_main_menu_wrapper a:hover, #header .header_default .header_top_bar a:hover{color:#000000;}.header_top_bar, .header_top_bar a, .header_2_top_bar .header_2_top_bar__inner ul.header-menu li a{font-family:Montserrat;font-weight:normal;font-style:normal;color:#f7f7f7;font-size:15px;}
body.skin_custom_color .stm_archive_product_inner_grid_content .stm-courses li.product.course-col-list .product-image .onsale, 
body.skin_custom_color .related.products .stm-courses li.product.course-col-list .product-image .onsale,
body.skin_custom_color .stm_archive_product_inner_grid_content .stm-courses li.product .product__inner .woocommerce-LoopProduct-link .onsale, 
body.skin_custom_color .related.products .stm-courses li.product .product__inner .woocommerce-LoopProduct-link .onsale,
body.skin_custom_color .post_list_main_section_wrapper .post_list_meta_unit .sticky_post,
body.skin_custom_color .overflowed_content .wpb_column .icon_box,
body.skin_custom_color .stm_countdown_bg,
body.skin_custom_color #searchform-mobile .search-wrapper .search-submit,
body.skin_custom_color .header-menu-mobile .header-menu > li .arrow.active,
body.skin_custom_color .header-menu-mobile .header-menu > li.opened > a,
body.skin_custom_color mark,
body.skin_custom_color .woocommerce .cart-totals_wrap .shipping-calculator-button:hover,
body.skin_custom_color .detailed_rating .detail_rating_unit tr td.bar .full_bar .bar_filler,
body.skin_custom_color .product_status.new,
body.skin_custom_color .stm_woo_helpbar .woocommerce-product-search input[type="submit"],
body.skin_custom_color .stm_archive_product_inner_unit .stm_archive_product_inner_unit_centered .stm_featured_product_price .price.price_free,
body.skin_custom_color .sidebar-area .widget:after,
body.skin_custom_color .sidebar-area .socials_widget_wrapper .widget_socials li .back a,
body.skin_custom_color .socials_widget_wrapper .widget_socials li .back a,
body.skin_custom_color .widget_categories ul li a:hover:after,
body.skin_custom_color .event_date_info_table .event_btn .btn-default,
body.skin_custom_color .course_table tr td.stm_badge .badge_unit.quiz,
body.skin_custom_color .page-links span:hover,
body.skin_custom_color .page-links span:after,
body.skin_custom_color .page-links > span:after,
body.skin_custom_color .page-links > span,
body.skin_custom_color .stm_post_unit:after,
body.skin_custom_color .blog_layout_grid .post_list_content_unit:after,
body.skin_custom_color ul.page-numbers > li a.page-numbers:after,
body.skin_custom_color ul.page-numbers > li span.page-numbers:after,
body.skin_custom_color ul.page-numbers > li a.page-numbers:hover,
body.skin_custom_color ul.page-numbers > li span.page-numbers:hover,
body.skin_custom_color ul.page-numbers > li a.page-numbers.current:after,
body.skin_custom_color ul.page-numbers > li span.page-numbers.current:after,
body.skin_custom_color ul.page-numbers > li a.page-numbers.current,
body.skin_custom_color ul.page-numbers > li span.page-numbers.current,
body.skin_custom_color .triangled_colored_separator,
body.skin_custom_color .magic_line,
body.skin_custom_color .navbar-toggle .icon-bar,
body.skin_custom_color .navbar-toggle:hover .icon-bar,
body.skin_custom_color #searchform .search-submit,
body.skin_custom_color .header_main_menu_wrapper .header-menu > li > ul.sub-menu:before,
body.skin_custom_color .search-toggler:after,
body.skin_custom_color .modal .popup_title,
body.skin_custom_color .sticky_post,
body.skin_custom_color .btn-carousel-control:after,
.primary_bg_color,
.mbc,
.stm_lms_courses_carousel_wrapper .owl-dots .owl-dot.active,
.stm_lms_courses_carousel__term.active,
body.course_hub .header_default.header_2,
.triangled_colored_separator:before,
.triangled_colored_separator:after,
body.skin_custom_color.udemy .btn-default,
.single_instructor .stm_lms_courses .stm_lms_load_more_courses, 
.single_instructor .stm_lms_courses .stm_lms_load_more_courses:hover,
.stm_lms_course_sticky_panel .stm_lms_course_sticky_panel__button .btn,
.stm_lms_course_sticky_panel .stm_lms_course_sticky_panel__button .btn:hover,
body.skin_custom_color.language_center .btn-default,
.header-login-button.sign-up a,
#header .header_6 .stm_lms_log_in,
body.cooking .stm_lms_courses_carousel__buttons .stm_lms_courses_carousel__button:hover,
body.cooking .stm_theme_wpb_video_wrapper .stm_video_preview:after,
body.cooking .btn.btn-default, 
body.cooking .button, 
body.cooking .form-submit .submit, 
body.cooking .post-password-form input[type=submit],
body.cooking .btn.btn-default:hover, 
body.cooking .button:hover, 
body.cooking .form-submit .submit:hover, 
body.cooking .post-password-form input[type=submit]:hover,
body.cooking div.multiseparator:after,
body.cooking .view_type_switcher a.view_grid.active_grid, 
body.cooking .view_type_switcher a.view_list.active_list, 
body.cooking .view_type_switcher a:hover,


body.skin_custom_color blockquote,
body.skin_custom_color .tp-caption .icon-btn:hover .icon_in_btn,
body.skin_custom_color .tp-caption .icon-btn:hover,
body.skin_custom_color .stm_theme_wpb_video_wrapper .stm_video_preview:after,
body.skin_custom_color .btn-carousel-control,
body.skin_custom_color .post_list_main_section_wrapper .post_list_meta_unit .post_list_comment_num,
body.skin_custom_color .post_list_main_section_wrapper .post_list_meta_unit,
body.skin_custom_color .search-toggler:hover,
body.skin_custom_color .search-toggler,
.stm_lms_courses_carousel_wrapper .owl-dots .owl-dot.active,
.triangled_colored_separator .triangle:before,
body.cooking .stm_lms_courses_carousel__buttons .stm_lms_courses_carousel__button,
body.cooking .btn.btn-default, 
body.cooking .button, 
body.cooking .form-submit .submit, 
body.cooking .post-password-form input[type=submit],
body.cooking.woocommerce .sidebar-area .widget.widget_product_categories ul li a:after,
body.cooking .select2-container--default .select2-selection--single .select2-selection__arrow b:after,

body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit,
body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit .post_list_comment_num,
body.cooking .widget_tag_cloud .tagcloud a:hover
{border-color:#ffd1db;}
body.skin_custom_color .icon_box .icon i,
body.skin_custom_color .icon-btn:hover .icon_in_btn,
body.skin_custom_color .icon-btn:hover .link-title,
body.skin_custom_color .stats_counter .h1,
body.skin_custom_color .event_date_info .event_date_info_unit .event_labels,
body.skin_custom_color .event-col .event_archive_item .event_location i,
body.skin_custom_color .event-col .event_archive_item .event_start i,
body.skin_custom_color .gallery_terms_list li.active a,
body.skin_custom_color .tp-caption .icon-btn:hover .icon_in_btn,
body.skin_custom_color .teacher_single_product_page>a:hover .title,
body.skin_custom_color .sidebar-area .widget ul li a:hover:after,
body.skin_custom_color div.pp_woocommerce .pp_gallery ul li a:hover,
body.skin_custom_color div.pp_woocommerce .pp_gallery ul li.selected a,
body.skin_custom_color .single_product_after_title .meta-unit i,
body.skin_custom_color .single_product_after_title .meta-unit .value a:hover,
body.skin_custom_color .woocommerce-breadcrumb a:hover,
body.skin_custom_color #footer_copyright .copyright_text a:hover,
body.skin_custom_color .widget_stm_recent_posts .widget_media .cats_w a:hover,
body.skin_custom_color .widget_pages ul.style_2 li a:hover,
body.skin_custom_color .sidebar-area .widget_categories ul li a:hover,
body.skin_custom_color .sidebar-area .widget ul li a:hover,
body.skin_custom_color .widget_categories ul li a:hover,
body.skin_custom_color .stm_product_list_widget li a:hover .title,
body.skin_custom_color .widget_contacts ul li .text a:hover,
body.skin_custom_color .sidebar-area .widget_pages ul.style_1 li a:focus .h6,
body.skin_custom_color .sidebar-area .widget_nav_menu ul.style_1 li a:focus .h6,
body.skin_custom_color .sidebar-area .widget_pages ul.style_1 li a:focus,
body.skin_custom_color .sidebar-area .widget_nav_menu ul.style_1 li a:focus,
body.skin_custom_color .sidebar-area .widget_pages ul.style_1 li a:active .h6,
body.skin_custom_color .sidebar-area .widget_nav_menu ul.style_1 li a:active .h6,
body.skin_custom_color .sidebar-area .widget_pages ul.style_1 li a:active,
body.skin_custom_color .sidebar-area .widget_nav_menu ul.style_1 li a:active,
body.skin_custom_color .sidebar-area .widget_pages ul.style_1 li a:hover .h6,
body.skin_custom_color .sidebar-area .widget_nav_menu ul.style_1 li a:hover .h6,
body.skin_custom_color .sidebar-area .widget_pages ul.style_1 li a:hover,
body.skin_custom_color .sidebar-area .widget_nav_menu ul.style_1 li a:hover,
body.skin_custom_color .widget_pages ul.style_1 li a:focus .h6,
body.skin_custom_color .widget_nav_menu ul.style_1 li a:focus .h6,
body.skin_custom_color .widget_pages ul.style_1 li a:focus,
body.skin_custom_color .widget_nav_menu ul.style_1 li a:focus,
body.skin_custom_color .widget_pages ul.style_1 li a:active .h6,
body.skin_custom_color .widget_nav_menu ul.style_1 li a:active .h6,
body.skin_custom_color .widget_pages ul.style_1 li a:active,
body.skin_custom_color .widget_nav_menu ul.style_1 li a:active,
body.skin_custom_color .widget_pages ul.style_1 li a:hover .h6,
body.skin_custom_color .widget_nav_menu ul.style_1 li a:hover .h6,
body.skin_custom_color .widget_pages ul.style_1 li a:hover,
body.skin_custom_color .widget_nav_menu ul.style_1 li a:hover,
body.skin_custom_color .see_more a:after,
body.skin_custom_color .see_more a,
body.skin_custom_color .transparent_header_off .header_main_menu_wrapper ul > li > ul.sub-menu > li a:hover,
body.skin_custom_color .stm_breadcrumbs_unit .navxtBreads > span a:hover,
body.skin_custom_color .btn-carousel-control,
body.skin_custom_color .post_list_main_section_wrapper .post_list_meta_unit .post_list_comment_num,
body.skin_custom_color .post_list_main_section_wrapper .post_list_meta_unit .date-m,
body.skin_custom_color .post_list_main_section_wrapper .post_list_meta_unit .date-d,
body.skin_custom_color .stats_counter h1,
body.skin_custom_color .yellow,
body.skin_custom_color ol li a:hover,
body.skin_custom_color ul li a:hover,
body.skin_custom_color .search-toggler,
.primary_color,
.mtc_h:hover,
body.classic_lms .header_top_bar .header_top_bar_socs ul li a:hover,
body.classic_lms .header_top_bar a:hover,
#footer .widget_stm_lms_popular_courses ul li a:hover .meta .h5.title,
body.classic_lms .stm_lms_wishlist_button a:hover i,
.classic_lms .post_list_main_section_wrapper .post_list_item_title:hover,
.stm_lms_courses__single.style_2 .stm_lms_courses__single--title h5:hover,
body.cooking .stm_lms_courses_carousel__buttons .stm_lms_courses_carousel__button,
body.cooking #footer .widget_contacts ul li .icon,
body.cooking #footer .stm_product_list_widget.widget_woo_stm_style_2 li a:hover .meta .title,
body.cooking .courses_filters__switcher i:not(.active),
body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit .date-d,
body.cooking .blog_layout_grid .post_list_meta_unit .date-m,
body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit .post_list_comment_num,
body.cooking .stm_post_info .stm_post_details .post_meta li i,
body.cooking .comment-form .logged-in-as a,
body.cooking .post_list_content_unit .post_list_item_title:hover,
body.cooking .post_list_content_unit .post_list_item_title:focus,
body.cooking .widget_search .search-form>label:after,
body.cooking .blog_layout_grid .post_list_cats a,
body.cooking .blog_layout_grid .post_list_item_tags a,
body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit .date-d,
body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit .date-m-plugin,
body.cooking .blog_layout_grid .plugin_style .post_list_inner_content_unit .post_list_meta_unit .post_list_comment_num,
body.cooking #stm_lms_faq .panel.panel-default .panel-heading .panel-title a:hover,
body.cooking .stm_post_info .stm_post_details .comments_num .post_comments:hover,
body.cooking .stm_lms_courses_list_view .stm_lms_courses__grid .stm_lms_courses__single--info_title a:hover h4,
body.cooking .comments-area .commentmetadata i,
body.cooking .stm_lms_gradebook__filter .by_views_sorter.by-views,
body.cooking .stm_post_info .stm_post_details .comments_num .post_comments i
{color:#ffd1db;}
body.skin_custom_color .triangled_colored_separator .triangle,
body.skin_custom_color .magic_line:after,
body.cooking .stm_lms_gradebook__filter .by_views_sorter.by-views
{border-bottom-color:#ffd1db;}body.rtl-demo .stm_testimonials_wrapper_style_2 .stm_lms_testimonials_single__content:after{border-left-color:#195ec8;}
body.skin_custom_color .blog_layout_grid .post_list_meta_unit .sticky_post,
body.skin_custom_color .blog_layout_list .post_list_meta_unit .sticky_post,
body.skin_custom_color .product_status.special,
body.skin_custom_color .view_type_switcher a:hover,
body.skin_custom_color .view_type_switcher a.view_list.active_list,
body.skin_custom_color .view_type_switcher a.view_grid.active_grid,
body.skin_custom_color .stm_archive_product_inner_unit .stm_archive_product_inner_unit_centered .stm_featured_product_price .price,
body.skin_custom_color .sidebar-area .widget_text .btn,
body.skin_custom_color .stm_product_list_widget.widget_woo_stm_style_2 li a .meta .stm_featured_product_price .price,
body.skin_custom_color .widget_tag_cloud .tagcloud a:hover,
body.skin_custom_color .sidebar-area .widget ul li a:after,
body.skin_custom_color .sidebar-area .socials_widget_wrapper .widget_socials li a,
body.skin_custom_color .socials_widget_wrapper .widget_socials li a,
body.skin_custom_color .gallery_single_view .gallery_img a:after,
body.skin_custom_color .course_table tr td.stm_badge .badge_unit,
body.skin_custom_color .widget_mailchimp .stm_mailchimp_unit .button,
body.skin_custom_color .textwidget .btn:active,
body.skin_custom_color .textwidget .btn:focus,
body.skin_custom_color .form-submit .submit:active,
body.skin_custom_color .form-submit .submit:focus,
body.skin_custom_color .button:focus,
body.skin_custom_color .button:active,
body.skin_custom_color .btn-default:active,
body.skin_custom_color .btn-default:focus,
body.skin_custom_color .button:hover,
body.skin_custom_color .textwidget .btn:hover,
body.skin_custom_color .form-submit .submit,
body.skin_custom_color .button,
body.skin_custom_color .btn-default,
.btn.btn-default:hover, .button:hover, .textwidget .btn:hover,
body.skin_custom_color .short_separator,
body.skin_custom_color div.multiseparator:after,
body.skin_custom_color .widget_pages ul.style_2 li a:hover:after,
body.skin_custom_color.single-product .product .woocommerce-tabs .wc-tabs li.active a:before,

body.skin_custom_color.woocommerce .sidebar-area .widget.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle,
body.skin_custom_color.woocommerce .sidebar-area .widget.widget_price_filter .price_slider_wrapper .price_slider .ui-slider-range,
.sbc,
.sbc_h:hover,
.wpb-js-composer .vc_general.vc_tta.vc_tta-tabs.vc_tta-style-classic li.vc_tta-tab>a,
.wpb-js-composer .vc_general.vc_tta.vc_tta-tabs.vc_tta-style-classic li.vc_tta-tab>a:hover,
#header.transparent_header .header_2 .stm_lms_account_dropdown .dropdown button,
.stm_lms_courses_categories.style_3 .stm_lms_courses_category>a:hover,
.stm_lms_udemy_course .nav.nav-tabs>li a,
body.classic_lms .classic_style .nav.nav-tabs>li.active a,
.header_bottom:after,
.sbc:hover,
body.rtl-demo .stm_testimonials_wrapper_style_2 .stm_lms_testimonials_single__content
{background-color:#195ec8;}
body.skin_custom_color.woocommerce .sidebar-area .widget.widget_layered_nav ul li a:after, 
body.skin_custom_color.woocommerce .sidebar-area .widget.widget_product_categories ul li a:after,
body.skin_custom_color .wpb_tabs .form-control:focus,
body.skin_custom_color .wpb_tabs .form-control:active,
body.skin_custom_color .woocommerce .cart-totals_wrap .shipping-calculator-button,
body.skin_custom_color .sidebar-area .widget_text .btn,
body.skin_custom_color .widget_tag_cloud .tagcloud a:hover,
body.skin_custom_color .icon_box.dark a:hover,
body.skin_custom_color .simple-carousel-bullets a.selected,
body.skin_custom_color .stm_sign_up_form .form-control:active,
body.skin_custom_color .stm_sign_up_form .form-control:focus,
body.skin_custom_color .form-submit .submit,
body.skin_custom_color .button,
body.skin_custom_color .btn-default,
.sbrc,
.sbrc_h:hover,
.vc_general.vc_tta.vc_tta-tabs,
body.skin_custom_color .blog_layout_grid .post_list_meta_unit,
body.skin_custom_color .blog_layout_grid .post_list_meta_unit .post_list_comment_num,
body.skin_custom_color .blog_layout_list .post_list_meta_unit .post_list_comment_num,
body.skin_custom_color .blog_layout_list .post_list_meta_unit,
#header.transparent_header .header_2 .stm_lms_account_dropdown .dropdown button
{border-color:#195ec8;}
.header_2_top_bar__inner .top_bar_right_part .header_top_bar_socs ul li a:hover,
.secondary_color,
body.skin_custom_color.single-product .product .woocommerce-tabs .wc-tabs li.active a,
body.skin_custom_color.single-product .product .woocommerce-tabs .wc-tabs li a:hover,
body.skin_custom_color .widget_pages ul.style_2 li a:hover .h6,
body.skin_custom_color .icon_box .icon_text>h3>span,
body.skin_custom_color .stm_woo_archive_view_type_list .stm_featured_product_stock i,
body.skin_custom_color .stm_woo_archive_view_type_list .expert_unit_link:hover .expert,
body.skin_custom_color .stm_archive_product_inner_unit .stm_archive_product_inner_unit_centered .stm_featured_product_body a .title:hover,
body.skin_custom_color .stm_product_list_widget.widget_woo_stm_style_2 li a:hover .title,
body.skin_custom_color .blog_layout_grid .post_list_meta_unit .post_list_comment_num,
body.skin_custom_color .blog_layout_grid .post_list_meta_unit .date-m,
body.skin_custom_color .blog_layout_grid .post_list_meta_unit .date-d,
body.skin_custom_color .blog_layout_list .post_list_meta_unit .post_list_comment_num,
body.skin_custom_color .blog_layout_list .post_list_meta_unit .date-m,
body.skin_custom_color .blog_layout_list .post_list_meta_unit .date-d,
body.skin_custom_color .widget_stm_recent_posts .widget_media a:hover .h6,
body.skin_custom_color .widget_product_search .woocommerce-product-search:after,
body.skin_custom_color .widget_search .search-form > label:after,
body.skin_custom_color .sidebar-area .widget ul li a,
body.skin_custom_color .sidebar-area .widget_categories ul li a,
body.skin_custom_color .widget_contacts ul li .text a,
body.skin_custom_color .event-col .event_archive_item > a:hover .title,
body.skin_custom_color .stm_contact_row a:hover,
body.skin_custom_color .comments-area .commentmetadata i,
body.skin_custom_color .stm_post_info .stm_post_details .comments_num .post_comments:hover,
body.skin_custom_color .stm_post_info .stm_post_details .comments_num .post_comments i,
body.skin_custom_color .stm_post_info .stm_post_details .post_meta li a:hover span,
body.skin_custom_color .stm_post_info .stm_post_details .post_meta li i,
body.skin_custom_color .blog_layout_list .post_list_item_tags .post_list_divider,
body.skin_custom_color .blog_layout_list .post_list_item_tags a,
body.skin_custom_color .blog_layout_list .post_list_cats .post_list_divider,
body.skin_custom_color .blog_layout_list .post_list_cats a,
body.skin_custom_color .blog_layout_list .post_list_item_title a:hover,
body.skin_custom_color .blog_layout_grid .post_list_item_tags .post_list_divider,
body.skin_custom_color .blog_layout_grid .post_list_item_tags a,
body.skin_custom_color .blog_layout_grid .post_list_cats .post_list_divider,
body.skin_custom_color .blog_layout_grid .post_list_cats a,
body.skin_custom_color .blog_layout_grid .post_list_item_title:focus,
body.skin_custom_color .blog_layout_grid .post_list_item_title:active,
body.skin_custom_color .blog_layout_grid .post_list_item_title:hover,
body.skin_custom_color .stm_featured_products_unit .stm_featured_product_single_unit .stm_featured_product_single_unit_centered .stm_featured_product_body a .title:hover,
body.skin_custom_color .icon_box.dark a:hover,
body.skin_custom_color .post_list_main_section_wrapper .post_list_item_tags .post_list_divider,
body.skin_custom_color .post_list_main_section_wrapper .post_list_item_tags a,
body.skin_custom_color .post_list_main_section_wrapper .post_list_cats .post_list_divider,
body.skin_custom_color .post_list_main_section_wrapper .post_list_cats a,
body.skin_custom_color .post_list_main_section_wrapper .post_list_item_title:active,
body.skin_custom_color .post_list_main_section_wrapper .post_list_item_title:focus,
body.skin_custom_color .post_list_main_section_wrapper .post_list_item_title:hover,
body.skin_custom_color a:hover,
.secondary_color,
#header.transparent_header .header_2 .header_top .stm_lms_categories .heading_font, 
#header.transparent_header .header_2 .header_top .stm_lms_categories i,
.classic_lms .post_list_main_section_wrapper .post_list_cats a,
.classic_lms .post_list_main_section_wrapper .post_list_item_tags a,
body.skin_custom_color .single_product_after_title .meta-unit.teacher:hover .value,
.stm_lms_course_sticky_panel__teacher:before,
.stm_lms_courses__single__inner .stm_lms_courses__single--info_title a:hover h4
{color:#195ec8;}a{color:#195ec8;}body, 
                    .normal_font,
                    .h6.normal_font,
                    body.rtl.rtl-demo .stm_testimonials_wrapper_style_2 .stm_lms_testimonials_single__excerpt p, 
                    .stm_product_list_widget.widget_woo_stm_style_2 li a .meta .title{font-family:"Open Sans";color:#273044;font-size:14px;}.btn, .header-login-button.sign-up a{font-family:Montserrat;line-height:14px;font-size:14px;}.header-menu{font-family:Montserrat;font-weight:400;color:#f4f4f4;}h1,.h1,h2,.h2,h3,.h3,h4,.h4,h5,.h5,h6,.h6,.nav-tabs>li>a,.member-name,.section-title,.user-name,.heading_font,.item-title,.acomment-meta,[type="reset"],.bp-subnavs,.activity-header,table,.widget_categories ul li a,.sidebar-area .widget ul li a,.select2-selection__rendered,blockquote,.select2-chosen,.vc_tta-tabs.vc_tta-tabs-position-top .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a,.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a, body.distance-learning .btn, body.distance-learning .vc_btn3{font-family:Montserrat;color:#273044;}h1,.h1{line-height:50px;letter-spacing:-2.2px;font-size:45px;}h2,.h2{line-height:42px;font-size:36px;}h3,.h3{line-height:34px;letter-spacing:-0.3px;font-size:26px;}h4,.h4,blockquote{line-height:26px;font-weight:400;font-size:20px;}h5,.h5,.select2-selection__rendered{line-height:20px;font-size:14px;}h6,.h6,.widget_pages ul li a, .widget_nav_menu ul li a, .footer_menu li a,.widget_categories ul li a,.sidebar-area .widget ul li a{line-height:12px;font-weight:400;font-size:12px;}#footer_top{background-color:#3d4045;}#footer_bottom{background-color:#3d4045;}#footer_bottom .widget_title h3{font-weight:700;color:#ffffff;font-size:18px;}#footer_bottom, .widget_contacts ul li .text, 
				.footer_widgets_wrapper .widget ul li a,
				.widget_nav_menu ul.style_1 li a .h6, 
				.widget_pages ul.style_2 li a .h6,
				#footer .stm_product_list_widget.widget_woo_stm_style_2 li a .meta .title,
				.widget_pages ul.style_1 li a .h6{color:#9398a2;}.widget_pages ul.style_2 li a:after{background-color:#9398a2;}#footer_copyright{background-color:#3d4045;}#footer_copyright .copyright_text, #footer_copyright .copyright_text a{color:#9398a2;}#footer_copyright{border-color:#3d4045;}

            </style>

				
<body data-rsssl=1 class="bp-nouveau blog stm_lms_button theme-masterstudy woocommerce-no-js ehf-template-masterstudy ehf-stylesheet-masterstudy skin_custom_color academy stm_preloader_0 elementor-default elementor-kit-4973 no-js" ontouchstart="">


<div id="wrapper">

 
	

<!-- id header -->
    <div id="main">
	<div class="stm-lms-wrapper">
		<div class="container">
            

<div class="stm_lms-user-public-default-instructor">
	

<div class="stm_lms_instructor_public">
	<div class="row">

		<div class="col-md-1 col-sm-12">

			
{{-- <div class="stm_lms_user_side">

            <div class="stm-lms-user_avatar">
            <img alt='' src="{{url('presend/wp-content/uploads/avatars/1/59f9b8d60fe1f-bpfull.jpg')}}" class='avatar avatar-215 photo' height='215' width='215' loading='lazy' />        </div>
    
    <h3>Ray Bolívar Sosa</h3>

	        <h5>Profesor y escritor</h5>
	
	        <div class="stm-lms-user_rating check_parts_info_public">
            <div class="star-rating star-rating__big">
                <span style="width: 81.6%;"></span>
            </div>
            <strong class="rating heading_font">4.08</strong>
            <div class="stm-lms-user_rating__total">
				13 Reviews.            </div>
        </div>
	
	

</div> --}}
		</div>

		<div class="col-md-11 col-sm-12">

			
<div class="stm_lms_user_info_top">
	<h1>Política de privacidad</h1>

	

</div>
			
	<div class="stm_lms_user_bio">
        <div class="stm_lms_update_field__description">
		

    <div>
        
    </div>
                
        <div>
            <h3>ACUERDO</h3>
            <div>
    
            <p>
            Este acuerdo se aplica entre usted, el Usuario de este Sitio Web y CENTRO FORMATIVO INTERNACIONAL DOÑA BARBARA SL B86256559, en lo adelante <b>EL PRESTADOR DEL SERVICIO</b>, empresa propietaria de este Sitio Web.</p>
            <p>*En caso de que usted haya recibido un email con información detallada del servicio (oferta, etc.) el mismo es válido y supone un acuerdo entre las partes. Al aceptar la política de términos y condiciones se entiende que está de acuerdo con el servicio detallado en la página web o en el email.</p>
    
            <h3 class="ml-5">1.  Definición e Interpretación</h3>
    
            <p>El acuerdo que usted va a firmar está sujeto a las Cláusulas 1, 2, 4 – 11 y 15 – 25 de estos Términos y Condiciones. Las Cláusulas 3 y 12 – 14 se aplican únicamente a la venta de Servicios.Si usted no acepta estar obligado por estos Términos y Condiciones, deberá abandonar el sitio web.</p>
            <p>“Ninguna parte de este Sitio Web pretende constituir una oferta contractual susceptible de aceptación”.</p>
            <p>Su pedido constituye una oferta contractual y nuestra aceptación de esa oferta se considera que ocurre al enviarle un correo electrónico de confirmación indicando que su pedido ha sido aceptado</p>
            <p>En el presente Acuerdo, los siguientes términos tendrán los siguientes significados:</p>
            <p>“Cuenta”: significa colectivamente la información personal, la Información de pago y las credenciales utilizadas por los Usuarios para acceder al Contenido pagado y a cualquier sistema de comunicaciones en el Sitio Web;</p>
            <p>“Contenido”: cualquier texto, gráficos, imágenes, audio, vídeo, software, compilaciones de datos y cualquier otra forma de información que pueda ser almacenada en un ordenador que aparezca en o forme parte de este Sitio Web;</p>
            <p>“Instalaciones”: significa colectivamente todas las instalaciones, herramientas, servicios o información en línea que <b>EL PRESTADOR DEL SERVICIO</b> pone a disposición a través del Sitio Web ahora o en el futuro;</p>
            <p>“Servicios”: significa los servicios disponibles a través de este Sitio Web, específicamente el uso de la plataforma de e-learning exclusiva de <b>EL PRESTADOR DEL SERVICIO</b>; así como los servicios de publicación, corrección de obras y el programa de apoyo al autor.</p>
            <p>“Información de Pago”: significa cualquier detalle requerido para la compra de Servicios de este Sitio Web. Esto incluye, pero no se limita a, números de tarjetas de crédito / débito, números de cuentas bancarias y códigos de clasificación;</p>
            <p>“Sistema”: significa cualquier infraestructura de comunicaciones en línea que <b>EL PRESTADOR DEL SERVICIO</b> pone a disposición a través del Sitio Web ahora o en el futuro. Esto incluye, pero no se limita a, correo electrónico basado en la Web, tableros de mensajes, instalaciones de chat en vivo y enlaces por correo electrónico;</p>
            <p>“Usuario” / “Usuarios”: significa cualquier tercero que acceda al Sitio Web y no sea empleado por <b>EL PRESTADOR DEL SERVICIO</b> y que actúe utilizando los recursos y servicios ofrecidos.</p>
    
    
            <h3 class="ml-5">2.  Restricciones de edad</h3>
            <p>Las personas menores de 18 años deben usar este Sitio Web únicamente con la supervisión de un Adulto. La información de pago debe ser proporcionada por o con el permiso de un adulto.</p>
    
            <h3 class="ml-5">3.  Clientes empresariales</h3>
            <p>Estos Términos y condiciones también se aplican a los clientes que contratan servicios en nombre de una empresa.</p>
    
            <p>Estos Términos y condiciones también se aplican a los clientes que contratan servicios en nombre de una empresa.</p>
            <p>“Sitio web”: significa el sitio web que está utilizando actualmente (test40.mystagingwebsite.com/) y cualquier subdominio o dominio de este sitio (ray-bolivar-sosa.es).</p>
            
            <p></p>
    
            <h3 class="ml-5">4.  Propiedad intelectual</h3>
            <p>4.1 Sujeto a las excepciones de la Cláusula 5 de estos Términos y Condiciones, todo el Contenido incluido en el Sitio Web, a menos que sea cargado por Usuarios, incluyendo, pero no limitado a, texto, gráficos, logotipos, iconos, imágenes, clips de sonido, videoclips, datos Compilaciones, diseño de página, código subyacente y software es propiedad de <b>EL PRESTADOR DEL SERVICIO</b>, de nuestros afiliados u otros terceros relevantes. Al continuar utilizando el Sitio Web, usted reconoce que dicho material está protegido por las leyes de propiedad intelectual y otras leyes aplicables a España y la Comunidad Europea y a las leyes Internacionales.</p>
            <p>4.2 Sujeto a la Cláusula 6 no podrá reproducir, copiar, distribuir, almacenar o de ninguna otra manera reutilizar material del Sitio Web, a menos que se indique lo contrario en el Sitio Web o a menos que se le otorgue nuestro expreso permiso por escrito para hacerlo. Salvo en el caso de las lecciones habilitadas a tal efecto.</p>
    
            <h3 class="ml-5">5.  Propiedad intelectual de terceros.</h3>
            <p>5.1 A menos que se indique expresamente lo contrario, todos los derechos de propiedad intelectual incluyendo, pero no limitado a, derechos de autor y marcas registradas, en imágenes de productos y descripciones pertenecen a los fabricantes o distribuidores de los productos que puedan ser aplicables.</p>
            <p>5.2 Sujeto a la Cláusula 6 no podrá reproducir, copiar, distribuir, almacenar o de cualquier otra forma reutilizar dicho material, a menos que se indique lo contrario en el Sitio Web o a menos que se le haya otorgado expreso permiso por escrito del fabricante o proveedor correspondiente.</p>
    
            <h3 class="ml-5">6.  Uso Justo de la Propiedad Intelectual.</h3>
            <h3 class="ml-5">7.  Enlaces a otros sitios web.</h3>
            <p>
            Este sitio web puede contener enlaces a otros sitios. A menos que se indique expresamente, estos sitios no están bajo el control de <b>EL PRESTADOR DEL SERVICIO</b> o de nuestros afiliados. No asumimos ninguna responsabilidad por el contenido de dichos sitios web y renunciamos a responsabilidad por cualquier forma de pérdida o daño que surja del uso de los mismos. La inclusión de un enlace a otro sitio en este sitio web no implica ningún endoso de los propios sitios o de aquellos que tienen el control de los mismos.
    
            
            </p>
            <h3 class="ml-5">8.  Enlaces a este sitio web.</h3>
            <p>
            Aquellos que deseen colocar un enlace a este sitio web en otros sitios pueden hacerlo sólo a la página principal del sitio test40.mystagingwebsite.com sin nuestro permiso previo. La vinculación profunda (es decir, enlaces a páginas específicas dentro del sitio) requiere nuestro permiso expreso por escrito. Para obtener más información, póngase en contacto con nosotros por correo electrónico a <a href="#">info@ray-bolivar-sosa.es</a>
            </p>
            <h3 class="ml-5">9.  Uso de las instalaciones de comunicaciones.</h3>
            <p>9.1 Cuando use cualquier Sistema en el Sitio Web, debe hacerlo de acuerdo con las siguientes reglas. El incumplimiento de estas reglas puede resultar en la suspensión o cierre de su Cuenta:</p>
            <p>9.1.1 No debe usar lenguaje obsceno o vulgar;</p>
            <p>9.1.2 Usted no debe enviar Contenido que sea ilegal o de alguna otra manera objetable. Esto incluye, pero no se limita a, Contenido que es abusivo, amenazante, acosador, difamatorio, sexista o racista;</p>
            <p>9.1.3 Usted no debe enviar Contenido que esté destinado a promover o incitar a la violencia;</p>
            <p>9.1.4 Se aconseja que las presentaciones o los contactos se realicen utilizando el idioma español o inglés ya que es posible que no podamos responder a las solicitudes presentadas en otros idiomas.</p>
            <p>9.1.5 Los medios por los cuales usted se identifica no deben violar estos Términos y Condiciones o cualquier ley aplicable;</p>
            <p>9.1.6 No debe hacerse pasar por otras personas, en particular por los empleados y representantes de <b>EL PRESTADOR DEL SERVICIO</b> o de nuestras afiliadas.</p>
            <p>9.1.7 No debe utilizar nuestro sistema para la comunicación masiva no autorizada, como “spam” o “correo basura”.</p>
            <p>9.2 Usted reconoce que <b>EL PRESTADOR DEL SERVICIO</b> se reserva el derecho de monitorear todas y cada una de las comunicaciones hechas a Nosotros o usando nuestro Sistema.</p>
            <p>9.3 Usted reconoce que <b>EL PRESTADOR DEL SERVICIO</b> puede retener copias de cualquier y todas las comunicaciones hechas a Nosotros o usando Nuestro Sistema.</p>
            <p>9.4 Usted reconoce que cualquier información que nos envíe a través de Nuestro Sistema puede ser modificada por Nosotros de cualquier manera y por este medio renuncia a su derecho moral a ser identificado como el autor de dicha información. Cualquier restricción que usted desee colocar en nuestro uso de tal información debe ser comunicada a nosotros por adelantado y nos reservamos el derecho de rechazar dichos términos y la información asociada.</p>
    
            <h3 class="ml-5">10. Cuentas</h3>
            <p>10.1 Con el fin de obtener Servicios en este Sitio Web y utilizar ciertas otras partes del Sistema, deberá crear una Cuenta que contendrá ciertos datos personales e Información de Pago que pueden variar en función del uso que usted haga del Sitio Web que no requiera Información de pago hasta que desee realizar una compra. Al continuar utilizando este sitio web, usted declara y garantiza que:</p>
            <p>10.1.1 toda la información que envíe sea exacta y veraz;</p>
            <p>10.1.2 usted tiene permiso para enviar información de pago cuando se requiera permiso; y mantendrá esta información exacta y actualizada. Su creación de una Cuenta es una afirmación adicional de su representación y garantía.</p>
            <p>10.2 Se recomienda no compartir los detalles de su cuenta, especialmente su nombre de usuario y contraseña. No aceptamos ninguna responsabilidad por las pérdidas o los daños sufridos como resultado de los detalles de su cuenta que son compartidos por usted. Si utiliza un equipo compartido, se recomienda no guardar los detalles de su cuenta en su navegador de Internet</p>
            <p>10.3 Si tiene motivos para creer que los datos de su Cuenta han sido obtenidos por otra persona sin su consentimiento, debe comunicarse con nosotros inmediatamente para suspender su Cuenta y cancelar cualquier orden o pago no autorizado que esté pendiente. Tenga en cuenta que las órdenes o los pagos sólo se pueden cancelar hasta que se haya iniciado la prestación de Servicios. En el caso de que una disposición no autorizada comience antes de que usted nos notifique de la naturaleza no autorizada de la orden o el pago, entonces se le cobrará por el período desde el comienzo de la prestación de servicios hasta la fecha que usted nos notificó y puede ser cobrado por un Ciclo de facturación de un mes</p>
            <p>10.4 Al elegir su nombre de usuario, deberá cumplir con los términos establecidos en la Cláusula 9. Cualquier incumplimiento de esta obligación podría resultar en la suspensión y / o eliminación de su Cuenta.</p>
    
    <h3 class="ml-5">11. Terminación y cancelación de cuentas</h3>
    <p>11.1 O bien <b>EL PRESTADOR DEL SERVICIO</b> o usted puede cancelar su Cuenta.  Si cancelamos su Cuenta, se le notificará por correo electrónico y se le proporcionará una explicación de la terminación. No obstante lo anterior, nos reservamos el derecho de cancelar su cuenta sin dar razones.</p>
    <p>11.2 <b>EL PRESTADOR DEL SERVICIO</b> se reserva el derecho a cancelar su cuenta si usted difunde contenido abusivo, amenazante, acosador, difamatorio, sexista o racista.</p>
    <p>En ningún caso se devolverá el importe pendiente. Todos los usuarios disfrutan de un plazo de días de prueba gratuitos. Una vez pasado este período entendemos que el usuario acepta las condiciones de la formación que ofrece <b>EL PRESTADOR DEL SERVICIO</b>.</p>
    
    
    <h3 class="ml-5">12. Servicios, precios y disponibilidad y clases por videoconferencia</h3>
    
    <p>12.1 Aunque todos los esfuerzos se han hecho para asegurar que todas las descripciones generales de los Servicios disponibles de <b>EL PRESTADOR DEL         SERVICIO </b>
        corresponden a los Servicios actuales que serán proporcionados a usted, no somos responsables de cualquier variación de estas descripciones como la naturaleza exacta de los Servicios puede variar Dependiendo de sus necesidades y circunstancias individuales. Esto no excluye nuestra responsabilidad por errores cometidos por negligencia de nuestra parte y se refiere únicamente a las variaciones de los servicios correctos, no los diferentes servicios en conjunto. Consulte la subcláusula 13.8 para servicios incorrectos.</p>
    
    
        <p><b>Clases por videoconferencia</b></p>
        <p>Las clases por videoconferencia en ningún caso sustituirán a los cursos online. Deben interpretarse como clases adicionales que <b>EL PRESTADOR DEL SERVICIO</b> ofrece sin que exista modificación en el precio de los cursos online, ni vinculación alguna con su precio oficial. A los efectos, los cursos online así como sus contenidos y su extensión primarán en el momento de interpretar la extensión del curso y su precio. Las clases por videoconferencia deben interpretarse como lecciones adicionales que <b>EL PRESTADOR DEL SERVICIO</b> ofrece como una cortesía.</p>
        <p>12.2 Cuando sea apropiado, se le puede requerir seleccionar el Plan de Servicios requerido.</p>
        <p>12.3 No garantizamos que dichos Servicios estarán disponibles en todo momento y no necesariamente podemos confirmar la disponibilidad hasta que confirme su pedido.</p>
        <p>12.4 Toda la información de precios en el Sitio Web es correcta en el momento de conectarse. Nos reservamos el derecho de cambiar los precios y alterar o eliminar cualquier oferta especial de vez en cuando y según sea necesario.</p>
        <p>12.5 En el caso de que se cambien los precios durante el período comprendido entre el pedido de los Servicios y el procesamiento de dicho pedido y el pago, se utilizará el precio vigente en el momento de la orden.</p>
        <p>12.6 Los precios en el sitio web no incluyen el IVA. De conformidad con la ley española que alude a que la formación no devenga IVA. 700/1 (febrero de 2014) y sus suplementos, <b>EL PRESTADOR DEL SERVICIO</b>.</p>
    
    <h3 class="ml-5">13. Órdenes y Prestación de Servicios</h3>
        <p>13.1 Ninguna parte de este Sitio Web constituye una oferta contractual susceptible de ser aceptada. Su pedido constituye una oferta contractual que, a nuestra entera discreción, podemos aceptar. Nuestra aceptación es indicada por Nosotros enviándole un correo electrónico de confirmación de pedido. Una vez que le hayamos enviado un correo electrónico de confirmación de pedido, habrá un contrato vinculante entre <b>EL PRESTADOR DEL SERVICIO</b> y usted.</p>
        <p>13.2 Las confirmaciones de pedido bajo la Subcláusula 13.1 le serán enviadas antes de comenzar los Servicios y contendrán la siguiente información:</p>
        <p>13.2.1 Confirmación de los Servicios solicitados incluyendo detalles completos de las características principales de dichos Servicios;</p>
        <p>13.2.2 Precios completamente detallados de los Servicios solicitados incluyendo, en su caso, impuestos, entrega y otros cargos adicionales;</p>
        <p>13.2.3 Horarios y fechas pertinentes para la prestación de los Servicios;</p>
        <p>13.2.4 Credenciales de usuario e información relevante para acceder a dichos servicios.</p>
        <p>13.3 Si Nosotros, por cualquier motivo, no aceptamos su pedido, no se efectuará ningún cargo en su tarjeta en circunstancias normales. En cualquier caso, las sumas pagadas por usted en relación con esa orden serán devueltas en un plazo de 14 días naturales.</p>
        <p>13.4 El pago de los Servicios se realizará de forma inmediata por cualquier tarifa de configuración que corresponda al plan de servicio adquirido y al mismo día de cada mes (“ciclo de facturación”) correspondiente a los cargos devengados durante el mes anterior ( “Ciclo de facturación”) Y / O como se indica en la confirmación de pedido que recibió.</p>
        <p>13.5 Nuestro objetivo es cumplir su orden en el momento que efectúa el pago o dentro de 2-3 días laborables o si no, dentro de un período razonable después de su orden, a menos que haya circunstancias excepcionales. Si no podemos satisfacer su Pedido dentro de un período razonable, le informaremos en el momento en que realice la Orden mediante una nota en la página web correspondiente o poniéndole en contacto directamente después de realizar su Pedido. El tiempo no es la esencia del contrato, lo que significa que trataremos de cumplir su orden dentro de los plazos acordados, pero este no es un término esencial del contrato y no seremos responsables ante usted si no lo hacemos debido a circunstancias excepcionales. Si los Servicios van a comenzar dentro de los 14 días naturales de Nuestra aceptación de su pedido, a su solicitud expresa, se le solicitará que reconozca expresamente que sus derechos de cancelación legal, detallados a continuación en la Cláusula 14, serán afectados.</p>
        <p>13.6 <b>EL PRESTADOR DEL SERVICIO</b>. Utilizará todos nuestros esfuerzos razonables para proporcionar los Servicios con la habilidad y el cuidado razonable, proporcional a las mejores prácticas comerciales.</p>
        <p>13.7 En el caso de que se proporcionen Servicios que no estén en conformidad con su pedido y por lo tanto sean incorrectos, deberá comunicarse con nosotros inmediatamente para informarnos del error. Nos aseguraremos de que las correcciones necesarias se realicen dentro de los cinco (5) días hábiles.</p>
        <p>Pueden aplicarse términos y condiciones adicionales a la prestación de determinados Servicios. Se le pedirá que lea y confirme su aceptación de dichos términos y condiciones al completar su pedido.</p>
        <p>13.8 <b>EL PRESTADOR DEL SERVICIO</b> proporcionará asistencia técnica a través de nuestro foro de soporte en línea y / o teléfono. <b>EL PRESTADOR DEL SERVICIO</b> hará todo lo posible para responder a las solicitudes de asistencia dentro de los 30 minutos durante las horas de trabajo europeas (de 9:00 a 20:00 horas), pero no garantizamos un tiempo de respuesta en particular.</p>
    
    <h3 class="ml-5">14. Cancelación de Órdenes y Servicios</h3>
    
    <p>Queremos que esté completamente satisfecho con los productos o servicios que solicita de <b>EL PRESTADOR DEL SERVICIO</b>. Si necesita hablar con nosotros sobre su pedido, póngase en contacto con el servicio de atención al cliente en el email <a href="#">info@ray-bolivar-sosa.es</a></p>
    <p>Usted puede cancelar una Orden que hemos aceptado o cancelado el Contrato. Si alguno de los Términos Específicos que acompañan al Servicio contiene términos acerca de la cancelación del Servicio, se aplicará la política de cancelación en los Términos Específicos.</p>
    <ul>
        <li>14.1 Si usted es un consumidor perteneciente a la Unión Europea, tiene un derecho de cancelación de 14 días. Este período comienza una vez que se ha registrado en nuestro website y comienza a disfrutar de su pedido y este es confirmado entre <b>EL PRESTADOR DEL SERVICIO</b> y usted. Después de esa fecha. Si cambia de opinión sobre los Servicios </li>
        <li>dentro de este período y desea cancelar su pedido, no se reembolsará el dinero del curso comprado. Infórmenos inmediatamente de su decisión de cancelar la formación en el siguiente correo electrónico: <a href="#">info@ray-bolivar-sosa.es</a> Su derecho a cancelar durante el período de reflexión está sujeto a las disposiciones de la subcláusula 14.2. 14.2 Como se especifica en la subcláusula 13.6, si desea cancelar el servicio antes de que transcurran los 14 días en los que puede recuperar el dinero debe hacer una solicitud expresa a tal efecto al siguiente email info@ray-bolivar-sosa.es. Si supera el plazo de prueba de 14 días usted reconoce y acepta lo siguiente:
    </li>
    </ul>
    <p>14.2.1, perderá su derecho a cancelar una vez que hayan pasado los primeros 14 días.</p>
    <p>14.2.2 Si cancela los Servicios después de que la formación  haya comenzado pero aún no está completa, y antes de que transcurran los 14 días de prueba gratuitos, deberá pagar los Servicios suministrados hasta el momento en que nos informa que desea cancelar. El importe adeudado se calculará en proporción al precio total de los Servicios y de los Servicios ya prestados. Cualquier suma que ya haya sido pagada por los Servicios será reembolsada sujeto a deducciones calculadas de acuerdo con lo anterior. Los reembolsos, en su caso, se emitirán dentro de los 5 días hábiles y, en cualquier caso, a más tardar 14 días hábiles después de informarnos que desea cancelar.</p>
    <p>14.2.3 En el caso de la construcción de blogs o sitios webs, no se admite la devolución. En caso de que el blog posea errores el <b>PRESTARDOR DEL SERVICIO</b> se compromete a resolverlos en el plazo de 72 horas.</p>
    <ul>
        <li>14.3 La cancelación de servicios después de transcurrido el período de 14 días naturales estará sujeta a las condiciones específicas que rigen dichos servicios y puede estar sujeta a una duración mínima del contrato.</li>
    </ul>
    
    <h3 class="ml-5">15. Privacidad</h3>
            <p>El uso del Sitio Web también se rige por nuestra Política de Privacidad (academia.ray-bolivar-sosa.es) que se incorpora a estos Términos y Condiciones mediante esta referencia. Para ver la Política de privacidad, haga clic en el enlace anterior.</p>
    
    <h3 class="ml-5">16. Cómo utilizamos su información personal</h3>
    <p>
        <ul>
            <li>16.1 Toda la información personal que podamos recopilar (incluyendo, pero no limitada a, su nombre y dirección) será recolectada, utilizada y mantenida de acuerdo con las disposiciones de la Ley de Protección de Datos de 1998 y sus derechos bajo esta Ley.</li>
            <li>16.2 Podemos usar su información personal para: O 16.2.1 Proveerlo a usted de nuestros servicios; O 16.2.2 Procesar su pago por los Servicios; </li>
            <li>16.2.3 Informarle de nuevos productos y servicios disponibles de nosotros. Usted puede solicitar que dejemos de enviarle esta información en cualquier momento</li>
            <li>16.3 En ciertas circunstancias (si, por ejemplo, desea comprar servicios a crédito) y con su consentimiento, podemos pasar su información personal a agencias de referencia de crédito. Estas agencias también están obligadas por la Ley de Protección de Datos de 1998 y deben utilizar y mantener su información personal en consecuencia.</li>
            <li>16.4 No transmitiremos su información personal a terceros sin antes obtener su permiso expreso.</li>
        </ul>
    </p>
    <h3 class="ml-5">17. Descargo de responsabilidad</h3>
    <p>
        <ul>
            <li>17.1 No ofrecemos garantía de que el Sitio Web cumpla durante todo el período de la contratación con todas sus requisitos, que será de calidad satisfactoria, que será apto para un propósito particular, que será compatible con todos los sistemas, que será seguro y que toda la información proporcionada será exacta. No garantizamos ningún resultado específico del uso de nuestros Servicios o Servicios salvo que usted accederá a un conjunto de lecciones elaboradas y estructuradas por profesionales y que además contará con la asistencia y ayuda de un tutor durante todo el proceso formativo, así como que los contenidos serán de la mayor calidad posible.</li>
            <li>17.2 Ninguna parte de este Sitio Web tiene la intención de constituir un consejo y no se debe confiar en el Contenido de este Sitio Web al tomar cualquier decisión personal o tomar acciones de cualquier tipo.</li>
            <li>17.3 Ninguna parte de este Sitio Web pretende constituir una oferta contractual susceptible de aceptación.</li>
            <li>17.4 Mientras nos esforzamos razonablemente para garantizar que el Sitio Web sea seguro y libre de errores, virus y otros programas maliciosos, se recomienda encarecidamente asumir la responsabilidad de su propia seguridad en Internet, la de sus datos personales y sus computadoras.</li>
        </ul>
    </p>
    <h3 class="ml-5">18. Cambios en las Instalaciones y en estos Términos y Condiciones</h3>
    <p>Nos reservamos el derecho de cambiar el Sitio Web, su Contenido o estos Términos y Condiciones en cualquier momento. Usted estará sujeto a cualquier cambio en los Términos y Condiciones desde la primera vez que use el Sitio Web después de los cambios. Si se nos exige que realicemos cambios a estos Términos y condiciones por ley, estos cambios se aplicarán automáticamente a cualquier pedido actualmente pendiente, además de los pedidos realizados por usted en el futuro.</p>
    <h3 class="ml-5">19. Disponibilidad del sitio web</h3>
    <p>
        <ul>
            <li>19.1 El Sitio Web se proporciona “tal cual” y en la base “según sea posible”. <b>EL PRESTADOR DEL SERVICIO</b> utiliza las mejores prácticas de la industria para proporcionar un alto tiempo de actividad, incluida una arquitectura tolerante a fallos alojada en servidores en la nube. No garantizamos que el Sitio Web o las Instalaciones estén libres de defectos y / o fallas y no proporcionamos ningún tipo de reembolso por interrupciones. No ofrecemos garantías (expresas o implícitas) de idoneidad para un propósito en particular, exactitud de información, compatibilidad y calidad satisfactoria.</li>
            <li>19.2 No aceptamos ninguna responsabilidad por cualquier interrupción o no disponibilidad del Sitio Web que resulte de causas externas incluyendo, pero no limitado a, fallas de equipos de ISP, fallas de equipos anfitriones, fallas de redes de comunicaciones, fallas de energía, eventos naturales, actos de guerra o legales</li>
        </ul>
    </p>
    
    <h4>Restricciones y censura.</h4>
    <h3 class="ml-5">20. Limitación de responsabilidad</h3>
    <p><ul>
        <li>20.1 Hasta el máximo permitido por la ley, no asumimos ninguna responsabilidad por cualquier pérdida o daño directo o indirecto, previsible o de otro tipo, incluyendo cualquier daño indirecto, consecuencial, especial o ejemplar que surja del uso del Sitio Web o cualquier información contenida en el mismo. Usted debe ser consciente de que usted utiliza el Sitio Web y su contenido a su propio riesgo.</li>
        <li>20.2 Nada de lo contenido en estos Términos y Condiciones excluye o restringe la responsabilidad de <b>EL PRESTADOR DEL SERVICIO</b> por muerte o lesiones personales resultantes de cualquier negligencia o fraude por parte de <b>EL PRESTADOR DEL SERVICIO</b>.</li>
        <li>20.3 Nada de lo contenido en estos Términos y Condiciones excluye o restringe la responsabilidad de <b>EL PRESTADOR DEL SERVICIO</b> por cualquier pérdida o daño directo o indirecto que surja de la provisión incorrecta de Servicios o de la dependencia de información incorrecta incluida en el Sitio Web.</li>
        <li>20.4 En el caso de que cualquiera de estos términos se considere ilegal, inválido o inaplicable, dicho término se considerará separado de estos Términos y Condiciones y no afectará a la validez y aplicabilidad de los restantes Términos y Condiciones. Este término se aplicará solamente dentro de las jurisdicciones donde un término en particular es ilegal.</li>
    </ul>
    </p>
    <h3 class="ml-5">21. Sin renuncia</h3>
    <p>En el caso de que alguna de las partes en estos Términos y Condiciones no ejerza ningún derecho o recurso contenido en el presente documento, no se interpretará como una renuncia a dicho derecho o recurso.</p>
    <h3 class="ml-5">22. Términos y condiciones anteriores</h3>
    <p>En caso de conflicto entre estos Términos y Condiciones y cualquier versión anterior de los mismos, prevalecerán las disposiciones de estos Términos y Condiciones a menos que se indique expresamente lo contrario.</p>
    <h3 class="ml-5">23. Derechos de terceros</h3>
    <p>Nada en estos Términos y Condiciones conferirá ningún derecho sobre terceros. El acuerdo creado por estos Términos y Condiciones es entre usted y <b>EL PRESTADOR DEL SERVICIO</b>.</p>
    <h3 class="ml-5">24. Comunicaciones</h3>
    <p>
        <ul>
            <li>24.1 Todos los avisos y comunicaciones nos serán entregados por correo electrónico a <a href="#">info@ray-bolivar-sosa.es</a> Dicha notificación se considerará recibida, el día de envío si el correo electrónico se recibe en su totalidad en un día hábil y en el siguiente día hábil si se envía un fin de semana o un día festivo.</li>
            <li>24.2 De vez en cuando, si usted opta por recibirlo, le enviaremos información sobre Nuestros productos y / o servicios. Si no desea recibir dicha información, haga clic en el enlace “Anular suscripción” en cualquier correo electrónico que reciba de nosotros.
            
    </li>
        </ul>
    </p>
    <h3 class="ml-5">25. Derecho y Jurisdicción</h3>
    <p>Estos Términos y Condiciones y la relación entre usted y <b>EL PRESTADOR DEL SERVICIO</b> se regirán e interpretarán de conformidad con la Ley española <b>EL PRESTADOR DEL SERVICIO</b> y usted acuerda someterse a la jurisdicción exclusiva de los Tribunales de Madrid. España.</p>
    
        </div>
    


    </div>
	</div>


			<div class="stm_lms_courses">

	
			</div>

		</div>

	</div>
</div></div>
		</div>
	</div>

           </div>
</div>
		
        

<link rel='stylesheet' id='stm-lms-user_info_top-css'  href="{{url('presend/wp-content/plugins/masterstudy-lms-learning-management-system/assets/css/parts/user_info_topdbc8.css?ver=1628162812')}}" type='text/css' media='all' />
<link rel='stylesheet' id='stm-lms-user_bio-css'  href="{{url('presend/wp-content/plugins/masterstudy-lms-learning-management-system/assets/css/parts/user_biodbc8.css?ver=1628162812')}}" type='text/css' media='all' />
<link rel='stylesheet' id='stm-lms-courses-css'  href="{{url('presend/wp-content/plugins/masterstudy-lms-learning-management-system/assets/css/parts/coursesdbc8.css?ver=1628162812')}}" type='text/css' media='all' />
<link rel='stylesheet' id='stm-lms-courses/style_1-css'  href="{{url('presend/wp-content/plugins/masterstudy-lms-learning-management-system/assets/css/parts/courses/style_1dbc8.css?ver=1628162812')}}" type='text/css' media='all' />




<script type='text/javascript' src="{{url('presend/wp-content/themes/masterstudy/assets/js/vc_modules/vue-autocomplete/vue2-autocompleteb5ca.js?ver=1628162811')}}" id='stm-vue-autocomplete-js'></script>
<script type='text/javascript' src="{{url('presend/wp-content/themes/masterstudy/assets/js/vc_modules/courses_search/courses_searchb5ca.js?ver=1628162811')}}" id='stm-courses_search-js'></script>







<script type='text/javascript' src="{{url('presend/wp-content/plugins/masterstudy-lms-learning-management-system/assets/js/coursesdbc8.js?ver=1628162812')}}" id='stm-lms-courses-js'></script>
<script type='text/javascript' src="{{url('presend/wp-content/plugins/masterstudy-lms-learning-management-system/assets/js/wishlistdbc8.js?ver=1628162812')}}" id='stm-lms-wishlist-js'></script>






@endsection