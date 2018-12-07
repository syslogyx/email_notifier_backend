<?php

namespace App\Http\Controllers;

use App\MachineDeviceAssoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Device;
use App\Machine;

class MachineDeviceAssocController extends Controller
{
  public function assignDeviceToMachine() {
    try{
      DB::beginTransaction();
      $posted_data = Input::all();

      $object = new MachineDeviceAssoc();

      $find= Device::where('id',$posted_data['device_id'])->first();

      if ($object->validate($posted_data)) {
        $posted_data['status']='ENGAGE';
        $model = MachineDeviceAssoc::create($posted_data);
        if ($model){
          $device = Device::where('id', $posted_data['device_id'])->where('status','<>', 'ENGAGE')
            ->update(['status' =>'ENGAGE']);
          if($device){
            if($find=='' || $find['status']=='ENGAGE'){
              $updateDevice = Device::where('id',  $find['device_id'])
                  ->update(['status' =>'NOT ENGAGE']);
            }
            DB::commit();
            return response()->json(['status_code' => 200, 'message' => 'Asssign successfully', 'data' => $model]);
          }else {
            return response()->json(['status_code' => 404, 'message' => 'Device already engage.']);
          }
        }else{
          return response()->json(['status_code' => 404, 'message' => 'Unable to assign']);
        }
      } else {
        throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to assign.', $object->errors());
      }
    }
    catch(\Exception $e){
      DB::rollback();
      throw $e;
    }
  }

  public function getMachineIdByDeviceId($id) {
    $deviceId=Device::where("id",$id)->where('status','=', 'ENGAGE')->pluck('id')->first();
    if($deviceId){
      $machine['machine_id'] = MachineDeviceAssoc::where("device_id",$deviceId)->latest()->pluck('machine_id')->first();
      if($machine['machine_id']!=null){
        return response()->json(['status_code' => 200, 'message' => 'Machine info', 'data' => $machine]);
      }else{
        return response()->json(['status_code' => 404, 'message' => 'Record not found']);
      }
    }else{
      return response()->json(['status_code' => 404, 'message' => 'Record not found']);
    }
  }

  public function getDeviceIdByMachineId($id) {
    $device = MachineDeviceAssoc::where("machine_id",$id)->where('status','=', 'ENGAGE')->latest()->first();
    if ($device){
      $deviceId=Device::where("id",$device['device_id'])->where('status','=', 'ENGAGE')->pluck('id')->first();
      if($deviceId){
        return response()->json(['status_code' => 200, 'message' => 'Device info', 'data' => $device]);
      }else{
        return response()->json(['status_code' => 404, 'message' => 'Record not found']);
      }

    }else{
      return response()->json(['status_code' => 404, 'message' => 'Record not found']);
    }
  }

  public function resetDeviceById($id) {


    $data = MachineDeviceAssoc::where("device_id",$id)->latest()->first();

    $machine=Machine::where('id',  $data['machine_id'])->first();

    if($machine['status']=='ENGAGE'){
      $user==User::where('id',  $machine['user_id'])->pluck('name')->first();
      return response()->json(['status_code' => 202, 'message' => $machine['name'].' is assigned to '.$user.', first reset machine from '.$user]);
    }



    $device = Device::where('id',  $id)->update(['status' =>'NOT ENGAGE']);
    $device = Device::where('id',  $id)->update(['machine_id' =>null]);
     // $device = Device::where('id',  $device_id)->update(['machine_id' =>null]);

    if ($device){

      $posted_data['machine_id']=$data['machine_id'];
      $posted_data['device_id']=$data['device_id'];
      $posted_data['status']='NOT ENGAGE';

      $device = Device::where('id',  $id)->get();
      $model = MachineDeviceAssoc::create($posted_data);
      return response()->json(['status_code' => 200, 'message' => 'Device reset successfully', 'data' => $device]);
    }else{
      return response()->json(['status_code' => 404, 'message' => 'Device unable to reset.']);
    }
  }

  public function resetDevicesByMachineId($id){
      $devices = Device::where('machine_id',$id)->where('status','ENGAGE')->get();
      $machine=Machine::where('id',  $id)->first();

      if($machine['status']=='ENGAGE'){
        $user==User::where('id',  $machine['user_id'])->pluck('name')->first();
        return response()->json(['status_code' => 202, 'message' => $machine['name'].' is assigned to '.$user.', first reset machine from '.$user]);
      }

      if($devices && count($devices) > 0){
          foreach ($devices as $device) {
            $this->resetDeviceById($device['id']);
          }
          return response()->json(['status_code' => 200, 'message' => 'Device reset successfully']);
      }else{
          return response()->json(['status_code' => 404, 'message' => 'Device unable to reset.']);
      }
  }

}
