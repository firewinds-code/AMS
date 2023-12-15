<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\case_detail_infos;
use App\Models\ams_info;
use Illuminate\Support\Facades\Hash;
use Validator;

class TlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    { 
        $this->middleware('auth');
    }
    public function index()
    {

        $role = Auth::user()->role;
        if($role != 'tl') {
            session()->flush();
            return redirect('/');
        }
        $data['amsDetails']  = ams_info::get();
        return view('admin.dealer',$data);
    }

    public function agent()
    {
		$users  = User::where(['role' => 'agent', 'creater_id' => Auth::user()->id ])->get();
		return view('admin.listtl')->with(compact('users'));


    }


    public function assignAgent ()
    {
        $users  = User::where(['role' => 'agent', 'creater_id' => Auth::user()->id ])->get();
		return view('admin.listtlticket')->with(compact('users'));

    }

    public function assgnTicketAgent($id)
    {

		$users  = User::where('id', $id)->get();
		$data['amsDetails']  = ams_info::get();
		//$data['amsDetails']  = ams_info::where('tl_id', Auth::user()->id)->get();
        //dd($data['amsDetails'] );
        return view('admin.dealer',$data);

    }


    public function updateAssgnTicketAgent(Request $request)
    {   
        
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.createtl');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

			'email' => 'required|string|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:8',
            'name' => 'required',

        ]);

		User::create([
            'name' => $request->name,
			'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'creater_id' => Auth::user()->id
		]);

        $request->session()->flash('success', 'User Created Succefully');
        $url = url()->previous();
        return redirect($url);

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
        User::where('id', $id)->delete();
		session()->flash('error', 'crm Delete Succefully');
        $url = url()->previous();
        return redirect($url);
    }
}
