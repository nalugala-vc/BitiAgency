<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Appointments;
use App\Models\Feedback;
use App\Models\Forms;
use App\Models\InsuranceCovers;
use App\Models\Payments;
use App\Models\SubmittedForms;
use App\Models\User;
use App\Models\YearlyPayments;
use Exception;
use Illuminate\Http\Request;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    public function grammerChecker($count,$word){
        if($count>1){
            $word=$word.'s';
        }
        return $word;
    }

    public function countRows($database){
        $databaseList=DB::table($database)->get();
        $databaseCount=$databaseList->count();

        return $databaseCount;
    }

    function getRandomWord() {
        $len = 10;
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    public function dateAndTime(){
        $currentYear = date('Y');
        $currentMonth = date('F');
        $currentDate=date('d');

        return $currentDate.' '. $currentMonth. ' '. $currentYear;
    }
    
    public function index(){
        $date=$this->dateAndTime();
        $recentlyJoinedUsers=DB::table("users")->orderBy('id', 'DESC')->get();
        $recentlyBookedApp=DB::table("appointments")->where('status','pending')->orderBy('id', 'DESC')->get();

        $usersCount=$this->countRows("users");
        $userGrammar=$this->grammerChecker($usersCount,"user");

        $coverCount=$this->countRows("insurance_covers");
        $coverGrammar=$this->grammerChecker($coverCount,'cover');

        $appointmentCount=$this->countRows("appointments");
        $appointmentGrammar=$this->grammerChecker($appointmentCount,'appointment');

        $feedbackCount=$this->countRows("feedback");
        $feedbackGrammar=$this->grammerChecker($feedbackCount,'reach out');


        return view('admins.dashboard',[
            'recentlyJoinedUsers'=>$recentlyJoinedUsers,
            'recentlyBookedApp'=>$recentlyBookedApp,
            'users'=>$usersCount,
            "userGrammer"=>$userGrammar,
            'covers'=>$coverCount,
            "coverGrammer"=>$coverGrammar,
            'appointments'=>$appointmentCount,
            "appointmentGrammer"=>$appointmentGrammar,
            'feedbacks'=>$feedbackCount,
            "feedbackGrammer"=>$feedbackGrammar,
            'date'=>$date
        ]);
    }

    public function viewRegisterUser(){
        $insurance_cover=DB::table('insurance_covers')->get();
        $date=$this->dateAndTime();
        return view('admins.RegisterUsers',[
            'insurance_cover'=>$insurance_cover,
            'date'=>$date
        ]);
    }

    public function submitUser(){
        $exists=DB::table('users')->where('email', request()->email)->exists();
        if($exists){
            return redirect()->back()->with('error','Email already exists');
        }
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'picture'=>'required'
        ]);

        $file=request()->picture;
        $filename=$file->getClientOriginalName();
        request()->picture->move('assets',$filename);

        $password=$this->getRandomWord();
        $email=request()->email;
        $name=request()->name;

        $HashedPass=Hash::make($password);

        User::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'covers_id'=>request()->covers_id,
            'age'=>request()->age,
            'location'=>request()->location,
            'picture'=>$filename,
            'phone_no'=>request()->phone_no,
            'gender'=>request()->gender,
            'password'=>$HashedPass
        ]);

        try{
            Mail::to(request()->email)->send(new WelcomeMail($name,$password,$email));
            return redirect()->back()->with('application','User registered  successfully');
        }catch(Exception $th){
            return redirect()->back()->with('error','something went wrong' .$th);
        }

    }
    public function viewUsers(){
        $users=DB::table('users')->get();
        $date=$this->dateAndTime();

        return view('admins.viewUsers',[
            'users'=>$users,
            'date'=>$date
        ]);
    }

    public function editUser($user){
        $user=User::findOrFail($user);
        $insurance_cover=DB::table('insurance_covers')->get();
        $date=$this->dateAndTime();

        return view('admins.editUser',[
            'user'=>$user,
            'insurance_cover'=>$insurance_cover,
            'date'=>$date
        ]);
    }

    public function submitEditedUser($user){
        request()->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        $file=request()->picture;
        if($file != null){
            $filename=$file->getClientOriginalName();
            request()->picture->move('assets',$filename);
        }else{
            $filename=null;
        }

        User::where('id',$user)->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'covers_id'=>request()->covers_id,
            'age'=>request()->age,
            'location'=>request()->location,
            'picture'=>$filename,
            'phone_no'=>request()->phone_no,
            'gender'=>request()->gender,
        ]);

        return redirect()->back()->with('application','User updated  successfully');

    }

    public function deleteUser($user){
        $user=User::findOrFail($user);

        $user->delete();

        return redirect()->back()->with('application','User deleted successfully');
    }

    public function viewReachOuts(){
        $feedback=DB::table('feedback')->where('reply','pending')->get();
        $date=$this->dateAndTime();
        return view('admins.reachouts',[
            'feedback'=>$feedback,
            'date'=>$date,
        ]);
    }

    public function addInsuranceCover(){
        $date=$this->dateAndTime();
        return view('admins.addInsuranceCovers',[
            'date'=>$date
        ]);
    }

    public function submitCover(){
        request()->validate([
            'name'=>'required',
            'price'=>'required',
        ]);

        InsuranceCovers::create([
            'name'=>request()->name,
            'price'=>request()->price
        ]);

        return redirect()->back()->with('application','Insurance cover added successfully');
    }

    public function viewInsuranceCovers(){
        $insurance_covers=InsuranceCovers::all();
        $date=$this->dateAndTime();

        return view('admins.viewInsuranceCovers',[
            'covers'=>$insurance_covers,
            'date'=>$date
        ]);
    }

    public function editInsuranceCover($cover){
        $insurance_cover=InsuranceCovers::findOrFail($cover);
        $date=$this->dateAndTime();

        return view('admins.editInsuranceCover',[
            'cover'=>$insurance_cover,
            'date'=>$date
        ]);
    }

    public function updateInsuranceCover($cover){
        request()->validate([
            'name'=>'required',
            'price'=>'required'
        ]);

        InsuranceCovers::where('id',$cover)->update([
            'name'=>request()->name,
            'price'=>request()->price
        ]);

        return redirect()->back()->with('application','Insurance cover updated successfully');

    }

    public function deleteInsuranceCover($cover){
        $cover=InsuranceCovers::findOrFail($cover);

        $cover->delete();

        return redirect()->back()->with('application','Insurance cover deleted successfully');
    }

    public function replyFeedback($feedback){
        $feedback=Feedback::findOrFail($feedback);
        $date=$this->dateAndTime();
        return view('admins.replyReachouts',[
            'feedback'=>$feedback,
            'date'=>$date
        ]);
    }

    public function submitReply($feedback){
        request()->validate([
            'name'=>'required',
            'concern'=>'required',
            'explanation'=>'required',
            'reply'=>'required'
        ]);

        Feedback::where('id',$feedback)->update([
            'reply'=>request()->reply
        ]);

        return redirect()->back()->with('application','Reply recorded successfully');
    }

    public function viewRepliedFeedback(){
        $feedback=DB::table('feedback')->where('reply','!=','pending')->get();
        $date=$this->dateAndTime();
        return view('admins.repliedUserReachouts',[
            'feedback'=>$feedback,
            'date'=>$date
        ]);
    }

    public function forms(){
        $date=$this->dateAndTime();
        return view('admins.forms',[
            'date'=>$date
        ]);
    }

    public function submitForm(){
        request()->validate([
            'name'=>'required',
            'form_file'=>'required'
        ]);
        $file=request()->form_file;
        $filename=$file->getClientOriginalName();
        request()->form_file->move('assets',$filename);

        Forms::create([
            'name'=>request()->name,
            'form_file'=>$filename
        ]);

        return redirect()->back()->with('application','Form added successfully');
    }

    public function submittedForms(){
        $submitted_forms=SubmittedForms::all();
        $date=$this->dateAndTime();

        return view('admins.submittedForms',[
            'submitted_forms'=>$submitted_forms,
            'date'=>$date
        ]);
    }

    public function viewSubmittedForm($form){
        $form=SubmittedForms::findOrFail($form);
        $date=$this->dateAndTime();

        return view('admins.viewSubmittedForm',[
            'form'=>$form,
            'date'=>$date
        ]);
    }

    public function payments(){
        $payments=Payments::where('status', 'pending')->get();
        $date=$this->dateAndTime();
        
        return view('admins.confirmPayment',[
            'payments'=>$payments,
            'date'=>$date
        ]);
    }

    public function yearlyPayments(){
        $payments=YearlyPayments::where('status', 'pending')->get();
        $date=$this->dateAndTime();
        
        return view('admins.confirmYearlyPayment',[
            'payments'=>$payments,
            'date'=>$date
        ]);
    }

    public function confirmPayment($payment){
        Payments::where('id',$payment)->update([
            'status'=>'accept',
        ]);

        return redirect()->back()->with('application','Payment Status updated successfully');
    }

    public function declinePayment($payment){
        Payments::where('id',$payment)->update([
            'status'=>'decline',
        ]);

        return redirect()->back()->with('application','Payment Status updated successfully');
    }

    public function confirmYearlyPayment($payment){
        YearlyPayments::where('id',$payment)->update([
            'status'=>'accept',
        ]);

        return redirect()->back()->with('application','Payment Status updated successfully');
    }

    public function declineYearlyPayment($payment){
        YearlyPayments::where('id',$payment)->update([
            'status'=>'decline',
        ]);

        return redirect()->back()->with('application','Payment Status updated successfully');
    }

    public function receivedYearlyPayment(){
        $payments=YearlyPayments::where('status','<>', 'pending')->get();
        $date=$this->dateAndTime();

        return view('admins.viewYearlyPayments',[
            'payments'=>$payments,
            'date'=>$date
        ]);
    }

    public function receivedPayment(){
        $payments=Payments::where('status','<>', 'pending')->get();
        $date=$this->dateAndTime();

        return view('admins.viewPayments',[
            'payments'=>$payments,
            'date'=>$date
        ]);
    }

    public function appointments(){
        $appointments=Appointments::where('status','pending')->get();
        $date=$this->dateAndTime();
        return view('admins.confirmAppointments',[
            'appointments'=>$appointments,
            'date'=>$date
        ]);
    }

    public function acceptAppointment($appointment){
        Appointments::where('id',$appointment)->update([
            'status'=>'accept'
        ]);

        return redirect()->back()->with('application','Appointment accepted successfully');
    }

    public function declineAppointment($appointment){
        Appointments::where('id',$appointment)->update([
            'status'=>'decline',
        ]);

        return redirect()->back()->with('application','Appointment declined successfully');
    }

    public function viewAcceptedAppointments(){
        $appointments=Appointments::where('status','accept')->get();
        $date=$this->dateAndTime();

        return view('admins.viewAppointments',[
            'appointments'=>$appointments,
            'date'=>$date
        ]);
    }

    
}
