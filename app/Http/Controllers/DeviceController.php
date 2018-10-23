<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use DB;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Excel;
use Config;
use App\Status_Reason;
use App\MachineDeviceAssoc;
use App\Machine;

class DeviceController extends BaseController {
  public function createDevice() {
    $posted_data = Input::all();

    $object = new Device();
    if ($object->validate($posted_data)) {
      $posted_data['status']='NOT ENGAGE';
      $postd_data["machine_id"] ="";
      // return $posted_data;
      $device = Device::where("name",$posted_data['name'])->first();
      if($device){
        return response()->json(['status_code' => 201, 'message' => 'Device already created']);
      }else{
        if(!is_numeric($posted_data["port_1_0_reason"])){
          $data = [];
          $data["status"] = "port_1_0";
          $data["reason"] = $posted_data["port_1_0_reason"];
        
          $model1 = Status_Reason::create($data);
          $posted_data["port_1_0_reason"] = $model1->id;
        }
        if(!is_numeric($posted_data["port_1_1_reason"])){
          $data = [];
          $data["status"] = "port_1_1";
          $data["reason"] = $posted_data["port_1_1_reason"];
        
          $model2 = Status_Reason::create($data);
          $posted_data["port_1_1_reason"] = $model2->id;
        }
        if(!is_numeric($posted_data["port_2_0_reason"])){
          $data = [];
          $data["status"] = "port_2_0";
          $data["reason"] = $posted_data["port_2_0_reason"];
        
          $model3 = Status_Reason::create($data);
          $posted_data["port_2_0_reason"] = $model3->id;
        }
        if(!is_numeric($posted_data["port_2_1_reason"])){
          $data = [];
          $data["status"] = "port_2_1";
          $data["reason"] = $posted_data["port_2_1_reason"];
        
          $model4 = Status_Reason::create($data);
          $posted_data["port_2_1_reason"] = $model4->id;
        }
        
        $device = Device::create($posted_data);
        if($device){
          return response()->json(['status_code' => 200, 'message' => 'Device created successfully', 'data' => $device]);
        }
      }
    } else {
      throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to create device.', $object->errors());
    }
  }
  
  public function updateDevice() {
    $posted_data = Input::all();
 
    // $object = new Device();
    $object = Device::find($posted_data['id']);
    if ($object->validate($posted_data)) {

      if(!is_numeric($posted_data["port_1_0_reason"])){
        $data = [];
        $data["status"] = "port_1_0";
        $data["reason"] = $posted_data["port_1_0_reason"];
      
        $model1 = Status_Reason::create($data);
        $posted_data["port_1_0_reason"] = $model1->id;
      }
      if(!is_numeric($posted_data["port_1_1_reason"])){
        $data = [];
        $data["status"] = "port_1_1";
        $data["reason"] = $posted_data["port_1_1_reason"];
      
        $model2 = Status_Reason::create($data);
        $posted_data["port_1_1_reason"] = $model2->id;
      }
      if(!is_numeric($posted_data["port_2_0_reason"])){
        $data = [];
        $data["status"] = "port_2_0";
        $data["reason"] = $posted_data["port_2_0_reason"];
      
        $model3 = Status_Reason::create($data);
        $posted_data["port_2_0_reason"] = $model3->id;
      }
      if(!is_numeric($posted_data["port_2_1_reason"])){
        $data = [];
        $data["status"] = "port_2_1";
        $data["reason"] = $posted_data["port_2_1_reason"];
      
        $model4 = Status_Reason::create($data);
        $posted_data["port_2_1_reason"] = $model4->id;
      }

      $device = Device::where('id',$posted_data['id'])->update($posted_data);

      if($device){
        $res = Device::with('machineData')->find($posted_data['id']);
        return response()->json(['status_code' => 200, 'message' => 'Device updated successfully', 'data' => $res]);
      }else{
        return response()->json(['status_code' => 404, 'message' => 'Device not found']);
      }
    } else {

      throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to update device.', $object->errors());
    }
  }

  public function getDevices() {
    $device = Device::with('machineData')->where('status','NOT ENGAGE')->get();
    if ($device){
      return response()->json(['status_code' => 200, 'message' => 'Device list', 'data' => $device]);

    }else{
      return response()->json(['status_code' => 404, 'message' => 'Device not found']);
    }
  }

  public function getAllDevices() {
    $device = Device::with('machineData')->get();

    //   if($device && count($device) > 0){
    //       foreach ($device as $device_entry ) {

    //           $machine_data = MachineDeviceAssoc::where("device_id",$device_entry->id)->latest()->first();
    //           if($machine_data){

    //               if($machine_data->status =='ENGAGE'){

    //                     $machine['id'] = $machine_data->machine_id;

    //                     $machine['machine_name'] = Machine::where("id",$machine_data->machine_id)->pluck('name')->first();
    //               }
    //               else{
    //                     $machine = NULL;
    //               }

    //             $device_entry->machine = $machine;  
    //           }
    //           else{
    //              $device_entry->machine = NULL;
    //           }  
    //       }
    // }


    if ($device){
      return response()->json(['status_code' => 200, 'message' => 'Device list', 'data' => $device]);

    }else{
      return response()->json(['status_code' => 404, 'message' => 'Device not found']);
    }
  }

  public function getDeviceById($id) {
      $device = Device::with('status_reason_port_one_0','status_reason_port_one_1','status_reason_port_two_0','status_reason_port_two_1','machineData')->where("id",$id)->first();
      if ($device){
        return response()->json(['status_code' => 200, 'message' => 'Device info', 'data' => $device]);

      }else{
        return response()->json(['status_code' => 404, 'message' => 'Device not found']);
      }
  }

  public function importDevices(Request $request) {
    try {
      $path = $request->file('csv_file')->getRealPath();
      $datas = Excel::load($path, function($reader) {

      })->get()->toArray();

      $array = array();
      foreach($datas as $data) {
        if($data['device_id']!=null){
          unset($data["0"]);
          $status='NOT ENGAGE';
          $array[] =implode(', ', ['"' .$data['device_id'] .'"','"'.$status.'"']);
        }
      }
      if(count($array)>0){
        $array = Collection::make($array);
        $insertString = '';
        foreach ($array as $ch) {
          $insertString .= '(' . $ch . '), ';
        }
        $insertString = rtrim($insertString, ", ");
        $model =  DB::insert("INSERT INTO devices (`device_id`,`status`) VALUES $insertString ON DUPLICATE KEY UPDATE `device_id`=VALUES(`device_id`)");
        return response()->json(['status_code' => 200, 'message' => 'Device Imported successfully', 'data' => $model]);
      } else {
        throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to import empty file.');
      }
    } catch (\Exception $e) {
      throw new \Dingo\Api\Exception\StoreResourceFailedException('Data already entered/invalid data in file',[$e->getMessage()]);
    }
  }
}
