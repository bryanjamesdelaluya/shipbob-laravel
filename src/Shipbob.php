<?php

namespace Bryanjamesdelaluya\ShipbobLaravel;

use GuzzleHttp\Client as GuzzleClient;

/**
* Class Shipbob
* @package Bryanjamesdelaluya\ShipbobLaravel
* @author Bryan James Dela Luya
**/

class Shipbob
{
    //end points
    CONST ORDER = 'order';
    CONST SHIPMENT = 'shipment';
    CONST SHIPPING_METHOD = 'shipment';
    const PRODUCT = 'product';
    const INVENTORY = 'inventory';
    const CHANNEL = 'channel';
    const RETURN = 'return';
    const FULFILLMENT_CENTER = 'fulfillmentCenter';
    const RECEIVING = 'receiving';
    const WEBHOOK = 'webhook';
    const LOCATION = 'location';

    /* ORDERS */

    /**
    * Estimate Fulfillment Cost For Order
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1estimate/post
    *
    * @param string (JSON) $params
    * @return mixed
    **/
    public static function estimateFulfillment($params) 
    {
        return self::requestHttp('POST', self::ORDER . '/estimate', $params);
    }

    /**
    * Get Order
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}/get
    *
    * @param integer $orderId
    * @return mixed
    **/
    public static function getOrder($orderId) 
    {
        return self::requestHttp('GET', self::ORDER . '/' . $orderId);
    }

    /**
    * Get Orders
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order/get
    *
    * @return mixed
    **/
    public static function getAllOrders() 
    {
        return self::requestHttp('GET', self::ORDER);
    }

    /**
    * Create Order
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order/post
    *
    * @param string (JSON) $params
    * @return mixed
    **/
    public static function createOrder($params) 
    {
        return self::requestHttp('POST', self::ORDER, $params);
    }

    /**
    * Cancel single Order by Order ID
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1cancel/post
    *
    * @param integer $orderId
    * @return mixed
    **/
    public static function cancelOrder($orderId) 
    {
        return self::requestHttp('POST', self::ORDER . '/' . $orderId . '/cancel');
    }

    /**
    * Get Order Store Json
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1storeOrderJson/get
    *
    * @param integer $orderId
    * @return mixed
    **/
    public static function getOrderStoreJson($orderId) 
    {
        return self::requestHttp('GET', self::ORDER . '/' . $orderId . '/storeOrderJson');
    }

    /**
    * Save the Store Order Json
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1storeOrderJson/post
    *
    * @param integer $orderId
    * @return mixed
    **/
    public static function addOrderStoreJson($orderId, $params) 
    {
        return self::requestHttp('POST', self::ORDER . '/' . $orderId . '/storeOrderJson', $params);
    }

    /**
    * Get one Shipment by Order Id and Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1shipment~1{shipmentId}/get
    *
    * @param integer $orderId
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function getShipmentByOrderId($orderId, $shipmentId) 
    {
        return self::requestHttp('GET', self::ORDER . '/' . $orderId . `/shipment/` . $shipmentId);
    }

    /**
    * Cancel one Shipment by Order Id and Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1shipment~1{shipmentId}~1cancel/post
    *
    * @param integer $shipmentId
    * @param integer $orderId
    * @return mixed
    **/
    public static function cancelShipmentByOrderId($shipmentId, $orderId) 
    {
        return self::requestHttp('POST', self::ORDER . '/' . $orderId . `/shipment/` . $shipmentId . '/cancel');
    }

    /**
    * Get one Shipment's status timeline by Order Id and Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1shipment~1{shipmentId}~1timeline/get
    *
    * @param integer $orderId
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function getShipmentStatusTimeline($orderId, $shipmentId) 
    {
        return self::requestHttp('GET', self::ORDER . '/' . $orderId . `/shipment/` . $shipmentId . '/timeline');
    }

    /**
    * Get all Shipments for Order
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1shipment/get
    *
    * @param integer $orderId
    * @return mixed
    **/
    public static function getAllShipmentsForOrder($orderId) 
    {
        return self::requestHttp('GET', self::ORDER . '/' . $orderId . '/shipment');
    }

