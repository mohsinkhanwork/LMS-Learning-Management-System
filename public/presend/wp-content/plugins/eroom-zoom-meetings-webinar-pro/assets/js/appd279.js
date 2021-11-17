(function ($) {
    'use strict';
    $(document).ready(function () {

		$('.stm_eroom_single_add_to_cart_button').on('click', function(event) {
			if($(this).hasClass('stm-wc-add-to-cart-clicked')){
				event.preventDefault();
			} else {
				$(this).addClass('stm-wc-add-to-cart-clicked');
			}
		});

        $('.contact_host a').on('click', function (e) {
            e.preventDefault();
            $('.contact_popup').addClass('active');
        });
        $('.contact_popup .close_popup, .contact_popup .overlay_popup').on('click', function(){
            $('.contact_popup').removeClass('active');
        });

        $('.contact_popup form').on('submit', function (e) {
            e.preventDefault();
            var name = $(this).find('[name=name]').val();
            var email = $(this).find('[name=email]').val();
            var message = $(this).find('[name=message]').val();
            var host_email = $(this).find('[name=host_email]').val();
            var form = $(this);
            form.find('button').hide();
            if(typeof name !== 'undefined' && typeof email !== 'undefined' && typeof message !== 'undefined'){
                $.ajax({
                    method: 'post',
                    type: 'json',
                    url: stm_wpcfto_ajaxurl,
                    data: {
                        action: 'stm_zoom_send_message',
                        name: name,
                        email: email,
                        message: message,
                        host_email: host_email,
                    },
                    success(r) {
                        form.find('.response').text(r.message).addClass(r.status);
                        form.find('button').show();
                    }
                })
            }


        });

        function resizeElements() {
            const $primary = $('.product-type-stm_zoom');
            if ($primary.width() > 1000){
                $('.product-type-stm_zoom').removeClass('half');
                $('.product-type-stm_zoom').addClass('wide');
            }else{
                $('.product-type-stm_zoom').removeClass('wide');
                $('.product-type-stm_zoom').addClass('half');
            }
        }
        $(window).on('resize', function () {
            resizeElements();
        }).trigger('resize');
    });
})(jQuery);