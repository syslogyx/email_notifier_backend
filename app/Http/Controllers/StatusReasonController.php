<?php

namespace App\Http\Controllers;

use App\Status_Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StatusReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * API to add port status reasons
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addReason()
    {
        $posted_data = Input::all();
        $object = new Status_Reason();
        if ($object->validate($posted_data)) {
            $model = Status_Reason::create($posted_data);
            return response()->json(['status_code' => 200, 'message' => 'Reason added successfully', 'data' => $model]);
        } else {
            throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to add reason.', $object->errors());
        }
    }

    /**
     * API get all port status reasons list
     *
     * @param  \App\Status_Reason  $status_Reason
     * @return \Illuminate\Http\Response
     */
    public function getReasons(Status_Reason $status_Reason)
    {
        $model = Status_Reason::all();
        if (count($model)>0) {
            return response()->json(['status_code' => 200, 'message' => 'Reason List', 'data' => $model]);
        } else {
            return response()->json(['status_code' => 404, 'message' => 'Record not found.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status_Reason  $status_Reason
     * @return \Illuminate\Http\Response
     */
    public function updateReason(Status_Reason $status_Reason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status_Reason  $status_Reason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status_Reason $status_Reason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status_Reason  $status_Reason
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status_Reason $status_Reason)
    {
        //
    }
}