    /**
    * Get logs for one Shipment by Order Id and Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1order~1{orderId}~1shipment~1{shipmentId}~1logs/get
    *
    * @param integer $orderId
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function getLogsForShipment($orderId, $shipmentId) 
    {
        return self::requestHttp('GET', self::ORDER . '/' . $orderId . `/shipment/` . $shipmentId . '/logs');
    }

    /* SHIPMENT */

    /**
    * Get one Shipment by Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1shipment~1{shipmentId}/get
    *
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function getShipment($shipmentId) 
    {
        return self::requestHttp('GET', self::SHIPMENT . '/' . $shipmentId);
    }

    /**
    * Cancel one Shipment by Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1shipment~1{shipmentId}~1cancel/post
    *
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function cancelShipment($shipmentId) 
    {
        return self::requestHttp('POST', self::SHIPMENT . '/' . $shipmentId . '/cancel');
    }

    /**
    * Cancel multiple Shipments by Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1shipment~1cancelbulk/post
    *
    * @param string (JSON) $data
    * @return mixed
    **/
    public static function cancelMultipleShipment($data) 
    {
        return self::requestHttp('POST', self::SHIPMENT . '/cancelbulk', $data);
    }

    /**
    * Get one Shipment's status timeline by Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1shipment~1{shipmentId}~1timeline/get
    *
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function getShipmentTimeline($shipmentId) 
    {
        return self::requestHttp('GET', self::SHIPMENT . '/' . $shipmentId . '/timeline');
    }

    /**
    * Get logs for one Shipment by Shipment Id
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1shipment~1{shipmentId}~1logs/get
    *
    * @param integer $shipmentId
    * @return mixed
    **/
    public static function getShipmentLogs($shipmentId) 
    {
        return self::requestHttp('GET', self::SHIPMENT . '/' . $shipmentId . '/logs');
    }

    /**
    * Get shipping methods
    * https://developer.shipbob.com/api-docs#tag/Orders/paths/~1shippingmethod/get
    *
    * @return mixed
    **/
    public static function getShippingMethods() 
    {
        return self::requestHttp('GET', self::SHIPMENT . '/shippingmethod');
    }
    
    /* PRODUCTS */

    /**
    * Get multiple products
    * https://developer.shipbob.com/api-docs#tag/Products/paths/~1product/get
    *
    * @param null
    * @return mixed
    **/
    public static function getMultipleProducts()
    {
        return self::requestHttp('GET', self::PRODUCT);
    }

    /**
    * Add a single product to the store
    * https://developer.shipbob.com/api-docs#tag/Products/paths/~1product/post
    *
    * @param array $data
    * @return mixed
    **/
    public static function addSingleProduct($data) 
    {
        $body = '{
            "reference_id": ' . $data['reference_id'] . ',
            "sku": ' . $data['sku'] . ',
            "name": ' . $data['name'] . ',
            "barcode": ' . $data['barcode'] . '
        }';

