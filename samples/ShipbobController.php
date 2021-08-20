<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bryanjamesdelaluya\ShipbobLaravel\Shipbob;

/**
* Class ShipbobController
* @package App\Http\API\Controllers
* @author Bryan James Dela Luya
**/

class ShipbobController extends Controller
{
    /**
    * Sample API usage
    * https://developer.shipbob.com/api-docs/
    **/ 

    /* ORDERS */
    public function estimateFulfillment(Request $request) 
    {
        $raw_data = [
            'shipping_methods' => [
                'string'
            ],
            'address' => [
                'address1' => '100 Nowhere Blvd',
                'address2' => 'Suite 100',
                'company_name' => 'BJCDL',
                'city' => 'Gotham City',
                'state' => 'NJ',
                'country' => 'US',
                'zip_code' => '07093'
            ],
            'products' => [
                [
                    'id' => 0,
                    'reference_id' => 'TShirtBlueM',
                    'quantity' => 1
                ]
            ]
        ];

        $data = json_encode($raw_data);
        return Shipbob::estimateFulfillment($data);
    }

    public function getOrder($orderId) 
    {
        return Shipbob::getOrder($orderId);
    }

    public function fetchAllOrders() 
    {
        return Shipbob::getAllOrders();
    }

    public function createOrder(Request $request) 
    {
        $raw_data = [
            'shipping_method' => 'string',
            'recipient' => [
                'name' => 'John Doe',
                'address' => [
                    'address1' => '100 Nowhere Blvd',
                    'address2' => 'Suite 100',
                    'company_name' => 'BJCDL',
                    'city' => 'Gotham City',
                    'state' => 'NJ',
                    'country' => 'US',
                    'zip_code' => '07093'
                ],
                'email' => 'delaluya.bryanjames@gmail.com',
                'phone_number' => '000-000-0000'
            ],
            'products' => [
                [
                    'id' => 0,
                    'quantity' => 0
                ]
            ],
            'reference_id' => 'string',
            'order_number' => 'string',
            'type' => 'DTC',
            'tags' => [
                [
                    'name' => 'Handling Instructions',
                    'value' => 'Fragile'
                ]
            ],
            'purchase_date' => '2021-08-20T00:00:00Z',
            'location_id' => 0
        ];

        $data = json_encode($raw_data);
        return Shipbob::createOrder($data);
    }

    public function cancelOrder($orderId) 
    {
        return Shipbob::cancelOrder($orderId);
    }

    public function getOrderStoreJson($orderId) 
    {
        return Shipbob::getOrderStoreJson($orderId);
    }

    public function addOrderStoreJson($orderid, Request $request) 
    {
        return Shipbob::addOrderStoreJson($orderId, $request);
    }

    public function getShipmentByOrderId($orderid, $shipmentId) 
    {
        return Shipbob::getShipmentByOrderId($orderId, $shipmentId);
    }

    public function cancelShipmentByOrderId($shipmentId, $orderId) 
    {
        return Shipbob::cancelShipmentByOrderId($shipmentId, $orderId);
    }

    public function getShipmentStatusTimeline($orderId, $shipmentId) 
    {
        return Shipbob::getShipmentStatusTimeline($orderId, $shipmentId);
    }

    public function getAllShipmentsForOrder($orderId)
    {
        return Shipbob::getAllShipmentsForOrder($orderId);
    }

    public function getLogsForShipment($orderId, $shipmentId) 
    {
        return Shipbob::getLogsForShipment($orderId, $shipmentId);
    }

    /* SHIPMENT */
    public function getShipment($shipmentId) 
    {
        return Shipbob::getShipment($shipmentId);
    }
    
    public function cancelShipment($shipmentId) 
    {
        return Shipbob::cancelShipment($shipmentId);
    }

    public function cancelMultipleShipment(Request $request) 
    {
        $raw_data = [
            'shipment_ids' => [
                0
            ]
        ];

        $data = json_encode($raw_data);
        return Shipbob::cancelMultipleShipment($data);
    }

    public function getShipmentTimeline($shipmentId)
    {
        return Shipbob::getShipmentTimeline($shipmentId);
    }
    
    public function getShipmentLogs($shipmentId)
    {
        return Shipbob::getShipmentLogs($shipmentId);
    }

    public function getShippingMethods() 
    {
        return Shipbob::getShippingMethods();
    }

    /* PRODUCTS */
    public function fetchAllProducts() 
    {
        return Shipbob::getMultipleProducts();
    }

    public function addProduct(Request $request) 
    {
        $data = [
            'name' => '',
            'sku' => '',
            'barcode' => ''
        ];
        return Shipbob::addSingleProduct($data);
    }

    public function getProduct($productId) 
    {
        return Shipbob::getSingleProduct($productId);
    }

    public function editProduct(Request $request, $productId) 
    {
        $data = [
            'name' => '',
            'sku' => '',
            'barcode' => ''
        ];
        return Shipbob::editSingleProduct($data, $productId);
    }

