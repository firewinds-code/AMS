<?php

namespace App\Http\Controllers;

use App\Models\MajorMinorTat;
use App\Models\PreApprovalStageReason;
use App\Models\PostApprovalStageReason;
use App\Models\RepairApprovalStageReason;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MasterController extends Controller
{

  public $majorTat;

  public $repair;

  public $post;

  public $pre;

  public function __construct(
    MajorMinorTat $majorTat,
    RepairApprovalStageReason $repair,
    PostApprovalStageReason $post,
    PreApprovalStageReason $pre
  ) { //modals for all pages will be called using 1 modal body by this (modal is on mojorMinor.blade)
    $this->majorTat = $majorTat;
    $this->repair = $repair;
    $this->post = $post;
    $this->pre = $pre;
  }


  public function preStageReason()
  {
    return view('stageDelayReason');
  }

  public function postStageReason()
  {
    return view('stageDelayReason');
  }

  public function repairStageReason()
  {
    return view('stageDelayReason');
  }

  public function getmajorMinorTat(Request $request)
  {
    try {
      $data = $this->majorTat::all();
      return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'success' => true, 'status' => 200]);
    } catch (Exception $ex) {
      return response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function majorMinorTat(Request $request)
  {
    return view('mojorMinor');
  }

  public function  addTat()
  {
    try {
      return  response()->json(['html' => view('ajax.addTat')->render(), 'success' => true, 'status' => 200]);
    } catch (\Exception $ex) {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function  editTat(Request $request)
  {
    try {
      $row = $data = $this->majorTat::where('id', $request->id)->first();
      return  response()->json(['html' => view('ajax.editTat', compact('row'))->render(), 'success' => true, 'status' => 200]);
    } catch (\Exception $ex) {
      return  response()->json(['error' => true, 'message' => $ex->getMessage()]);
    }
  }

  public function reasonGetData(Request $request)
  {
    try {
      if ($request->slug == 'pre-stage-reason') {
        $predata = $this->pre::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('predata'))->render(), 'success' => true]);
      }
      if ($request->slug == 'repair-stage-reason') {
        $repairdata = $this->repair::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('repairdata'))->render(), 'success' => true]);
      }
      if ($request->slug == 'post-approval-stage') {
        $postdata = $this->post::all();
        return response()->json(['html' => view('ajax.reasonStage', compact('postdata'))->render(), 'success' => true]);
      }
      return response()->json(['error' => true, 'message' => 'something went wrong']);
    } catch (Exception $ex) {
      return  response()->json(['message' =>  $ex->getMessage(), 'error' => true]);
    }
  }

  public function updateTat(Request $request)
  {
    $condition  = $this->majorTat::where('id', $request->id)->update(['tatName' => $request->tatName, 'majorTat' => $request->majorTat, 'minorTat' => $request->minorTat]);
    if ($condition) {
      $data = $this->majorTat::all();
      return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'message' => 'TAT Updated Successfully !', 'success' => true, 'status' => 200]);
    }
    return response()->json(['message' => 'TAT Updated Failed !', 'error' => true]);
  }

  public function saveTat(Request $request)
  {
    $condition  = $this->majorTat::create(['tatName' => $request->tat_name, 'majorTat' => $request->tat_days_major, 'minorTat' => $request->tat_days_minor, 'created_at' => Carbon::now()]);
    if ($condition) {
      $data = $this->majorTat::all();
      return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'message' => 'TAT Insterd Successfully !', 'success' => true, 'status' => 200]);
    }
    return response()->json(['message' => 'TAT Updated Failed !', 'error' => true]);
  }

  public function deleteTat(Request $request)
  {
    $condition  = $this->majorTat::where('id', $request->id)->delete(); {
      $data = $this->majorTat::all();
      return response()->json(['html' => view('ajax.minorMajorTat', compact('data'))->render(), 'message' => 'TAT Deleted Successfully !', 'success' => true, 'status' => 200]);
    }
    return response()->json(['message' => 'TAT Deleted Failed !', 'error' => true]);
  }
}
