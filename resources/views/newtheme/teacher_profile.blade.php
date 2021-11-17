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

		<div class="col-md-3 col-sm-12">

			
<div class="stm_lms_user_side">

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
	
	

</div>
		</div>

		<div class="col-md-9 col-sm-12">

			
<div class="stm_lms_user_info_top">
	<h1>Ray Bolívar Sosa</h1>

	
<div class="stm_lms_user_info_top__socials">
						<a href="https://www.facebook.com/Ray-Bolívar-Sosa-1661191420834918"
               target="_blank"
               class="facebook stm_lms_update_field__facebook">
				<i class="fab fa-facebook-f"></i>
			</a>
								<a href="https://twitter.com/raybolivar_?lang=es"
               target="_blank"
               class="twitter stm_lms_update_field__twitter">
				<i class="fab fa-twitter"></i>
			</a>
								<a href="https://www.instagram.com/ray1no3/?hl=es"
               target="_blank"
               class="instagram stm_lms_update_field__instagram">
				<i class="fab fa-instagram"></i>
			</a>
						</div>
</div>
			
	<div class="stm_lms_user_bio">
		<h3>Bio</h3>
        <div class="stm_lms_update_field__description">

        <p>
        Hola, soy Ray Bolívar Sosa experto en Escritura Académica y Escritura Creativa. Soy el creador de esta modesta escuela en la que enseño todo lo que sé sobre escritura. Tengo una experiencia de alrededor de quince años impartiendo formación tanto en Lengua y literatura como en Escritura Académica, con lo cual, te animo a que des una vuelta por la escuela, hay mucha información que podría interesarte.
        </p>

        <h3>Doctorado</h3>
        <p>
        Llegué a España en el año 2005 con una beca de creación literaria. Posteriormente matriculé en el doctorado de Didáctica de la Lengua y la Literatura ofrecido por la Universidad Complutense. Tuve la suerte de conocer a grandes profesionales en dicho doctorado que me ayudaron a mejorar mi sistema de corrección, pero sobre todo, a corregir mis textos y por ende, a escribir mejor.
        </p>

        <h3>Trayectoria literaria</h3>
        <p>
       Mi trayectoria literaria es amplia. Con dieciocho años fui seleccionado para integrar el Taller de Formación Literaria Onelio Jorge Cardoso. En este taller recibí clases y seminarios de personalidades del ámbito de las letras. Menciono sólo algunos.<br>
        José Saramago.<br>
        Leonardo Padura.<br>
        Eduardo Heras León.<br>
        Francisco Lopez Sacha.<br>
        Eduardo Galeano.<br>
        Durante los años 2003 y 2005 impartí talleres de Escritura Creativa a niños, jóvenes y adultos. Tengo una gran experiencia como educador. Enseñar es una de mis pasiones.
        </p>

        <h3>Mi vida en España</h3>
        <p>
        Desde el año 2006 y hasta la fecha he sido profesor de Lengua Española y Escritura Académica tanto para niños como para adultos. Gran parte de mi actividad docente se desarrolló en el Instituto Público Virgen de la Paz, radicado en Alcobendas así como en academias y centros de trabajo que han contratado mis servicios.
        </p>

        <h3>Proyecto de tesis</h3>
        <p>
        Mi proyecto de tesis está basado en un taller de Escritura Creativa enfocado a niños de 14 y 16 años. Además, he ofrecido sesiones de coach personalizado a un gran número de alumnos de entre 15 y 29 años que han solicitado mis servicios para superar sus dificultades al escribir.
        </p>

        <h3>Principales habilidades</h3>
        <p>
        Tengo una gran pericia en el ámbito de las letras que combino con un método educativo excepcional, fruto de mi formación como psicopedagogo y de mi experiencia como profesor. Mis clases Son dinámicas y divertidas. Cada encuentro supone un reto tanto para mí como para los estudiantes que me siguen. <br>

        El principal valor que tengo como profesional es que <strong>soy capaz de formarte en poco tiempo para que seas capaz de escribir con una técnica excepcional,</strong>  desarrollando personajes memorables e historias difíciles de olvidar.
