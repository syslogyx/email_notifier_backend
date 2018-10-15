<?php

namespace App\Http\Controllers;

use App\User_Machine_Assoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Machine;
use App\User;

class UserMachineAssocController extends Controller
{
    public function assignUserToMachine() {
        try{
            DB::beginTransaction();
            $posted_data = Input::all();

            $object = new User_Machine_Assoc();

            $find = Machine::where('id',$posted_data['machine_id'])->first();

            if ($object->validate($posted_data)) {
                $posted_data['status']='ENGAGE';
                $model = User_Machine_Assoc::create($posted_data);
                if ($model){
                    $device = Machine::where('id', $posted_data['machine_id'])->where('status','<>', 'ENGAGE')->update(['status' =>'ENGAGE']);
                    if($device){
                        if($find=='' || $find['status']=='ENGAGE'){
                            $updateDevice = Machine::where('id',  $find['machine_id'])->update(['status' =>'NOT ENGAGE']);
                        }
                        DB::commit();
                        return response()->json(['status_code' => 200, 'message' => 'Asssign successfully', 'data' => $model]);
                    }else {
                        return response()->json(['status_code' => 404, 'message' => 'Machine already engage.']);
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
/*
    public function getMachineIdByUserId($id) {
        $userId=User::where("id",$id)->pluck('id')->first();

        if($userId){
            $machine['machine_id'] = User_Machine_Assoc::where("user_id",$userId)->where('status','=', 'ENGAGE')->latest()->pluck('machine_id')->first();
            $machine['machine_name'] = Machine::where("id",$machine['machine_id'])->pluck('name')->first();
            $machine['status'] = Machine::where("id",$machine['machine_id'])->pluck('status')->first();
            
            if($machine['machine_id']!=null){
                return response()->json(['status_code' => 200, 'message' => 'Machine info', 'data' => $machine]);
            }else{
                return response()->json(['status_code' => 404, 'message' => 'Record not found']);
            }
        }else{
            return response()->json(['status_code' => 404, 'message' => 'Record not found']);
        }
    }
    */

    public function getMachineIdByUserId($id) {
        $user=User_Machine_Assoc::where("user_id",$id)->latest()->first();
        
        if($user && $user['status'] == 'ENGAGE'){
            
            $user['machine_name'] = Machine::where("id",$user['machine_id'])->pluck('name')->first();
            $user['status'] = Machine::where("id",$user['machine_id'])->pluck('status')->first();
            
            if($user['machine_id']!=null){
                return response()->json(['status_code' => 200, 'message' => 'Machine info', 'data' => $user]);
            }else{
                return response()->json(['status_code' => 404, 'message' => 'Record not found']);
            }
        }else{
            return response()->json(['status_code' => 404, 'message' => 'Record not found']);
        }
    }

    public function getUserIdByMachineId($id) {
        $device = User_Machine_Assoc::where("machine_id",$id)->where('status','=', 'ENGAGE')->latest()->first();
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

    public function resetMachineById($id) {
        $machine = Machine::where('id', $id)->update(['status' =>'NOT ENGAGE']);

        $data = User_Machine_Assoc::where("machine_id",$id)->where("status","ENGAGE")->latest()->first();

        if ($machine && $data){
            $posted_data['machine_id']=$data['machine_id'];
            $posted_data['user_id']=$data['user_id'];
            $posted_data['status']='NOT ENGAGE';

            $model = User_Machine_Assoc::create($posted_data);
            return response()->json(['status_code' => 200, 'message' => 'Machine reset successfully', 'data' => $machine]);
        }else{
            return response()->json(['status_code' => 404, 'message' => 'Machine unable to reset.']);
        }
    }

    public function resetMachineByUserId($id) {
        
        $data = User_Machine_Assoc::where("user_id",$id)->where("status","ENGAGE")->latest()->first();

        if($data){
            $machine = Machine::where('id', $data['machine_id'])->where("status","ENGAGE")->first();
            
            if ($machine){
                $posted_data['machine_id']=$data['machine_id'];
                $posted_data['user_id']=$data['user_id'];
                $posted_data['status']='NOT ENGAGE';

                $machine->status = 'NOT ENGAGE';
                $machine->update();

                $model = User_Machine_Assoc::create($posted_data);
                return response()->json(['status_code' => 200, 'message' => 'Machine reset successfully', 'data' => $machine]);
            }else{
                return response()->json(['status_code' => 404, 'message' => 'Machine unable to reset.']);
            }
        }else{
            return response()->json(['status_code' => 404, 'message' => 'Machine unable to reset.']);
        }
    }
}
