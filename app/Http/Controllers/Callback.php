<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;

use App\Models\Updateticket;

class Callback extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'ticket_no' => 'required',
            'reg_no' => 'required',
            'chasi_no' => 'required',
            'eng_no' =>  'required',
            'ticket_type' => 'required',
            'dealer_name' => 'required',
            'vin_no' => 'required',
            'status' =>    'required',
            'msv_type' =>  'required',
            'msv_reg_no' => 'required',
            'mechinic_name' => 'required',
            'mechinic_number' => 'required',
            'remark' => 'required',
            'start_time' =>  'required',
            'response_time_No' => 'required',
            'restore_time_No' =>  'required',
            'pause_time_No' =>  'required',
            'end_time' => 'required',
            'url' => 'required',
            'vehicle_mode' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $program = Updateticket::create([

            'ticket_num' => $request->ticket_no,
            'reg_no' => $request->reg_no,
            'chasi_no' => $request->chasi_no,
            'eng_no' =>   $request->eng_no,
            'ticket_type' => $request->ticket_type,
            'vin_no' => $request->vin_no,
            'status' =>   $request->status,
            'msv_type' =>  $request->msv_type,
            'msv_reg_no' => $request->msv_reg_no,
            'mechinic_name' => $request->mechinic_name,
            'mechinic_number' => $request->mechinic_number,
            'dealer_name'  => $request->dealer_name,
            'remark' => $request->remark,
            'start_time' =>   $request->start_time,
            'response_time_No' => $request->response_time_No,
            'restore_time_No' =>   $request->restore_time_No,
            'pause_time_No' =>   $request->pause_time_No,
            'end_time' => $request->end_time,
            'url' => $request->url,
            'vehicle_mode' => $request->vehicle_mode

         ]);

        return response()->json(['result' => 'received successfully.',
                                'ticket_no' => 'sdsdsd454ddas', 'ack_no' => 'dddsdsds']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
