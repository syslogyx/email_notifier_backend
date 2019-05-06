<?php

namespace App\Http\Controllers;

use App\UserEstimation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\MachineStatus;
use App\Device;
use App\User;
use Illuminate\Support\Facades\Mail;
use Bogardo\Mailgun\MailgunServiceProvider;


class UserEstimationController extends Controller
{
    /**
    * API to add user given estimation to OFF machine
    */
    public function create(){
        try{

            DB::beginTransaction();
            $posted_data = Input::all();

            $object = new UserEstimation();

            $machineStatus = MachineStatus::where("id",$posted_data['machine_status_id'])->first();

            if ($machineStatus){

                $previousRecord = UserEstimation::where('machine_status_id',$posted_data['machine_status_id'])->latest()->first();
 
                if(!$previousRecord){

                    $newMachineStatusData = MachineStatus::with('device','machine')->where('machine_id',$machineStatus['machine_id'])->where('device_id',$machineStatus['device_id'])->get()->last();
                    
                    
                    $machineStatuscolm =$newMachineStatusData['port'].'_'.$newMachineStatusData['status'].'_status';
             
                    $machineStatus= $newMachineStatusData['device'][$machineStatuscolm];

                    if($machineStatus == 'OFF'){

                        $reason_column =$newMachineStatusData['port'].'_'.$newMachineStatusData['status'].'_reason';

                        // $statusReasonID = Device::where("id",$newMachineStatusData['device_id'])->pluck($reason_column)->first();

                        $statusReason = Device::with('machineData.user')->where("id",$newMachineStatusData['device_id'])->first();
                        
                        $estimationUserEmail = User:: where('id',$posted_data['user_id'])->pluck('email')->first();

                        $posted_data['reason'] = $statusReason[$reason_column];

                        $posted_data['machine_status_id'] = $newMachineStatusData['id'];

                        if ($object->validate($posted_data)) {

                            $model = UserEstimation::create($posted_data);

                            $estTime = explode(":",$posted_data['hour']);

                            $data =[];
                            $data['user_name'] = $statusReason['machineData']['user']['name'];
                            $data['machine_name'] = $statusReason['machineData']['name'];
                            $data['email_ids'] = $statusReason['machineData']['email_ids'].','.$estimationUserEmail;
                            $data['estimation_hr'] = $estTime[0];
                            $data['estimation_min'] = $estTime[1];

                            $this->sendMailToUsers($data);
                        
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
                    return response()->json(['status_code' => 202, 'message' => 'User estimation record already found']);
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

    /**
    * Function to send estimation email of OFF machine
    */
    function sendMailToUsers($model) {
        config(['mail.username' => 'admsyslogyx@gmail.com',
                'mail.password' => 'ealert123#']);
        
        $email = explode(',', $model['email_ids']);
       
        $subjectMsg = '[Estimation of Machine-'.$model['machine_name'].' by '.$model['user_name'].']';

        Mail::send('email.estimation_email_template', $model, function($message) use ($email,$subjectMsg) {        
            $message->to($email);
            $message->subject($subjectMsg);
        });

        if (count(Mail::failures()) > 0) {
            $errors = 'Failed to send email, please try again.';
            return $errors;
        }
    }

}
