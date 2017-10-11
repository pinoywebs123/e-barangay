<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use PDF;
use App\RequestCertificate;
use App\User;
use App\UserRequest;
use App\Announcement;
use App\Missing;
use App\UserMissing;
use Carbon\Carbon;
use App\UserBlotter;
use App\UserPatawag;
class UserController extends Controller
{
	public function __construct(){
		$this->middleware('authcheck');
		$this->middleware('usercheck');
	}

    public function main(){
        $gets = Announcement::orderBy('id', 'desc')->paginate(5);
    	return view('user.main', compact('gets'));
    }

     public function logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function about(){
        return view('user.about.about');
    }

    public function request(){
        $madami = UserRequest::where('user_id', Auth::id())->paginate(5);
        return view('user.request.request', compact('madami'));
    }

    public function blotter(){
       $myblot = UserBlotter::where('user_id', Auth::id())->paginate(5);
        return view('user.blotter.blotter', compact('myblot'));
    }

    public function missing(){
        $gets = UserMissing::paginate(5);
        return view('user.missing.missing', compact('gets'));
    }

    

    public function user_request_create(){
        $certificates = RequestCertificate::all();

        return view('user.request.create', compact('certificates'));
    }

    public function user_request_create_check($request_id, Request $request){
        $this->validate($request, [
            'b_name'=> 'required',
            'b_address'=> 'required',
            'status' => 'required'
        ]);

        $path = str_random(15);
        
        $find = User::findOrFail(Auth::id());
        $user_req = new UserRequest;
        $user_req->request_certificate_id = $request_id;
        $user_req->path = $path;
        $user_req->status_id = 3;
        $user_req->payment_status = 'Unpaid';
        $find->user_request()->save($user_req);
        $pdf = PDF::loadView('user.certificate.business_clearance', compact('find', 'request'))->save('barangay/'.$path.'.pdf');
        return redirect()->route('user_request')->with('success', 'You submitted your request successfully.!!');

    }

    public function user_request_construction_permit($request_id, Request $request){
        $this->validate($request, [
            'b_type'=> 'required',
            'b_address'=> 'required'
            
        ]);
       $path = str_random(15);
        
        $find = User::findOrFail(Auth::id());
        $user_req = new UserRequest;
        $user_req->request_certificate_id = $request_id;
        $user_req->path = $path;
        $user_req->status_id = 3;
        $user_req->payment_status = 'Unpaid';
        $find->user_request()->save($user_req);
        $pdf = PDF::loadView('user.certificate.constructio_permit', compact('find', 'request'))->save('barangay/'.$path.'.pdf');
        return redirect()->route('user_request')->with('success', 'You submitted your request successfully.!!');
    }

    public function user_request_business_closure($request_id, Request $request){
        $this->validate($request, [
            'b_name'=> 'required',
            'b_address'=> 'required',
            'b_own'=> 'required',
            'b_date'=> 'required',
            
        ]);

        $path = str_random(15);
        
        $find = User::findOrFail(Auth::id());
        $user_req = new UserRequest;
        $user_req->request_certificate_id = $request_id;
        $user_req->path = $path;
        $user_req->status_id = 3;
        $user_req->payment_status = 'Unpaid';
        $find->user_request()->save($user_req);
        $pdf = PDF::loadView('user.certificate.business_closure', compact('find', 'request'))->save('barangay/'.$path.'.pdf');
        return redirect()->route('user_request')->with('success', 'You submitted your request successfully.!!');
    }

    public function user_request_good_moral($request_id, Request $request){
        $path = str_random(15);
        
        $find = User::findOrFail(Auth::id());
        $user_req = new UserRequest;
        $user_req->request_certificate_id = $request_id;
        $user_req->path = $path;
        $user_req->status_id = 3;
        $user_req->payment_status = 'Unpaid';
        $find->user_request()->save($user_req);
        $pdf = PDF::loadView('user.certificate.good_moral', compact('find', 'request'))->save('barangay/'.$path.'.pdf');

        return redirect()->route('user_request')->with('success', 'You submitted your request successfully.!!');
    }