        return self::requestHttp('POST', self::PRODUCT, $body);
    }

    /**
    * Get a single product
    * https://developer.shipbob.com/api-docs#tag/Products/paths/~1product~1{productId}/get
    *
    * @param integer $productId
    * @return mixed
    **/
    public static function getSingleProduct($productId) 
    {
        return self::requestHttp('GET', self::PRODUCT . '/' . $productId);
    }

    /**
    * Modify a single product
    * https://developer.shipbob.com/api-docs#tag/Products/paths/~1product~1{productId}/put
    *
    * @param array $data
    * @return mixed
    **/
    public static function editSingleProduct($data, $productId) 
    {
        $body = '{
            "sku": ' . $data['sku'] . ',
            "name": ' . $data['name'] . ',
            "barcode": ' . $data['barcode'] . '
        }';

        return self::requestHttp('PUT', self::PRODUCT . '/' . $productId, $body);
    }

    /**
    * Add multiple products to the store
    * https://developer.shipbob.com/api-docs#tag/Products/paths/~1product~1batch/post
    *
    * @param array $data
    * @return mixed
    **/
    public static function addMultipleProduct($data) 
    {
        return self::requestHttp('POST', self::PRODUCT . '/batch', $data);
    }

    /* INVENTORY */

    /**
    * Get an inventory item
    * https://developer.shipbob.com/api-docs#tag/Inventory/paths/~1inventory~1{inventoryId}/get
    *
    * @param integer $inventoryId
    * @return mixed
    **/
    public static function getInventory($inventoryId) 
    {
        return self::requestHttp('GET', self::INVENTORY . '/' . $inventoryId);
    }

    /**
    * Get an inventory item
    * https://developer.shipbob.com/api-docs#tag/Inventory/paths/~1inventory~1{inventoryId}/get
    *
    * @return mixed
    **/
    public static function fetchAllInventory() 
    {
        return self::requestHttp('GET', self::INVENTORY);
    }

    /**
    * Get an inventory item
    * https://developer.shipbob.com/api-docs#tag/Inventory/paths/~1inventory~1{inventoryId}/get
    *
    * @param integer $inventoryId
    * @return mixed
    **/
    public static function getInventoryByProductId($productId) 
    {
        return self::requestHttp('GET', self::PRODUCT . '/' . $productId . '/inventory');
    }

    /* CHANNEL */

    /**
    * Get user-authorized channel info
    * https://developer.shipbob.com/api-docs#tag/Channels/paths/~1channel/get
    *
    * @return mixed
    **/
    public static function channel() 
    {
        return self::requestHttp('GET', self::CHANNEL);
    }

    /* RETURN */

    /**
    * Get Return Order
    * https://developer.shipbob.com/api-docs#tag/Returns/paths/~1return~1{id}/get
    *
    * @param integer $id
    * @return mixed
    **/
    public static function getReturn($id) 
    {
        return self::requestHttp('GET', self::RETURN . '/' . $id);
    }

    /**
    * Modify Return Order
    * https://developer.shipbob.com/api-docs#tag/Returns/paths/~1return~1{id}/put
    *
    * @param integer $id
    * @return mixed
    **/
    public static function editReturnOrder($id, $data) 
    {
        return self::requestHttp('PUT', self::RETURN . '/' . $id, $data);
    }

    /**
    * Get Return Orders
    * https://developer.shipbob.com/api-docs#tag/Returns/paths/~1return/get
    *
    * @param integer $id
    * @return mixed
    **/
    public static function fetchReturnOrders($id) 
    {
        return self::requestHttp('PUT', self::RETURN);
    }

    /**
    * Create Return Order
    * https://developer.shipbob.com/api-docs#tag/Returns/paths/~1return/post
    *
    * @param string (JSON) $data
    * @return mixed
    **/
    public static function addReturnOrder($data) 
    {
        return self::requestHttp('POST', self::RETURN, $data);
    }

    /**
    * Cancel Return Order
    * https://developer.shipbob.com/api-docs#tag/Returns/paths/~1return~1{id}~1cancel/post
    *
    * @param integer $id
    * @return mixed
    **/
    public static function cancelReturnOrder($id) 
    {
        return self::requestHttp('POST', self::RETURN . '/' . $id . '/cancel');
    }
    
    /**
    * Cancel Return Order
    * https://developer.shipbob.com/api-docs#tag/Returns/paths/~1return~1{id}~1cancel/post
    *
    * @param integer $id
    * @return mixed
    **/
    public static function getReturnStatusHistory($id) 
    {
        return self::requestHttp('GET', self::RETURN . '/' . $id . '/statushistory');
    }

    /* FULFILLMENT CENTER */
    
    /**
    * Get Fulfillment Centers
    * https://developer.shipbob.com/api-docs#tag/Receiving/paths/~1fulfillmentCenter/get
    *
    * @return mixed
    **/
    public static function getFulFillmentCenter() 
    {
        return self::requestHttp('GET', self::FULFILLMENT_CENTER);
    }

    /* RECEIVING */

    /**
    * Get Warehouse Receiving Order
    * https://developer.shipbob.com/api-docs#tag/Receiving/paths/~1receiving~1{id}/get
    *
    * @param integer $id
    * @return mixed
    **/
    public static function getWarehouseReceivingOrder($id) 
    {
        return self::requestHttp('GET', self::RECEIVING . '/' . $id);
    }
    
    /**
    * Get Warehouse Receiving Order Box Labels
    * https://developer.shipbob.com/api-docs#tag/Receiving/paths/~1receiving~1{id}~1labels/get
    *
    * @param integer $id
    * @return mixed
    **/
    public static function getWarehouseReceivingOrderBoxLabels($id) 
    {
        return self::requestHttp('GET', self::RECEIVING . '/' . $id . '/labels');
    }
    
    /**
    * Get Warehouse Receiving Order Box Labels
    * https://developer.shipbob.com/api-docs#tag/Receiving/paths/~1receiving~1{id}~1labels/get
    *
    * @param string (JSON) $data
    * @return mixed
    **/
    public static function addWarehouseReceivingOrder($data) 
    {
        return self::requestHttp('POST', self::RECEIVING, $data);
    }
    
    /**
    * Cancel Warehouse Receiving Order
    * https://developer.shipbob.com/api-docs#tag/Receiving/paths/~1receiving~1{id}~1cancel/post
    *
    * @param integer $id
    * @return mixed
    **/
    public static function cancelWarehouseReceivingOrder($id) 
    {
        return self::requestHttp('POST', self::RECEIVING . '/' . $id . '/cancel');
    }

    /* WEBHOOKS */
    
    /**
    * Get Webhooks
    * https://developer.shipbob.com/api-docs#tag/Webhooks/paths/~1webhook/get
    *
    * @return mixed
    **/
    public static function getWebHooks() 
    {
        return self::requestHttp('GET', self::WEBHOOK);
    }
    
    /**
    * Create a new webhook subscription
    * https://developer.shipbob.com/api-docs#tag/Webhooks/paths/~1webhook/post
    *
    * @param string (JSON) $data
    * @return mixed
    **/
    public static function addWebHookSubscription($data) 
    {
        return self::requestHttp('POST', self::WEBHOOK, $data);
    }
    
    /**
    * Delete an existing webhook subscription
    * https://developer.shipbob.com/api-docs#tag/Webhooks/paths/~1webhook~1{id}/delete
    *
    * @param integer $id
    * @return mixed
    **/
    public static function deleteWebHookSubscription($id) 
    {
        return self::requestHttp(`DELETE`, self::WEBHOOK . '/' . $id);
    }

    /* LOCATIONS */
    /**
    * Delete an existing webhook subscription
    * https://developer.shipbob.com/api-docs#tag/Webhooks/paths/~1webhook~1{id}/delete
    *
    * @return mixed
    **/
    public static function getLocations() 
    {
        return self::requestHttp('GET', self::LOCATION);
    }

    /* HTTP REQUEST */

    /**
    * HTTP Request via Guzzle
    * https://docs.guzzlephp.org/en/stable/
    * https://laravel.com/docs/8.x/http-client#guzzle-options
    *
    * @param string $method
    * @param string $params
    * @param string (JSON) $body
    * @return mixed
    * default usage of GET method with params of get all orders and null body data
    **/
    private static function requestHttp($method = 'GET', $params = self::ORDER, $body = null)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . config('shipbob.private_access_token'),
            'shipbob_channel_id' => config('shipbob.channel_id'),
        ];

        $client = new GuzzleClient([
            'headers' => $headers
        ]);

        $r = $client->request($method, config('shipbob.api_url') . $params, [
            $body
        ]);

        $response = $r->getBody()->getContents();
        return json_decode($response, true);
    }
}