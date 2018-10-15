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

    // machine's api
    $api->post("create/machine", "App\Http\Controllers\MachineController@createMachine");
    $api->put("update/machine", "App\Http\Controllers\MachineController@updateMachine");
    $api->get("get/machines", "App\Http\Controllers\MachineController@getMachines");
    $api->get("get/allMachines", "App\Http\Controllers\MachineController@getAllMachines");
    $api->get("get/machine/{id}", "App\Http\Controllers\MachineController@getMachineById");  

    // machine and device assoc api
    $api->post("assign/deviceToMachine", "App\Http\Controllers\MachineDeviceAssocController@assignDeviceToMachine");
    $api->get("get/machineIdByDeviceId/{id}", "App\Http\Controllers\MachineDeviceAssocController@getMachineIdByDeviceId");
    $api->get("get/deviceIdByMachineId/{id}", "App\Http\Controllers\MachineDeviceAssocController@getDeviceIdByMachineId");
    $api->get("reset/deviceById/{id}", "App\Http\Controllers\MachineDeviceAssocController@resetDeviceById");
    $api->get("reset/devicesByMachineId/{id}", "App\Http\Controllers\MachineDeviceAssocController@resetDevicesByMachineId");

    // user and machine assoc api
    $api->post("assign/userToMachine", "App\Http\Controllers\UserMachineAssocController@assignUserToMachine");
    $api->get("get/machineIdByUserId/{id}", "App\Http\Controllers\UserMachineAssocController@getMachineIdByUserId");
    $api->get("get/userIdByMachineId/{id}", "App\Http\Controllers\UserMachineAssocController@getUserIdByMachineId");
    $api->get("reset/machineById/{id}", "App\Http\Controllers\UserMachineAssocController@resetMachineById");
    $api->get("reset/machineByUserId/{id}", "App\Http\Controllers\UserMachineAssocController@resetMachineByUserId");

});

$api->version("v1", ['middleware' => 'api.auth'], function($api) {

});
