<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    private function generateUniqueCode()
    {
        return Str::random(10);
    }
    Public function certificatecreate(){
        $students=User::where('role','Student')->get();
        
        return view('backend.pages.Certificates.create',compact('students'));
    }


   
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'logo' => 'required|mimes:jpg,jpeg,png',
        'collaboration_banner' => 'required|mimes:jpg,jpeg,png',
        'institute_name' => 'required|string',
        'heading' => 'required|string',
        'user_id' => 'nullable|exists:users,id',
        'description' => 'required|string',
        'issue_date' => 'required|date',
    ]);


    if ($validator->fails()) {
        
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $cleanDescription = strip_tags($request->input('description'));
    
    $certificate = new Certificate();
    $certificate->user_id = $request->input('user_id');
    $certificate->institute_name = $request->input('institute_name');
    $certificate->heading = $request->input('heading');
    $certificate->description =  $cleanDescription;
    $certificate->issue_date = $request->input('issue_date');
    $certificate->verification_code = $this->generateUniqueCode();

   
    if($request->file('logo'))
    {
        $image=$request->file('logo');
        $ext = rand().".".$image->getClientOriginalName();
        $image->move('uploads/certificate/',$ext);
        $certificate->logo=$ext;
    }
    else
    {
        $certificate->logo = "null";
    }
    if($request->file('collaboration_banner'))
    {
        $image=$request->file('collaboration_banner');
        $ext = rand().".".$image->getClientOriginalName();
        $image->move('uploads/certificate/',$ext);
        $certificate->collaboration_banner=$ext;
    }
    else
    {
        $certificate->collaboration_banner = "null";
    }
    $certificate->save();
    return redirect('list_certificate')->with("created","Scholorship Created Successfully...");
}


    public function list(){
        $certificate=Certificate::all();
        return view('backend.pages.Certificates.list',compact('certificate'));
    }


    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $certificate = Certificate::find($del);
        $path='uploads/certificate/'.$certificate->logo;
        if(File::exists($path)){
          File::delete($path);
        }
        $certificate->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }


    public function edit($id){
        $certificate=Certificate::find($id);
        $students=User::where('role','Student')->get();
        return view('backend.pages.Certificates.edit',compact('certificate','students'));

    }

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'logo' => 'nullable|mimes:jpg,jpeg,png',
        'collaboration_banner' => 'nullable|mimes:jpg,jpeg,png',
        'institute_name' => 'required|string',
        'heading' => 'required|string',
        'user_id' => 'nullable|exists:users,id',
        'description' => 'required|string',
        'issue_date' => 'required|date',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    $certificate = Certificate::findOrFail($id);
    $cleanDescription = strip_tags($request->input('description'));

    $certificate->user_id = $request->input('user_id');
    $certificate->institute_name = $request->input('institute_name');
    $certificate->heading = $request->input('heading');
    $certificate->description =  $cleanDescription ;
    $certificate->issue_date = $request->input('issue_date');
    $certificate->verification_code = $this->generateUniqueCode();

    if ($request->file('logo')) {
        $image = $request->file('logo');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('uploads/certificate/', $ext);
        $certificate->logo = $ext;
    }

    if ($request->file('collaboration_banner')) {
        $image = $request->file('collaboration_banner');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('uploads/certificate/', $ext);
        $certificate->collaboration_banner = $ext;
    }

    $certificate->save();

    return redirect()->route('list_certificate')->with('info', 'Data Updated Successfully');
}
public function verifyCertificate($code)
{
    $certificate = Certificate::where('verification_code', $code)->first();

    if ($certificate) {
        // Certificate is valid, you can customize this message
        return view('userside.verification.success', compact('certificate'));
    } else {
        // Invalid certificate, you can customize this message
        return view('userside.verification.failure');
    }
}


public function view($id){
    $certificate = Certificate::findOrFail($id);
    return view('backend.pages.Certificates.certificate', compact('certificate'));
}

Public function changepasswordget(){
    return view('studentdashboard.pages.setting.changepassword');
}


public function changepassword(Request $request)
{
$request->validate([
    'old_password' => 'required',
    'new_password' => 'required|min:6',
    'confirm_password' => 'required|same:new_password',
]);

$user = auth()->user();

if (!Hash::check($request->old_password, $user->password)) {
    return redirect()->back()->with('error', 'The old password is incorrect.');
}

$user->password = Hash::make($request->new_password);
$user->save();

return redirect()->route('student-dashboard')->with('success', 'Password changed successfully.');
}
}
