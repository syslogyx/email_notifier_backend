<?php

namespace App\Http\Controllers;

use App\UserEstimation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\MachineStatus;
use App\Device;


class UserEstimationController extends Controller
{
    public function create()
    {
        try{

            DB::beginTransaction();
            $posted_data = Input::all();

            $object = new UserEstimation();

            $machineStatus = MachineStatus::where("id",$posted_data['machine_status_id'])->first();

            if ($machineStatus){

                $previousRecord = UserEstimation::where('machine_status_id',$posted_data['machine_status_id'])->latest()->first();
 
                if(!$previousRecord){

                    //$newMachineStatusData = MachineStatus::with('device')->where('device_id',$machineStatus['device_id'])->where('port',$machineStatus['port'])->latest()->first();
                    $newMachineStatusData = MachineStatus::with('device','machine')->where('machine_id',$machineStatus['machine_id'])->where('device_id',$machineStatus['device_id'])->get()->last();
                    
                    
                    $machineStatuscolm =$newMachineStatusData['port'].'_'.$newMachineStatusData['status'].'_status';
             
                    $machineStatus= $newMachineStatusData['device'][$machineStatuscolm];
                    // return $machineStatus;

                    if($machineStatus == 'OFF'){

                        $reason_column =$newMachineStatusData['port'].'_'.$newMachineStatusData['status'].'_reason';

                        $statusReasonID = Device::where("id",$newMachineStatusData['device_id'])->pluck($reason_column)->first();

                        $posted_data['reason'] = $statusReasonID;

                        $posted_data['machine_status_id'] = $newMachineStatusData['id'];

                        if ($object->validate($posted_data)) {

                            $model = UserEstimation::create($posted_data);
                        
                            if($model){

                              DB::commit();          
                              return response()->json(['status_code' => 200, 'message' => 'User estimation added successfully', 'data' => $model]);
                            }
                        } else {
                          throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to add user estimation.', $object->errors());
                        }
                    }else{
                        return response()->json(['status_code' => 201, 'message' => 'Machine is ON now.']);
                    }

                }else{
                    return response()->json(['status_code' => 201, 'message' => 'User estimation record already found']);
                } 
            } else {
              return response()->json(['status_code' => 401, 'message' => 'machine status record not found']);
            }
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

}
