<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisingquery;
use App\Models\Client_enquiry;
use App\Models\Keywords;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmails;

class FrontController extends Controller
{
    
    public function getIp(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
}

    public function advertise(Request $req) {
        $validatedData = $req->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'business_name' => 'required|min:5',
            'phone' => 'required|min:10',
            'email' => 'required|email|unique:advertisingquery',
            'address' => 'required|min:5',
            'message' => 'required|min:5'
                ], [
            'fname.required' => 'First Name is required',
            'lname.required' => 'Last Name is required',
            'business_name.required' => 'Business Name is required',
            'phone.required' => 'Phone No. is required',
            'email.required' => 'Email is required',
            'address.required' => 'Address is required',
            'message.required' => 'AD Descriptions is required',
        ]);
      //  $json = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $this->getIp()));
     // $validatedData['city'] = $json->geoplugin_city;
        $validatedData['city'] = 'Noida';
        $validatedData['cat_id'] = 1;        
        $user = Advertisingquery::create($validatedData);
        return back()->with('success', 'User created successfully.');
       //return view('front.advertise');
    }

    public function contactus() {
        $mailData = [
            'title' => 'Mail from fairsearches.com',
            'body' => 'This is for testing email using smtp.'
        ];
        Mail::to('dvpal2012@gmail.com')->send(new MyEmails($mailData));
        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
       }else{
            return response()->success('Great! Successfully send in your mail');
          }
         return view('front.contact-us');
    }
    
    public function ajaxRequest(Request $req){
        $data = array();
        $validatedData = $req->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'mobile' => 'required|min:5',
            'services' => 'required|min:3',
            'message' => 'required'           
                ], [
            'name.required' => 'First Name is required',
            'email.required' => 'Last Name is required',
            'mobile.required' => 'Business Name is required',
            'services.required' => 'Phone No. is required',
            'message.required' => 'Email is required'           
        ]);
      //  $json = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $this->getIp()));
      //  if($json->geoplugin_city){
      //     $city = $json->geoplugin_city;
      //  } else {
          $city = 'noida'; 
      //  }
        $single_category = Keywords::where('kname', str_replace('-', ' ', $req->services))->first();   
  
        if($single_category['catid'] > 0){
         $main_category = Category::where('id', $single_category['catid'])->first();
         $cat_id = $main_category['id'];
        } else {
           $cat_id = 0; 
        }
        $data =([
            'name'=>$req->name,
            'email'=>$req->email,
            'subcatid'=> $single_category['id'],
            'catid'=>$cat_id,
            'mobile'=>$req->mobile,
            'decityname' =>$city,
            'services'=>$req->services,
            'message'=>$req->message,
            'post_date'=>date('d/m/Y'),
            'post_time'=>date('h:i A')
        ]); 
       
        $result = Client_enquiry::insert($data);
        $arr = array('msg' => 'Something went wrong. Please try again!', 'status' => false);
        if($req){ 
        	$arr = array('msg' => 'Contact Added Successfully!', 'status' => true);
        }
        return Response()->json($arr);  
    }
}
