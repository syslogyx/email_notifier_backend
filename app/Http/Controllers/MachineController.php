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

    public function getAllMachines(Request $request)
    {
        $page = $request->page;
        $limit = $request->limit;
        if(($page == null|| $limit == null) || ($page == -1 || $limit == -1)){
            $machine = Machine::paginate(200);
        }
        else{
            $machine = Machine::paginate($limit);
        }

        if($machine && count($machine) > 0){
            foreach ($machine as $machine_entry ) {
                $machine_entry->device_data = $this->getDevices($machine_entry->id);
            }
        }

        if ($machine){
            return response()->json(['status_code' => 200, 'message' => 'Machine list', 'data' => $machine]);
        }else{
            return response()->json(['status_code' => 404, 'message' => 'Machine not found']);
        }
    }

    public function getDevices($machineID){
        $devices = Device::where("machine_id",$machineID)->where('status','=', 'ENGAGE')->get();
        return $devices;
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

          $machine=Machine::where('id',  $posted_data['machine_id'])->pluck('status')->first();

          if($machine=='ENGAGE'){
            return response()->json(['status_code' => 202, 'message' => 'Machine is assigned to user, first reset machine from user']);
          }

          $object = Machine::find($posted_data['id']);

          $oldDeviceList = $posted_data["old_device_list"];

          $newDeviceList = $posted_data["new_device_list"];

          if(isset($oldDeviceList) ){
              $oldDevice=array_diff($oldDeviceList, $newDeviceList);
              $newDevice=array_diff($newDeviceList,$oldDeviceList);
          }else{
              $oldDevice=[];
              $newDevice=$newDeviceList;
          }

          unset($posted_data["old_device_list"]);
          unset($posted_data["new_device_list"]);

          if ($object->validate($posted_data)) {
              $machine = Machine::where('id',$posted_data['id'])->update($posted_data);
              if($machine){
                  if(isset($oldDevice)){
                      foreach ($oldDevice as $key => $value) {
                        $this->resetDeviceById($value);
                      }
                  }

                  foreach ($newDevice as $key => $value) {
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
        $machine = Machine::where("id",$id)->first();

        // $machine["device_data"] = MachineDeviceAssoc::with('device')->where("machine_id",$id)->where('status','=', 'ENGAGE')->get();

        $machine["device_data"] = Device::where("machine_id",$id)->where('status','=', 'ENGAGE')->get();

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
                  $device = Device::where('id', $posted_data['device_id'])->where('status','<>', 'ENGAGE')->update(['status' =>'ENGAGE']);

                  $device = Device::where('id', $posted_data['device_id'])
                  ->update(['machine_id' =>$posted_data['machine_id']]);

                  if($device){
                      if($find=='' || $find['status']=='ENGAGE'){
                        $updateDevice = Device::where('id',  $find['device_id'])->update(['status' =>'NOT ENGAGE']);
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
        $device = Device::where('id',  $device_id)->update(['machine_id' =>null]);
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

    public function getAllAssignMachinesByUSerId($user_id)
    {
        $machine = Machine::where('user_id',$user_id)->get();

         if ($machine){
          return response()->json(['status_code' => 200, 'message' => 'Machine list', 'data' => $machine]);
        }else{
          return response()->json(['status_code' => 404, 'message' => 'Machine not found']);
        }
    }
}
