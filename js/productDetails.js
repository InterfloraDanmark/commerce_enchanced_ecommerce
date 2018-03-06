(function($) {

    productVariant = '';
    Drupal.behaviors.ceeProductDetails = {
        attach: function(context, settings) {
            if ($('body.path-product', context).length > 0) {
                var detailsObj = settings.commerceEnchancedECommerce,
                    details = $.getProductDetails(detailsObj);
                productVariant = detailsObj.variant;
                dataLayer.push({
                    'event': 'productDetails',
                    'ecommerce': {
                        'detail': details
                    }
                });
            }
            if (productVariant !== '' && settings.commerceEnchancedECommerce.variant !== productVariant) {
                var detailsObj = settings.commerceEnchancedECommerce,
                    details = $.getProductDetails(detailsObj);
                productVariant = detailsObj.variant;
                dataLayer.push({
                    'event': 'productDetails',
                    'ecommerce': {
                        'detail': details
                    }
                });
            }
        }
    };
})(jQuery);
