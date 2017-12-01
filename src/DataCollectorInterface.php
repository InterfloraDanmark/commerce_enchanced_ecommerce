<?php

namespace Drupal\commerce_enchanced_ecommerce;

use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_order\Entity\OrderItemInterface;
use Drupal\commerce_product\Entity\ProductInterface;
use Drupal\commerce_shipping\Entity\ShipmentInterface;
use Drupal\commerce_shipping\ShipmentItem;

/**
 * class DataCollector
 */
interface DataCollectorInterface  {

  /**
   * Get product data.
   *
   * @param \Drupal\commerce_product\Entity\ProductInterface $product
   *   The product to compile data from.
   *
   * @return array
   *   A array formatted for google enchanced ecommerce.
   */
  public function getProductData(ProductInterface $product);

  /**
   * Get the cart product data.
   *
   * @param \Drupal\commerce_order\Entity\OrderItemInterface $orderItem
   *   The order item to compile data from.
   *
   * @return array
   *   A array formatted for google enchanced ecommerce.
   */
  public function getCartProductData(OrderItemInterface $orderItem);

  /**
   * Get the shipment product.
   *
   * @param \Drupal\commerce_shipping\ShipmentItem $item
   *   The shipment item.
   * @param \Drupal\commerce_shipping\Entity\ShipmentInterface $shipment
   *   The shipment.
   *
   * @return array
   *   A array formatted for google enchanced ecommerce.
   */
  public function getShipmentProduct(ShipmentItem $item, ShipmentInterface $shipment);

  /**
   * Get order complete data.
   *
   * @param \Drupal\commerce_order\Entity\OrderInterface $order
   *   The order entity.
   * @param array $form
   *   The order complete pane form.
   *
   * @return array
   *   A array formatted for google enchanced ecommerce.
   */
  public function getOrderComplete(OrderInterface $order, array &$form);

  /**
   * Get checkout data.
   *
   * @param string $stepId
   *   The current step id.
   * @param array $products
   *   The products being purchased.
   *
   * @return array
   *   A array formatted for google enchanced ecommerce.
   */
  public function getCheckoutStep($stepId, array $products);

}