    public function user_request_indingency($request_id, Request $request){
         $this->validate($request, [
            'b_purpose'=> 'required'
            
        ]);
        $path = str_random(15);
        
        $find = User::findOrFail(Auth::id());
        $user_req = new UserRequest;
        $user_req->request_certificate_id = $request_id;
        $user_req->path = $path;
        $user_req->status_id = 3;
        $user_req->payment_status = 'Unpaid';
        $find->user_request()->save($user_req);
        $pdf = PDF::loadView('user.certificate.indingency', compact('find', 'request'))->save('barangay/'.$path.'.pdf');

        return redirect()->route('user_request')->with('success', 'You submitted your request successfully.!!');
    }


    public function user_blotter_create(){
        return view('user.blotter.create');
    }

    public function user_blotter_create_check(Request $request){
        $path = str_random(15);
        $number = rand(12345679,987654123);
        $find = User::where('id', Auth::id())->first();

        $blotter = new UserBlotter;
        $blotter->entry_number = $number;
        $blotter->incident_name = $request['incident_name']; 
        $blotter->status_id = 3;
        $blotter->path = $path;

        $find->blotter()->save($blotter);

        $pdf = PDF::loadView('user.certificate.blotter',compact('number','find', 'request'))->save('blotter/'.$path.'.pdf');

        $patawag = new UserPatawag;
        $patawag->entry_number = $number;
        $patawag->status_id = 2;
        $patawag->path = $path;
        $patawag->save();

        $pdf = PDF::loadView('user.certificate.patawag',compact('find', 'request'))->save('patawag/'.$path.'.pdf');

        return redirect()->route('user_blotter_create')->with('success', $blotter->entry_number);
        
    }

    public function user_missing_create(){
        return view('user.missing.create');
    }

     public function user_missing_check(Request $request){
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'description' => 'required',
            'image' => 'required',
            'date' => 'required'
        ]);
        
         $image_test =  $request->image->getClientOriginalExtension();
        if($image_test == "jpg" || $image_test == "jpeg" || $image_test == "png" || $image_test == "gif"){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('missing'), $imageName);

            $mis = new Missing;
            $mis->fname = $request['fname'];
            $mis->lname = $request['lname'];
            $mis->gender = $request['gender'];
            $mis->age =  $request['age'];
            $mis->description = $request['description'];
            $mis->image = $imageName;
            $mis->date_missing = $request['date'];
            $mis->save();

            $find = User::findOrFail(Auth::id());
            $kita = new UserMissing;
            $kita->missing_id = $mis->id;
            $kita->status_id = 3;
            $find->missing()->save($kita);

            return redirect()->route('user_missing')->with('success','You have successfully report missing person!!');

        
            
        }else{
            return redirect()->back()->with('err','Invalid Image');
        }
        
        
    }

    public function user_announce_view($id){
        $wak = Announcement::findOrFail($id);
        return view('user.page', compact('wak'));
    }

    public function user_update_profile(Request $request){
            $data = array(
                    'civil_status' => $request['status'],
                    'address' => $request['address'],
                    'contact' => $request['contact'],
                    'email' => $request['email']
                );
            $user = User::where('id', Auth::id())->update($data);

            if($user){
                return redirect()->back()->with('info', 'You have successfully Updated your informations!!');
            }
    }

    public function user_blotter_yes($id){
       $find = UserPatawag::where('entry_number', $id)->update(['status_id'=> 3]);

       if($find){
        return redirect()->back()->with('patawag', 'You have successfully send patawag!!');
       }
       
    }

      public function user_blotter_no($id){
         $find = UserPatawag::where('entry_number', $id)->delete();

           if($find){
            return redirect()->back()->with('patawag', 'You have successfully cancel patawag!!');
           }
    }


    public function user_settings(){
        return view('user.about.settings');
    }

    public function user_settings_check(Request $request){
        $this->validate($request, [
            'new_password' => 'required|max:12',
            're_type_password' => 'required|same:new_password'
        ]);

        $update = User::where('id', Auth::id())->update(['password'=> bcrypt($request['re_type_password'])]);

        if($update){
            return redirect()->back()->with('change', 'You have successfully change your password request!!');
        }
        return redirect()->back()->with('no_change', 'Error changing your password request!!');
    }


   

}
