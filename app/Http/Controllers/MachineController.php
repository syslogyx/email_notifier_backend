<?php

namespace App\Http\Controllers;

use App\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Device;
use App\MachineDeviceAssoc;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMachines()
    {
        $machine = Machine::where('status','NOT ENGAGE')->get();
        if ($machine){
          return response()->json(['status_code' => 200, 'message' => 'Machine list', 'data' => $machine]);
        }else{
          return response()->json(['status_code' => 404, 'message' => 'Machine not found']);
        }
    }

    public function getAllMachines()
    {
        $machine = Machine::get();
        if ($machine){
          return response()->json(['status_code' => 200, 'message' => 'Machine list', 'data' => $machine]);
        }else{
          return response()->json(['status_code' => 404, 'message' => 'Machine not found']);
        }
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function createMachine()
    {
      try{
        DB::beginTransaction();
        $posted_data = Input::all();

        $object = new Machine();
        $deviceList = $posted_data["device_list"];
        unset($posted_data["device_list"]);
        if ($object->validate($posted_data)) {
          $posted_data['status']='NOT ENGAGE';
          $machine = Machine::where("name",$posted_data['name'])->first();
          if($machine){
            return response()->json(['status_code' => 201, 'message' => 'Machine already created']);
          }else{
            $model = Machine::create($posted_data);
            if($model){
              foreach ($deviceList as $key => $value) {
                $data = [];
                $data["machine_id"] = $model->id;
                $data["device_id"] = $value;
                $res = $this->assignDeviceToMachine($data);
                if(!isset($res->id)){
                  return $res;
                }
              }
              DB::commit();          
              return response()->json(['status_code' => 200, 'message' => 'Machine created successfully', 'data' => $model]);
            }
          }
        } else {
          throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to create machine.', $object->errors());
        }
      }
      catch(\Exception $e){
        DB::rollback();
        throw $e;
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function updateMachine()
    {
      try{
        DB::beginTransaction();
        $posted_data = Input::all();

        $object = new Machine();
        $oldDeviceList = $posted_data["old_device_list"];
        unset($posted_data["old_device_list"]);
        $newDeviceList = $posted_data["new_device_list"];
        unset($posted_data["new_device_list"]);

        if ($object->validate($posted_data)) {
            $machine = Machine::where('id',$posted_data['id'])->update($posted_data);
            if($machine){
              foreach ($oldDeviceList as $key => $value) {
                $this->resetDeviceById($value);
              }
              foreach ($newDeviceList as $key => $value) {
                $data = [];
                $data["machine_id"] = $posted_data['id'];
                $data["device_id"] = $value;
                $result = $this->assignDeviceToMachine($data);
                if(!isset($result->id)){
                  return $result;
                }
              }
              
              $res = Machine::find($posted_data['id']);
              DB::commit();   
              return response()->json(['status_code' => 200, 'message' => 'Machine updated successfully', 'data' => $res]);
            }else{
              return response()->json(['status_code' => 404, 'message' => 'Machine not found']);
            }
        } else {
          throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to update machine.', $object->errors());
        }
      }
      catch(\Exception $e){
        DB::rollback();
        throw $e;
      }
    }

    public function getMachineById($id)
    {
        $machine = Machine::with("devices")->where("id",$id)->first();
        if ($machine){
            return response()->json(['status_code' => 200, 'message' => 'Machine info', 'data' => $machine]);

        }else{
            return response()->json(['status_code' => 404, 'message' => 'Machine not found']);
        }
    }

    public function assignDeviceToMachine($data) {
      try{
        DB::beginTransaction();
        $posted_data = $data;

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
              return $model;
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

    public function resetDeviceById($device_id) {
      $device = Device::where('id',  $device_id)->update(['status' =>'NOT ENGAGE']);
      $data = MachineDeviceAssoc::where("device_id",$device_id)->latest()->first();
      if ($device){
        $posted_data['machine_id']=$data['machine_id'];
        $posted_data['device_id']=$data['device_id'];
        $posted_data['status']='NOT ENGAGE';

        $model = MachineDeviceAssoc::create($posted_data);
        return response()->json(['status_code' => 200, 'message' => 'Device reset successfully', 'data' => $device]);
      }else{
        return response()->json(['status_code' => 404, 'message' => 'Device unable to reset.']);
      }
    }
}
