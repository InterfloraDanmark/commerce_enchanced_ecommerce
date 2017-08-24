(function($) {

    Drupal.behaviors.ceeAddToCart = {
        attach: function(context, settings) {
            $('.delete-order-item', context).on('click', function (evt) {
                evt.preventDefault();
                var productId = $(this).closest('.cart-list--item, tr').attr('data-product-id'),
                    detailsObj = settings.ceeRemoveFromCart[productId],
                    product = $.getAdjustCartInformation(detailsObj);
                dataLayer.push({
                    'event': 'removeFromCart',
                    'ecommerce': {
                        'remove': {
                            'products': [product]
                        }
                    }
                });
            });
        }
    };

})(jQuery);
