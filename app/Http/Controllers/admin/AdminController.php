<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\UserRequest;
use App\Announcement;
use App\User;
use App\UserMissing;
use App\Missing;
use App\UserBlotter;
use App\UserPatawag;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('authcheck');
		$this->middleware('admincheck');
	}

    public function main(){
        $gets = Announcement::orderBy('id','desc')->paginate(10);
    	return view('admin.main', compact('gets'));
    }

    public function admin_home(){
         $req = UserRequest::count();
        $req_pend = UserRequest::where('status_id', 3)->count();
        $req_app = UserRequest::where('status_id', 4)->count();

        $mis = UserMissing::count();
        $mis_pend = UserMissing::where('status_id', 3)->count();
        $mis_app = UserMissing::where('status_id', 4)->count();
        $mis_found = UserMissing::where('status_id', 6)->count();

        $blotter = UserBlotter::count();
        $blot_pen = UserBlotter::where('status_id', 3)->count();
        $blot_app = UserBlotter::where('status_id',4)->count();

        $user_c = User::where('role_id', 2)->count();
        
        return view('admin.home',compact('req', 'req_pend','req_app','mis','mis_pend','mis_app', 'user_c','mis_found','blotter','blot_pen','blot_app'));
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function admin_request(){
        $gets = UserRequest::where('request_certificate_id',1)->paginate(10);
        return view('admin.request', compact('gets'));
    }

    public function admin_request_contruction_permit(){
        $gets = UserRequest::where('request_certificate_id',2)->paginate(10);
        return view('admin.construction_permit', compact('gets'));
    }

    public function admin_request_business_closure(){
        $gets = UserRequest::where('request_certificate_id',3)->paginate(10);
        return view('admin.business_closure', compact('gets'));
    }

    public function admin_request_good_moral(){
        $gets = UserRequest::where('request_certificate_id',4)->paginate(10);
        return view('admin.good_moral', compact('gets'));
    }

    public function admin_request_indingency(){
        $gets = UserRequest::where('request_certificate_id',5)->paginate(10);
        return view('admin.indingency', compact('gets'));
    }

    public function admin_blotter(){
       $blots = UserBlotter::where('status_id', 3)->paginate(10);
        return view('admin.blotter.main', compact('blots'));
    }

     public function admin_blotter_record(){
        $recs = UserBlotter::where('status_id',4)->get();
        return view('admin.blotter.record', compact('recs'));
    }

    public function admin_missing(){
        $gets = UserMissing::where('status_id', '!=',6)->paginate(10);
        return view('admin.missing.main', compact('gets'));
    }

    public function admin_user_list(){
        $sila = User::where('role_id', 2)->paginate(10);
        return view('admin.userlist.list', compact('sila'));
    }

    public function admin_user_list_create(){
        return view('admin.userlist.create');
    }

    public function admin_new_announcement(Request $request){
        $image_test =  $request->image->getClientOriginalExtension();
        if($image_test == "jpg" || $image_test == "jpeg" || $image_test == "png" || $image_test == "gif"){
             $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(('announcement'), $imageName);

        $find = User::findOrFail(Auth::id());
        $post_ko = new Announcement;
        $post_ko->content = $request['anouncement'];
        $post_ko->title = $request['title'];
        $post_ko->image = $imageName;
        $find->announcement()->save($post_ko);

        return redirect()->back()->with('info', 'Posted successfully!');

        }else{
            return redirect()->back()->with('err','Invalid Image');
        }
       
    }

    public function admin_user_list_new(Request $request){
       $this->validate($request, [
        'username'=> 'required|unique:users'
       ]);

         $image_test =  $request->image->getClientOriginalExtension();
        if($image_test == "jpg" || $image_test == "jpeg" || $image_test == "png" || $image_test == "gif"){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(('profile'), $imageName);

            $user = new User;
            $user->fname = $request['fname'];
            $user->lname = $request['lname'];
            $user->mname = $request['mname'];
            $user->gender = $request['gender'];
            $user->dob = $request['dob'];
            $user->civil_status = $request['status'];
            $user->contact = $request['contact'];
            $user->address = $request['address'];
            $user->email = $request['email'];
            $user->password = bcrypt('barangay');
            $user->role_id = 2;
            $user->status_id = 1;
            $user->username = $request['username'];
            $user->password = bcrypt($request['password']);
            $user->image = $imageName;
            $user->save();

            return redirect()->route('admin_user_list')->with('success', 'You have successfully added new user');

        }else{
            return redirect()->back()->with('err','Invalid Image');
        }
        
    }

    public function admin_user_list_delete($id){
        $del = User::where('id', $id)->delete();

        if($del){
            return redirect()->back()->with('info', 'User has been deleted successfully!!');
        }
    }

    public function admin_missing_decline($id){
       $go = UserMissing::where('id', $id)->first();
       $go->missing->delete();
       $go->delete();

       return redirect()->back()->with('info', 'Report Missing has been successfully deleted!!');
    }

    public function admin_missing_approve($id){
        $ako = UserMissing::where('id',$id)->update(['status_id'=> 4]);
        if($ako){
            return redirect()->back()->with('info', 'Report Missing has been successfully updated!!');
        }
    }

    public function admin_request_approve($id){
        $ups = UserRequest::where('id', $id)->update(['status_id'=> 4]);
        if($ups){
            return redirect()->back()->with('info', 'request has been approved successfully
');
        }
    }

    public function admin_request_decline($id){
        return $id;
    }

    public function admin_request_paid($id){
        $paid = UserRequest::where('id', $id)->update(['payment_status'=> 'Paid']);
        if($paid){
            return redirect()->back()->with('info', 'Report Missing has been successfully updated!!');
        }
    }

   public function admin_missing_found_check($id){
    $found = UserMissing::where('id', $id)->update(['status_id'=> 6]);
        if($found){
            return redirect()->back()->with('info', 'Report Missing has been successfully found!!');
        }
   }


    public function admin_missing_create(){
        return view('admin.missing.create');
    }

    public function admin_missing_found(){
        $gets = UserMissing::where('status_id', 6)->get();
        return view('admin.missing.found', compact('gets'));
    }

    public function admin_missing_create_check(Request $request){
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'description' => 'required',
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
            $kita->status_id = 4;
            $find->missing()->save($kita);

            return redirect()->route('admin_missing')->with('info','You have successfully report missing person!!');



        }else{
            return redirect()->back()->with('err','Invalid Image');
        }

        
    }

    public function admin_missing_view($id){
        $morls = UserMissing::findOrFail($id);

        return view('admin.missing.view', compact('morls'));
    }

    public function admin_setting(){
        return view('admin.settings');
    }

    public function admin_profile(){
        return view('admin.profile');
        
    }

    public function admin_setting_check(Request $request){
     $this->validate($request, [
        'new_password' => 'required|max:12',
        'repeat_password' => 'required|same:new_password'
    ]);

     $update = User::where('id', Auth::id())->update(['password'=> bcrypt($request['repeat_password'])]);
     if($update){
        return redirect()->back()->with('ok', 'Password has been change successfully!');
     }else{
        return redirect()->back()->with('no', 'Failed to change your password, try again later');
     }

    }

    public function admin_profile_check(Request $request){
        $this->validate($request, [
        'contact' => 'required|max:15',
        'email' => 'required|max:40',
        'address' => 'required|max:100',
    ]);

        $update = User::where('id', Auth::id())->update(['contact'=> $request['contact'], 'email'=> $request['email'], 'address'=> $request['address']]);

        if($update){
        return redirect()->back()->with('ok', 'Profile has been change successfully!');
     }else{
        return redirect()->back()->with('no', 'Failed to change your Profile, try again later');
     }
    }

    public function admin_blotter_delete($id){
        $find = UserBlotter::where('id', $id)->first();
        if($find){
            $find->delete();
            return redirect()->back()->with('success', 'Blotter Request has been deleted successfully!');
        }
    }

    public function admin_blotter_approve($id){
        $find = UserBlotter::where('id', $id)->update(['status_id' => 4]);
        if($find){
          
            return redirect()->back()->with('success', 'Blotter Request has been approve successfully!');
        }
    }

    public function admin_blotter_search(){
         $recs = UserBlotter::where('status_id',4)->get();
        $search = $_GET['incident'];
        $find = UserBlotter::where('incident_name', 'like', $search)->get();

        return view('admin.blotter.search', compact('find','recs'));

    }

    public function admin_patawag(){
        $pats = UserPatawag::count();
        $pen = UserPatawag::where('status_id',3)->count();
        $app = UserPatawag::where('status_id',4)->count();
        $patawag = UserPatawag::where('status_id', '>=', 3)->get();
        return view('admin.patawag.patawag', compact('patawag','pats','pen','app'));
    }

    public function admin_decline($id){
        $decline = UserPatawag::where('id',$id)->delete();
        if($decline){
            return redirect()->back()->with('del', 'Patawag Request has been deleted successfully!');
        }
       
    }

    public function admin_approve($id){
        $approve = UserPatawag::where('id',$id)->update(['status_id'=> 4]);
        if($approve){
            return redirect()->back()->with('success', 'Patawag Request has been deleted successfully!');
        }
    }
   


}
