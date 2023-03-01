<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use DateTime;
use App\Models\Feedback;
use App\Models\Forms;
use App\Models\Notifications;
use App\Models\Payments;
use App\Models\SubmittedForms;
use App\Models\User;
use App\Models\YearlyPayments;
use App\Models\YearlyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function dateAndTime(){
        $currentYear = date('Y');
        $currentMonth = date('F');
        $currentDate=date('d');

        return $currentDate.' '. $currentMonth. ' '. $currentYear;
    }
    public function editUserProfile(){
        $user=Auth::user();
        $date=$this->dateAndTime();
        $insuarance=DB::table('insurance_covers')->get();
        $yearlyInsurance=YearlyPlan::all();

        return view('users.editProfile',[
            'user'=>$user,
            'insuarance'=>$insuarance,
            'date'=>$date,
            'yearlyInsurance'=>$yearlyInsurance
        ]);
    }

    public function updateUserProfile(Request $request , $user){
        request()->validate([
            'picture'=>'required'
        ]);
        $monthly=request()->covers_id;
        $yearly=request()->yearly_plan;

        if($monthly!=null && $yearly!=null){
            return redirect()->back()->with('error','Please select either the Yearly plan or the Monthly plan');
        }
        $file=request()->picture;
        $filename=$file->getClientOriginalName();
        request()->picture->move('assets',$filename);
        $password= Hash::make(request()->password);


        User::where('id',$user)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
            'covers_id'=>$request->covers_id,
            'age'=>$request->age,
            'location'=>$request->location,
            'picture'=>$filename,
            'phone_no'=>$request->phone_no,
            'gender'=>$request->gender,
        ]);
        return redirect()->back()->with('application','Profile updated  successfully');
    }

    public function seePaymentProgress(){
        $user=Auth::user();
        $date=$this->dateAndTime();
        return view('users.seepayments',[
            'user'=>$user,
            'date'=>$date
        ]);
    }

    public function contactUs(){
        $loggedIn=null;
        if (Auth::check()) {
            $loggedIn=Auth::user()->id;
        }

        return view('auth.custLogin',[
            'loggedIn'=>$loggedIn
        ]);
    }

    public function submitConcern(){
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'concern'=>'required',
            'explanation'=>'required',
        ]);

        Feedback::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'concern'=>request()->concern,
            'explanation'=>request()->explanation,
            'user_id'=>request()->user_id
        ]);
        return redirect()->back()->with('application','Concern submitted  successfully');

    }

    public function bookAppointment(){
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'date'=>'required',
            'time'=>'required',
            'attendance'=>'required',
        ]);

        Appointments::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'date'=>request()->date,
            'time'=>request()->time,
            'attendance'=>request()->attendance,
            'user_id'=>request()->user_id
        ]);
        return redirect()->back()->with('application','Appointment Booked  successfully');
    }

    public function viewFeedback(){
        $user=Auth::user();
        $date=$this->dateAndTime();

        return view('users.feedback',[
            'user'=>$user,
            'date'=>$date
        ]);
    }

    public function viewAppointments(){
        $user=Auth::user();
        $date=$this->dateAndTime();
    
        return view('users.appointments',[
            'user'=>$user,
            'date'=>$date
        ]);
    }

    public function deleteUserAppointment($appointment){
        $appointment=Appointments::findOrFail($appointment);
        $appointment->delete();

        return redirect()->back()->with('application','Appointment deleted successfully');
    }

    public function viewPaymentForm(){
        $insuarance=DB::table('insurance_covers')->get();
        $date=$this->dateAndTime();

        return view('users.submitPayments',[
            'insuarance'=>$insuarance,
            'date'=>$date
        ]);
    }

    public function viewYearlyPaymentForm(){
        $insuarance=DB::table('yearly_plans')->get();
        $date=$this->dateAndTime();

        return view('users.submitYearlyPayments',[
            'insuarance'=>$insuarance,
            'date'=>$date
        ]);
    }

    public function submitPayment(){
        $user_id=Auth::user()->id;
        request()->validate([
            'covers_id'=>'required',
            'year'=>'required',
            'month'=>'required',
            'mpesa_code'=>'required',
        ]);

        $previouPayment=Payments::where('id',$user_id)->get();

        if($previouPayment->count()>0){
            $LastPayment=Payments::where('user_id',$user_id)->orderBy('id','desc')->first('Month');
            $LastPaymentMonth=$LastPayment['Month'];
    
            $LastPaymentyear=Payments::where('user_id',$user_id)->orderBy('id','desc')->first('year');
            $Year=$LastPaymentyear['year'];
    
            $LastPaymentStatus=Payments::where('user_id',$user_id)->orderBy('id','desc')->first('status');
            $status=$LastPaymentStatus['status'];
    
            if(($LastPaymentMonth==request()->month && $Year==request()->year) && $status != 'decline'){
                return redirect()->back()->with('error','Payment for '. $LastPaymentMonth . ' ' . $Year . ' ' .'already made');
            }
        }
        $shortName=request()->month;
        $shortName=substr($shortName,0,3);

        Payments::create([
            'covers_id'=>request()->covers_id,
            'year'=>request()->year,
            'month'=>request()->month,
            'mpesa_code'=>request()->mpesa_code,
            'short_name'=>$shortName,
            'user_id'=>$user_id
        ]);

        return redirect()->back()->with('application','Payment Submitted  successfully');
    }

    public function submitYearlyPayment(){
        $user_id=Auth::user()->id;
        request()->validate([
            'yearly_plan_id'=>'required',
            'year'=>'required',
            'mpesa_code'=>'required',
        ]);

        $previouPayment=YearlyPayments::where('id',$user_id)->get();

        if($previouPayment->count() > 0){
            $LastPaymentyear=YearlyPayments::where('user_id',$user_id)->orderBy('id','desc')->first('year');
            $Year=$LastPaymentyear['year'];

            $LastPaymentStatus=YearlyPayments::where('user_id',$user_id)->orderBy('id','desc')->first('status');
            $status=$LastPaymentStatus['status'];

            if(($Year==request()->year) && $status != 'decline'){
                return redirect()->back()->with('error','Payment for '. $Year . ' ' .'already made');
            }
        }

        YearlyPayments::create([
            'yearly_plan_id'=>request()->yearly_plan_id,
            'year'=>request()->year,
            'mpesa_code'=>request()->mpesa_code,
            'user_id'=>$user_id
        ]);

        return redirect()->back()->with('application','Payment Submitted  successfully');
    }

    public function viewForms(){
        $forms=Forms::all();
        $date=$this->dateAndTime();
        return view('users.forms',[
            'forms'=>$forms,
            'date'=>$date
        ]);
    }

    public function viewSpecifiedForm($form){
        $form=Forms::findOrFail($form);
        $date=$this->dateAndTime();

        return view('users.viewForm',[
            'form'=>$form,
            'date'=>$date
        ]);
    }

    public function downloadForm($form){
        return response()->download(public_path('/assets/'.$form->form_file));
    }

    public function viewSubmitForm($form){
        $form=Forms::findOrFail($form);
        $date=$this->dateAndTime();
        return view('users.submitForms',[
            'form'=>$form,
            'date'=>$date
        ]);
    }

    public function submitForm(){
        $formName=Forms::findOrFail(request()->form_id);
        request()->validate([
            'form_file'=>'required'
        ]);

        $file=request()->form_file;
        $filename=Auth::user()->name.' '.$formName->name.'.'.$file->getClientOriginalExtension();
        request()->form_file->move('assets',$filename);

        SubmittedForms::create([
            'user_id'=>request()->user_id,
            'form_id'=>request()->form_id,
            'form_file'=>$filename
        ]);

        return redirect()->back()->with('application','Form submitted  successfully');
    }

    public function viewNotifications(){
        $userId=Auth::user()->id;
        $date=$this->dateAndTime();
        $userNotification="";

        $currentYear = date('Y');
        $currentMonth = date('m');
        $currentDate=date('d');

        $LastPayment=Payments::where('user_id',$userId)->orderBy('id','desc')->first('Month');
        $LastPaymentMonth=$LastPayment['Month'];

        $LastPaymentyear=Payments::where('user_id',$userId)->orderBy('id','desc')->first('year');
        $Year=$LastPaymentyear['year'];

        $lastPaymentDate = new DateTime($Year . "-" . $LastPaymentMonth . "-01");
$currentDate = new DateTime($currentYear . "-" . $currentMonth . "-" . $currentDate);

if($currentDate < $lastPaymentDate){
  $userNotification = "You are all caught up in your payment plan!";
} else {
  if($currentYear != $Year){
    $userNotification = "You have not completed last year's insurance payment plan. Your last payment was made in ". $LastPaymentMonth. " " . $Year ." . Kindly pay up to continue receiving the benefits of the insuarance.";
  } else {
    if ($currentMonth != $LastPaymentMonth) {
      $userNotification = "You are behind in paying your monthly insuarance plan. Your last payment was made in ".$LastPaymentMonth . " . Kindly pay up to continue receiving the benefits of the insuarance";
    } else {
      if($currentDate->format('d') >= 20){
        $userNotification = "The deadline for the payment is fast approaching and we kindly request that you make your monthly payment as soon as you can";
      }
    }
  }
}

        return view('users.notifications',[
            'userNotification'=>$userNotification,
            'date'=>$date
        ]);
    }
}
