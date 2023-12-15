<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\duplicate_job_card;
use App\Models\ams_info;
use Illuminate\Support\Facades\Hash;
// use Excel;
use DB;
class AdminController extends Controller
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
        if($role != 'admin') {
            session()->flush();
            return redirect('/');
        }
        $data['amsDetails'] = ams_info::get();
        return view('admin.dealer',$data);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamleader()
    {
		$users  = User::where('role', 'tl')->get();
		return view('admin.listtl')->with(compact('users'));
    }

    public function uploadcase()
    {
		$users  = User::where('role', 'tl')->get();
		return view('admin.uploadcase')->with(compact('users'));
    }


    public function submlitUpload(Request $request){
        try {
            $ext = $request->file('case_file')->extension();
            // echo $ext;
            // die;
            
            if($ext == 'csv') {
                // dd("aaaa");
                $path = $request->file('case_file')->getRealPath();
                $path = str_replace('\\', '/', trim($path));
                // dd($path);
                $rows_data_find = array_map('str_getcsv', file($path));
                
                // Loop through each row (skip the header row, that's why we use array_slice)
                foreach(array_slice($rows_data_find, 1) as $ext_rows) 
                {
                    $data =array();
                    
                     // Assuming the Job Card No is in the first column (index 0) of the CSV
                    $jobCardNo =  $ext_rows[0];
                    
                    // Check if the job card number already exists in the database
                    $checkJobCard = ams_info::where('Job_card_No',$jobCardNo)->get()->count();
                    //dd($checkJobCard);
                    
                    if($checkJobCard  > 0)
                    {
                        //dd("dvdv");
                        // Job card number already exists, insert into duplicate_job_card table
                        duplicate_job_card::insert(['Job_card_No'=>$jobCardNo]);
                    }
                    else
                    {
                         // Job card number does not exist, prepare data for insertion
                        foreach($rows_data_find[0] as $gu => $gn) 
                        {
                            $data[$gn] = $ext_rows[$gu] !=''?trim($ext_rows[$gu]):'';
                        }
                        // Insert data into ams_info table
                        $result =  DB::table('ams_info')->insert($data);   
                    }
                                     
                }
                if($result)
                {
                    $notification = array(
                        'message' => "Data has been successfully Imported.",
                        'alert-type' => 'success'
                    );
                    return back()->with($notification);
                } 
                else 
                {
                    $notification = array(
                        'message' => "Please Select CSV file",
                        'alert-type' => 'error'
                    );
                    return back()->with($notification);
                }
            } 
            else {
                $notification = array(
                    'message' => "Please Select CSV file",
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        } catch (\Exception $ex){
        $notification = array(
            'message' => $ex->getMessage().' Line: '.$ex->getLine(),
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
    }

   

    public function assigntl ()
    {
        $users  = User::where('role', 'tl')->get();
		return view('admin.listtlticket')->with(compact('users'));

    }

    public function assgntickettl($id)
    {

		$users  = User::where('id', $id)->get();
        return view('admin.dealer');
		//return view('admin.listtl')->with(compact('users'));

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