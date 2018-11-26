<?php

namespace App\Http\Controllers;

use App\MachineStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Device;
use App\UserEstimation;
use PDF;
use DateTime;

class MachineStatusController extends BaseController
{
    public function GetDevicePortStatus($machineId){
        try{

            $deviceIds = Device::where('machine_id',$machineId)->pluck('id');
            // return $deviceIds;
            $machineStatusData = MachineStatus::with('device','machine')->where('machine_id',$machineId)->whereIn('device_id', $deviceIds)->orderBy('created_at','asc')->get()->last();
            // $machineStatusData = collect($machineStatusData1)->last();
             // return $machineStatusData;

            if($machineStatusData){

                $estimationRecord = UserEstimation::where('machine_status_id',$machineStatusData['id'])->latest()->first();
             
                if ($machineStatusData['status'] == '0'){
                    if(!$estimationRecord){
                        $machineStatusData['flag'] = 'True';
                        return response()->json(['status_code' => 200, 'message' => 'Machine Status list', 'data' => $machineStatusData]);
                    }
                    else{
                        $machineStatusData['flag'] = 'False';
                        return response()->json(['status_code' => 200, 'message' => 'Machine Status list', 'data' => $machineStatusData]);
                    }
                }else{
                    $machineStatusData['flag'] = 'False';
                    return response()->json(['status_code' => 200, 'message' => 'Machine Status list', 'data' => $machineStatusData]);
                 }
            }else{
                return response()->json(['status_code' => 404, 'message' => 'Record Not Found']);
            }         
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }

    }

    public function filterOnMachineStatus(Request $request){
        $page = $request->page;
        $limit = $request->limit;
        $posted_data = Input::all();
        $query = MachineStatus::with('userEstimation.reasonData','machine')->where('status','0');
        if (Input::get() == "" || Input::get() == null) {
            $query->get();
        }

        if(isset($posted_data['user_id'])){
            $userId=$posted_data['user_id'];
            $query = MachineStatus::with(array('userEstimation'=>function($que) use ($userId){
                $que->with('reasonData')->where('user_id',$userId)->get();
            }))->with(array('machine'=>function($que) use ($userId){
                $que->where('user_id',$userId)->get();
            }))->where('status','0');
        }

        if (Input::get("machine_id")) {
            $query->where("machine_id", Input::get("machine_id"));
        }

        if (Input::get("from_date")) {
            $query->where(DB::raw('CAST(created_at as date)'), '>=', Input::get("from_date"));
        }

        if (Input::get("to_date")) {

          $query->where(DB::raw('CAST(created_at as date)'), '<=', Input::get("to_date"));
        }

        // if (Input::get("from_date") && Input::get("to_date")) {
        //     $query->where("created_at", ">=", Input::get("from_date"))
        //             ->where("created_at", "<=", Input::get("to_date"));
        // }

        if (($page != null && $page != 0) && ($limit != null && $limit != 0)) {
            $machineStatus = $query->paginate($limit);
        } else {
            $machineStatus = $query->paginate(50);
        }

        if ($machineStatus->first()){
          return response()->json(['status_code' => 200, 'message' => 'Machine status list', 'data' => $machineStatus]);
        }else{
          return response()->json(['status_code' => 404, 'message' => 'Record not found']);
        }
    }

    function generatePdf(Request $request) {
        $data =$request->req;
        $data1 = base64_decode($data);
        $posted_data = [$data1];
        $posted_data= (array) json_decode($posted_data[0]);

        $query = MachineStatus::with('userEstimation.reasonData','machine')->where('status','0');

        if(isset($posted_data['user_id'])){
            $userId=$posted_data['user_id'];
            $query = MachineStatus::with(array('userEstimation'=>function($que) use ($userId){
                $que->with('reasonData')->where('user_id',$userId)->get();
            }))->with(array('machine'=>function($que) use ($userId){
                $que->where('user_id',$userId)->get();
            }))->where('status','0');
        }

        if (isset($posted_data["machine_id"])) {
            $query->where("machine_id", $posted_data["machine_id"]);
        }

        if (isset($posted_data["from_date"])) {
            $query->where(DB::raw('CAST(created_at as date)'), '>=', $posted_data["from_date"]);
        }

        if (isset($posted_data["to_date"])) {

          $query->where(DB::raw('CAST(created_at as date)'), '<=', $posted_data["to_date"]);
        }

        $machineStatus = $query->get();
        

        // if ($machineStatus){
        //   return response()->json(['status_code' => 200, 'message' => 'Machine status list', 'data' => $machineStatus]);
        // }else{
        //   return response()->json(['status_code' => 404, 'message' => 'Record not found']);
        // }

        $machineStatus = $this->calculateActualHourForEachMachine($machineStatus);

        view()->share('data', $machineStatus);

        $pdf = PDF::loadView('report/pdfview');

        return $pdf->download('Report.pdf');
    }

    public function calculateActualHourForEachMachine($machineStatus){
        for($i = 0; $i < count($machineStatus); $i++) {
            if($machineStatus[$i]['on_time'] != null){
                
                $date1 = new DateTime($machineStatus[$i]['on_time']);
                $date = new DateTime($machineStatus[$i]['created_at']);

                $totalSecondsDiff = $date1->getTimestamp() - $date->getTimestamp();
                $machineStatus[$i]['total_actual_second'] =  $totalSecondsDiff;

                $machineStatus[$i]['actual_hour'] = gmdate("H:i:s", $machineStatus[$i]['total_actual_second']);
                 
            }else{
                $machineStatus[$i]['actual_hour'] = null;
            }
        }
        return  $machineStatus;
    }

}
