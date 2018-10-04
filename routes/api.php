    <?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



$api = app("Dingo\Api\Routing\Router");


$api->version("v1", function($api) {
    // user's api
    $api->post("create/user", "App\Http\Controllers\UserController@createUser");
    $api->put("update/user", "App\Http\Controllers\UserController@updateUser");
    $api->get("get/users", "App\Http\Controllers\UserController@getUsers");
    $api->get("get/usersnew", "App\Http\Controllers\UserController@getUsersNew");
    $api->get("get/user/{id}", "App\Http\Controllers\UserController@getUserById");
    $api->post("login", "App\Http\Controllers\Auth\AuthController@authenticate");
    $api->post("import/users", "App\Http\Controllers\UserController@importUsers");

    // device's api
    $api->post("create/device", "App\Http\Controllers\DeviceController@createDevice");
    $api->put("update/device", "App\Http\Controllers\DeviceController@updateDevice");
    $api->get("get/devices", "App\Http\Controllers\DeviceController@getDevices");
    $api->get("get/all/devices", "App\Http\Controllers\DeviceController@getAllDevices");
    $api->get("get/device/{id}", "App\Http\Controllers\DeviceController@getDeviceById");
    $api->post("import/devices", "App\Http\Controllers\DeviceController@importDevices");

    // reasons API

    $api->post("add/reason", "App\Http\Controllers\StatusReasonController@addReason");
    $api->put("update/reason", "App\Http\Controllers\StatusReasonController@updateReason");
    $api->get("get/reasons", "App\Http\Controllers\StatusReasonController@getReasons");

    // role related api
    $api->get("get/roles", "App\Http\Controllers\RoleController@getRoles");







});

$api->version("v1", ['middleware' => 'api.auth'], function($api) {

});
