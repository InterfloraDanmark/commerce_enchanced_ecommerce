<?php

namespace Drupal\commerce_enchanced_ecommerce;

use Drupal\commerce_enchanced_ecommerce\Model\EnchancedECommerceCartProduct;
use Drupal\commerce_enchanced_ecommerce\Model\EnchancedECommerceCheckout;
use Drupal\commerce_enchanced_ecommerce\Model\EnchancedECommerceOrder;
use Drupal\commerce_enchanced_ecommerce\Model\EnchancedECommerceProduct;
use Drupal\commerce_enchanced_ecommerce\Model\EnchancedECommerceShipmentProduct;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_order\Entity\OrderItemInterface;
use Drupal\commerce_product\Entity\ProductInterface;
use Drupal\commerce_shipping\Entity\ShipmentInterface;
use Drupal\commerce_shipping\ShipmentItem;

/**
 * class DataCollector
 */
class DataCollector implements DataCollectorInterface {

  /**
   * {@inheritdoc}
   */
  public function getProductData(ProductInterface $product) {
    $variant = $product->getDefaultVariation();
    $enchanchedEcommerce = new EnchancedECommerceProduct($product, $variant);
    return $enchanchedEcommerce->toExport();
  }

  /**
   * {@inheritdoc}
   */
  public function getCartProductData(OrderItemInterface $orderItem) {
    /** @var \Drupal\commerce_product\Entity\ProductVariationInterface $purchased_entity */
    $purchased_entity = $orderItem->getPurchasedEntity();
    if ($purchased_entity !== NULL) {
      /** @var \Drupal\commerce_product\Entity\ProductInterface $purchased_entity */
      $product = $purchased_entity->getProduct();
      $enchanchedEcommerce = new EnchancedECommerceCartProduct($product, $purchased_entity);
      return $enchanchedEcommerce->toExport();
    }
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getShipmentProduct(ShipmentItem $item, ShipmentInterface $shipment) {
    $shipmentProductInfo = new EnchancedECommerceShipmentProduct($item, $shipment);
    return $shipmentProductInfo->toExport();
  }

  /**
   * {@inheritdoc}
   */
  public function getOrderComplete(OrderInterface $order, array &$form) {
    $enchanchedEcommerce = new EnchancedECommerceOrder($order);
    $enchanchedEcommerce->getOrderCompleteData($form);
  }

  /**
   * {@inheritdoc}
   */
  public function getCheckoutStep($stepId, array $products) {
    return new EnchancedECommerceCheckout($stepId, $products);
  }

}