Obras publicadas
        </p>

        <h3>Obras publicadas</h3>
        <p>
       Escribo desde los ocho años. Tengo escritas varias novelas y libros de cuentos. Sin embargo, no es hasta el año 2016 que me he sentido con suficiente madurez como para mostrar al público lo que tengo que decir.<br>
        En los siguientes enlaces encontrarás más información sobre mis novelas y podrás leer el primer capítulo gratis.

        La Ira de los Elegidos.<a href="https://www.amazon.es/gp/product/B01NCA4YQT/ref=dbs_a_def_rwt_hsch_vapi_tkin_p1_i0" target="_blank">Acceder a la novela.</a><br>

        La Herejía de los Dioses.<a href="https://www.amazon.es/gp/product/B0751FNGKV/ref=dbs_a_def_rwt_hsch_vapi_tkin_p1_i2" target="_blank">Acceder a la novela</a><br>

        El Secreto de Sophie. <a href="https://www.amazon.es/gp/product/B01JEC5CM0/ref=dbs_a_def_rwt_hsch_vapi_tkin_p1_i3" style="color: royalblue;" target="_blank">Acceder a la novela.</a><br>

        Cielo Rojo. <a href="https://www.amazon.es/gp/product/B07MTFPB16/ref=dbs_a_def_rwt_hsch_vapi_tkin_p1_i6" style="color: royalblue;" target="_blank">Acceder a la novela.</a><br>
        7 factores de éxito para escribir historias memorables.<a href="https://www.amazon.es/gp/product/B07D4HNMV1/ref=dbs_a_def_rwt_hsch_vapi_tkin_p1_i4" style="color: royalblue;" target="_blank">Acceder al libro.</a> La última vez que me dijiste adiós.<a href="https://www.amazon.es/%C3%BAltima-vez-que-dijiste-adi%C3%B3s-ebook/dp/B088C1433L" target="_blank">Acceder a la novela.</a>
        </p>


    </div>
	</div>


			<div class="stm_lms_courses">

				
<div class="stm_lms_courses">

    <div class="stm_lms_courses__top">
        <h3>Teacher Courses</h3>
    </div>

<div class="stm_lms_courses__grid stm_lms_courses__grid_4 stm_lms_courses__grid_right vue_is_disabled stm_lms_courses__grid_found_24"
        data-pages="3">
    
    @if($courses->count() > 0)
 @foreach($courses as $course)


<div class="stm_lms_courses__single stm_lms_courses__single_animation no-sale style_1 ">

    <div class="stm_lms_courses__single__inner">

        
<div class="stm_lms_courses__single--image">

    
    
    
    <a href="{{ route('courses.show', [$course->slug]) }}"
       class="heading_font"
       data-preview="Preview this course">
        <div>
            <div class='stm_lms_lazy_image'><img data-src="{{asset('storage/uploads/'.$course->course_image)}}" 
                src="{{asset('storage/uploads/'.$course->course_image)}}" 
                alt='' class="lazyload lazyload" />
            </div> 
        </div>
    </a>

</div>
        <div class="stm_lms_courses__single--inner">

            
	<div class="stm_lms_courses__single--terms">
		<div class="stm_lms_courses__single--term">
			Cursos gratuitos		</div>
	</div>

            <div class="stm_lms_courses__single--title">
	<a href="{{ route('courses.show', [$course->slug]) }}">
		<h5>{{$course->title}}</h5>
	</a>
</div>
            <div class="stm_lms_courses__single--meta">

                


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
                Ray Bolívar Sosa            </div>
        </div>
    
    <div class="stm_lms_courses__single--info_title">
        <a href="{{ route('courses.show', [$course->slug]) }}">
            <h4>{{$course->title}}</h4>
        </a>
    </div>

    <div class="stm_lms_courses__single--info_rate">

        
        
    </div>

<style type="text/css">
    .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>

    <div class="stm_lms_courses__single--info_excerpt text">
         {!! strip_tags($course->description) !!}  

     </div>

    <div class="stm_lms_courses__single--info_meta">

        
	<div class="stm_lms_course__meta">
		<i class="stmlms-cats"></i>
		{{$course->lessons->count()}} Lecturas </div>
    


    </div>

    <div class="stm_lms_courses__single--info_preview">
        <a href="{{ route('courses.show', [$course->slug]) }}" title="" class="heading_font">
            Previsualizar este curso        </a>
    </div>

    <div class="stm_lms_courses__single--info_bottom">
        
<div class="stm-lms-wishlist"
     data-add="Add to Wishlist"
     data-add-icon="far fa-heart"
     data-remove="Wishlisted"
     data-remove-icon="fa fa-heart"
     data-id="6548">
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