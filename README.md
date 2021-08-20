# shipbob-laravel
Laravel wrapper package for Shipbob API

## Installation
1. add this to .env
```
SB_API_URL=https://api.shipbob.com/1.0/
SB_PAT_TOKEN=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
SB_CHANNEL_ID=XXXXX
SB_APP_ID=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```
2. Run this to terminal
```
php artisan vendor:publish --provider="Bryanjamesdelaluya\ShipbobLaravel\ShipbobServiceProvider"
```

## Usage
- Sample code at app\Http\Controllers\API\ShipbobController.php

- Use this sample routes, add to routes\api.php

```
Route::prefix('shipbob')->group(function () {

    Route::prefix('orders')->group(function () {
        Route::post('/estimate_fulfillment', [
            'as' => 'shipbob.orders.estimate_fulfillment',
            'uses' => '\App\Http\Controllers\API\ShipbobController@estimateFulfillment']
        );

        Route::get('/get/{orderId}', [
            'as' => 'shipbob.orders.get',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getOrder']
        );

        Route::get('/all', [
            'as' => 'shipbob.orders.all',
            'uses' => '\App\Http\Controllers\API\ShipbobController@fetchAllOrders']
        );

        Route::post('/create_order', [
            'as' => 'shipbob.orders.create_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@createOrder']
        );

        Route::post('/cancel_order/{orderId}', [
            'as' => 'shipbob.orders.cancel_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@cancelOrder']
        );

        Route::get('/get_order_store_json/{orderId}', [
            'as' => 'shipbob.orders.get_order_store_json',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getOrderStoreJson']
        );

        Route::post('/save_order_store_json/{orderId}', [
            'as' => 'shipbob.orders.save_order_store_json',
            'uses' => '\App\Http\Controllers\API\ShipbobController@addOrderStoreJson']
        );

        Route::get('/get_shipment_by_order/{orderId}/{shipmentId}', [
            'as' => 'shipbob.orders.get_shipment_by_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getShipmentByOrderId']
        );

        Route::post('/cancel_shipment/{shipmentId}/{orderId}', [
            'as' => 'shipbob.orders.cancel_shipment',
            'uses' => '\App\Http\Controllers\API\ShipbobController@cancelShipmentByOrderId']
        );

        Route::get('/get_shipment_status_timeline/{orderId}/{shipmentId}', [
            'as' => 'shipbob.orders.get_shipment_status_timeline',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getShipmentStatusTimeline']
        );

        Route::get('/get_all_shipments_for_order/{orderId}', [
            'as' => 'shipbob.orders.get_all_shipments_for_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getAllShipmentsForOrder']
        );

        Route::get('/get_logs_for_shipment/{orderId}/{shipmentId}', [
            'as' => 'shipbob.orders.get_logs_for_shipment',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getLogsForShipment']
        );
    });

    Route::prefix('shipment')->group(function () {
        Route::get('/get/{shipmentId}', [
            'as' => 'shipbob.shipment.get',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getShipment']
        );

        Route::get('/cancel/{shipmentId}', [
            'as' => 'shipbob.shipment.cancel',
            'uses' => '\App\Http\Controllers\API\ShipbobController@cancelShipment']
        );

        Route::post('/cancel_multiple/{shipmentId}', [
            'as' => 'shipbob.shipment.cancel_multiple',
            'uses' => '\App\Http\Controllers\API\ShipbobController@cancelMultipleShipment']
        );

        Route::get('/get_shipment_timeline/{shipmentId}', [
            'as' => 'shipbob.shipment.get_shipment_timeline',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getShipmentTimeline']
        );

        Route::get('/get_shipment_logs/{shipmentId}', [
            'as' => 'shipbob.shipment.get_shipment_logs',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getShipmentLogs']
        );

        Route::get('/get_shipping_methods', [
            'as' => 'shipbob.shipment.get_shipping_methods',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getShippingMethods']
        );
    });

    Route::prefix('products')->group(function () {
        Route::get('/all', [
            'as' => 'shipbob.products.all',
            'uses' => '\App\Http\Controllers\API\ShipbobController@fetchAllProducts']
        );

        Route::post('/add', [
            'as' => 'shipbob.products.add',
            'uses' => '\App\Http\Controllers\API\ShipbobController@addProduct']
        );

        Route::get('/get/{productId}', [
            'as' => 'shipbob.products.get',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getProduct']
        );

        Route::put('/edit/{productId}', [
            'as' => 'shipbob.products.edit',
            'uses' => '\App\Http\Controllers\API\ShipbobController@editProduct']
        );

        Route::post('/add_multiple', [
            'as' => 'shipbob.products.add_multiple',
            'uses' => '\App\Http\Controllers\API\ShipbobController@addMultipleProduct']
        );
    });

    Route::prefix('inventory')->group(function () {
        Route::get('/get/{inventoryId}', [
            'as' => 'shipbob.inventory.get',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getInventory']
        );

        Route::get('/all', [
            'as' => 'shipbob.inventory.all',
            'uses' => '\App\Http\Controllers\API\ShipbobController@fetchAllInventory']
        );

        Route::get('/get_by_product_id/{productId}', [
            'as' => 'shipbob.inventory.get_by_product_id',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getInventoryByProductId']
        );
    });

    Route::prefix('channel')->group(function () {
        Route::get('/', [
            'as' => 'shipbob.channel.request',
            'uses' => '\App\Http\Controllers\API\ShipbobController@channel']
        );
    });

    Route::prefix('return')->group(function () {
        Route::get('/get/{id}', [
            'as' => 'shipbob.return.get',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getReturn']
        );

        Route::put('/edit/{id}', [
            'as' => 'shipbob.return.edit',
            'uses' => '\App\Http\Controllers\API\ShipbobController@editReturnOrder']
        );

        Route::get('/all', [
            'as' => 'shipbob.return.all',
            'uses' => '\App\Http\Controllers\API\ShipbobController@fetchReturnOrders']
        );

        Route::post('/create_return_order', [
            'as' => 'shipbob.return.add',
            'uses' => '\App\Http\Controllers\API\ShipbobController@addReturnOrder']
        );

        Route::post('/cancel_order/{id}', [
            'as' => 'shipbob.return.cancel',
            'uses' => '\App\Http\Controllers\API\ShipbobController@cancelReturnOrder']
        );

        Route::get('/status_history/{id}', [
            'as' => 'shipbob.return.status_history',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getReturnStatusHistory']
        );
    });

    Route::prefix('fulfillment_center')->group(function () {
        Route::get('/', [
            'as' => 'shipbob.channel.fulfillment_center',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getFulFillmentCenter']
        );
    });

    Route::prefix('receiving')->group(function () {
        Route::get('/get_warehouse_receiving_order/{id}', [
            'as' => 'shipbob.channel.get_warehouse_receiving_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getWarehouseReceivingOrder']
        );

        Route::get('/get_warehouse_receiving_box_labels/{id}', [
            'as' => 'shipbob.channel.get_warehouse_receiving_box_labels',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getWarehouseReceivingOrderBoxLabels']
        );

        Route::post('/create_warehouse_receiving_order', [
            'as' => 'shipbob.channel.create_warehouse_receiving_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@addWarehouseReceivingOrder']
        );

        Route::post('/cancel_warehouse_receiving_order/{id}', [
            'as' => 'shipbob.channel.cancel_warehouse_receiving_order',
            'uses' => '\App\Http\Controllers\API\ShipbobController@cancelWarehouseReceivingOrder']
        );
    });

    Route::prefix('webhook')->group(function () {
        Route::get('/', [
            'as' => 'shipbob.channel.get_webhooks',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getWebHooks']
        );

        Route::post('/create_subscription', [
            'as' => 'shipbob.channel.create_subscription',
            'uses' => '\App\Http\Controllers\API\ShipbobController@addWebHookSubscription']
        );

        Route::post('/delete_subscription', [
            'as' => 'shipbob.channel.delete_subscription',
            'uses' => '\App\Http\Controllers\API\ShipbobController@deleteWebHookSubscription']
        );
    });

    Route::prefix('location')->group(function () {
        Route::get('/', [
            'as' => 'shipbob.channel.get_locations',
            'uses' => '\App\Http\Controllers\API\ShipbobController@getLocations']
        );
    });
});
```

## Author
- Bryan James Dela Luya