    public function addMultipleProduct(Request $request) 
    {
        $raw_data = [
            [
                'reference_id' => "DNR_REF_1",
                'sku' => 'DNR_SKU_1',
                'name' => 'D&R Test 1',
                'barcode' => '20212008-001'
            ],
            [
                'reference_id' => "DNR_REF_2",
                'sku' => 'DNR_SKU_2',
                'name' => 'D&R Test 2',
                'barcode' => '20212008-002'
            ],
            [
                'reference_id' => "DNR_REF_3",
                'sku' => 'DNR_SKU_3',
                'name' => 'D&R Test 3',
                'barcode' => '20212008-003'
            ],
        ];

        $data = json_encode($raw_data);
        return Shipbob::addMultipleProduct($data);
    }

    /* INVENTORY */
    public function getInventory($inventoryId) 
    {
        return Shipbob::getInventory($inventoryId);
    }

    public function fetchAllInventory() 
    {
        return Shipbob::fetchAllInventory();
    }

    public function getInventoryByProductId($productId)
    {
        return Shipbob::getInventoryByProductId($productId);
    }

    /* CHANNEL */
    public function channel() 
    {
        return Shipbob::channel();
    }

    /* RETURN */
    public function getReturn($id)
    {
        return Shipbob::getReturn($id);
    }

    public function editReturnOrder($id, Request $request) 
    {
        $raw_data = [
            'fulfillment_center' => [
                'id' => 0,
                'name' => 'Cicero (IL)'
            ],
            'reference_id' => 'ShipBob_Return_123',
            'tracking_number' => '1Z9999999999999999',
            'inventory' => [
                [
                    'id' => 111222,
                    'quantity' => 1,
                    'requested_action' => 'Default'
                ]
            ]
        ];

        $data = json_encode($raw_data);
        return Shipbob::editReturnOrder($id, $data);
    }

    public function fetchReturnOrders() 
    {
        return Shipbob::fetchReturnOrders();
    }

    public function addReturnOrder(Request $request) 
    {
        $raw_data = [
            'fulfillment_center' => [
                'id' => 0,
                'name' => 'Cicero (IL)'
            ],
            'reference_id' => 'ShipBob_Return_123',
            'tracking_number' => '1Z9999999999999999',
            'inventory' => [
                [
                    'id' => 111222,
                    'quantity' => 1,
                    'requested_action' => 'Default'
                ]
            ]
        ];

        $data = json_encode($raw_data);
        return Shipbob::addReturnOrder($data);
    }

    public function cancelReturnOrder($id) 
    {
        return Shipbob::cancelReturnOrder($id);
    }

    public function getReturnStatusHistory($id) 
    {
        return Shipbob::getReturnStatusHistory($id);
    }

    /* FULFILLMENT CENTER */
    public function getFulFillmentCenter() 
    {
        return Shipbob::getFulFillmentCenter();
    }
    
    /* RECEIVING */
    public function getWarehouseReceivingOrder($id) 
    {
        return Shipbob::getWarehouseReceivingOrder($id);
    }

    public function getWarehouseReceivingOrderBoxLabels($id) 
    {
        return Shipbob::getWarehouseReceivingOrderBoxLabels($id);
    }

    public function addWarehouseReceivingOrder(Request $request)
    {
        $raw_data = [
            'fulfillment_center' => [
                'id' => 0,
            ],
            'package_type' => 'Package',
            'box_packaging_type' => 'EverythingInOneBox',
            'boxes' => [
                [
                    'tracking_number' => '860C8CDC8F0B4FC7AB69AC86C20539EC',
                    'box_items' => [
                        [                            
                            'quantity' => 1,
                            'inventory_id' => 0,
                            'lot_number' => 2222,
                            'lot_date' => '2021-08-20T00:00:00Z'
                        ]
                    ]
                ]
            ],
            'expected_arrival_date' => '2021-08-20T00:00:00Z'
        ];

        $data = json_encode($raw_data);
        return Shipbob::addWarehouseReceivingOrder($data);
    }

    public function cancelWarehouseReceivingOrder($id) 
    {
        return Shipbob::cancelWarehouseReceivingOrder($id);
    }

    /* WEBHOOKS */
    public function getWebHooks() 
    {
        return Shipbob::getWebHooks();
    }

    public function addWebHookSubscription(Request $request) 
    {
        $raw_data = [
            'topic' => 'order_shipped',
            'subscription_url' => '/handler'
        ];

        $data = json_encode($raw_data);
        return Shipbob::addWebHookSubscription($data);
    }

    public function deleteWebHookSubscription(Request $request) 
    {
        return Shipbob::deleteWebHookSubscription($id);
    }

    /* LOCATIONS */
    public function getLocations() 
    {
        return Shipbob::getLocations();
    }
}
