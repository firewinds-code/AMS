<?php

namespace App\Http\Controllers;

use App\Models\ams_info;
use Validator;
use Illuminate\Http\Request;

class Operation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "hello";
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
            'tl_id' => 'required',
            'agent_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $program = ams_info::create([
            'status' => 'assign',
            'tl_id' => $request->tl_id,
            'agent_id' => $request->agent_id
         ]);

        return response()->json(['Program created successfully.']);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        dd($request->agent_id);
        $validator = Validator::make($request->all(),[
            'tl_id' => 'required',
            'agent_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        // $ticket->tl_id = $request->tl_id;
        // $ticket->agent_id = $request->agent_id;
        // $ticket->save();
        ams_info::where('id',$request->id)->update(['tl_id' => $request->tl_id, 'agent_id' => $request->agent_id, 'status' => 'assign']);

        return response()->json(['Program updated successfully.']);
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



    // public function ticketUpdate(Request $request)
    // {

    //     $validator = Validator::make($request->all(),[
    //         'tl_id' => 'required',
    //         'agent_id' => 'required'
    //     ]);

    //     if($validator->fails()){
    //         return response()->json($validator->errors());
    //     }

    //     $program = Ticket::create([
    //         'status' => 'assign',
    //         'tl_id' => $request->tl_id,
    //         'agent_id' => $request->agent_id
    //      ]);

    //     return response()->json(['Program created successfully.']);
    // }





}
