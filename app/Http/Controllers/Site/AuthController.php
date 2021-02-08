<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Iso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        $isos = Iso::all();
        return view('site.auth.login',compact('isos'));
    }
    public function postLogin(Request $request){

        $validator=Validator::make($request->all(),[
            'phone' => 'required',
            'iso_id'=>'required',
            'password' => 'required'
        ]);

        if($validator->passes()){
            $iso = Iso::find($request['iso_id']);
            if(!$iso){
                $msg = 'من فضلك قم باختيار كود دوله صحيح';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            if($request['phone'][0]=='0'){
                $phone = $iso->name.substr($request['phone'], 1);
            }else{
                $phone = $iso->name.$request['phone'];
            }
            if(!Auth::attempt( ['phone'=>$phone , 'password' =>$request['password'] ])){
                $msg = "رقم الجوال أو كلمه المرور غير صحيحه.";
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }


            $msg = route('home');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
                if(isset($value['iso_id'])) {
                    $msg = 'كود الدوله مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['phone'])) {
                    $msg = 'رقم الجوال مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password'])) {
                    $msg = 'الرقم السري مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }

            }
        }

    }

    public function register() {
        $isos = Iso::all();
        return view('site.auth.register',compact('isos'));
    }

    public function postRegister(Request $request){
        $validator=Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'iso_id'=>'required',
            'email'=>'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->passes()){
            $iso = Iso::find($request['iso_id']);
            if(!$iso){
                $msg = 'من فضلك قم باختيار كود دوله صحيح';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            $email = $request['email'];
            $emailused = User::where('email',$email)->first();
            if($emailused){
                $msg = 'البريد الالكتروني مستخدم من قبل';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            $user = new User();
            $user->isConfirmed = 0;
            $user->name = $request['name'];
            $user->iso_id = $iso->id;
            if($request['phone'][0]=='0'){
                $phone = $iso->name.substr($request['phone'], 1);
                $phone_without_iso =substr($request['phone'], 1);
            }else{
                $phone = $iso->name.$request['phone'];
                $phone_without_iso = $request['phone'];
            }
            $phoneused = User::where('phone',$phone)->first();
            if($phoneused){
                $msg = 'رقم الجوال مستخدم من قبل';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            $user->phone = $phone;
            $user->email = $email;
            $user->phone_without_iso = $phone_without_iso;
            $user->password = bcrypt($request['password']);
            $v_code = rand(1111,9999);
            $user->v_code = $v_code;
            $user->save();

            Auth::login($user);

            $msg = route('confirmation');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
                if(isset($value['name'])){
                    $msg = 'اسم المستخدم مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['iso_id'])) {
                    $msg = 'كود الدوله مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['phone'])) {
                    $msg = 'رقم الجوال مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['email'])) {
                    $msg = 'البريد الالكتروني غير صحيح';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password'])) {
                    $msg = 'يجب ألا تقل كلمه المرور عن ٦ حروف';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password_confirmation'])) {
                    $msg = 'يجب تطابق كلمتي المرور';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }
            }
        }
    }

    public function getConfirmation(){
        return view('site.auth.confirmation');
    }
    public function postConfirmation(Request $request){
        $validator=Validator::make($request->all(),[
            'v_code' => 'required'
        ]);

        if($validator->passes()){

            $user = Auth::user();
            if($request['v_code']!==$user->v_code){
                $msg = 'كود التأكيد خاطئ';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            $user->isConfirmed = 1;
            $user->v_code = '';
            $user->update();

            $msg = route('home');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
                if(isset($value['v_code'])){
                    $msg = 'كود التأكيد مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }
            }
        }
    }

    public function forgotPassword(){
        $isos = Iso::all();
        return view('site.auth.forgot-password',compact('isos'));
    }
    public function postForgotPassword(Request $request){
        $validator=Validator::make($request->all(),[
            'phone' => 'required',
            'iso_id' => 'required'
        ]);

        if($validator->passes()){
            $iso = Iso::find($request['iso_id']);
            if(!$iso){
                $msg = 'من فضلك قم باختيار كود دوله صحيح';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }
            if($request['phone'][0]=='0'){
                $phone = $iso->name.substr($request['phone'], 1);
            }else{
                $phone = $iso->name.$request['phone'];
            }

            $user = User::where('phone',$phone)->first();
            if(!$user){
                $msg = 'رقم الجوال غير صحيح';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }

            $v_code = rand(1111,999);
            $user->v_code = $v_code;
            $user->update();



            Session::put('forgotpassword',$user);

            $msg = route('password.reset');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
                if(isset($value['iso_id'])){
                    $msg = 'كود الدوله مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['phone'])){
                    $msg = 'رقم الجوال مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }
            }
        }
    }
    public function resetPassword(){
        if(!Session::has('forgotpassword')){
            return redirect()->route('password.forgot');
        }

        return view('site.auth.reset-password');
    }
    public function postResetPassword(Request $request){
        $validator=Validator::make($request->all(),[
            'v_code' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->passes()){

            if(!Session::has('forgotpassword')){
                $msg = route('password.forgot');
                return response()->json([
                    'key'   => 'success',
                    'msg' => $msg
                ]);
            }

            $user = Session::get('forgotpassword');
            if($user->v_code != $request['v_code']){
                $msg = 'كود التفعيل خاطئ';
                return response()->json([
                    'key'   => 'fail',
                    'msg' => $msg
                ]);
            }

            $user->password = bcrypt($request['password']);
            $user->v_code = '';
            $user->update();

            $msg = route('site.login');
            return response()->json([
                'key'   => 'success',
                'msg' => $msg
            ]);

        }else{
            foreach ((array) $validator->errors() as $value) {
                if(isset($value['v_code'])){
                    $msg = 'كود التأكيد مطلوب';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password'])) {
                    $msg = 'يجب ألا تقل كلمه المرور عن ٦ حروف';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }elseif(isset($value['password_confirmation'])) {
                    $msg = 'يجب تطابق كلمتي المرور';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg
                    ]);
                }else{
                    $msg = 'حدث خطأ ما';
                    return response()->json([
                        'key'   => 'fail',
                        'msg' => $msg,
                    ]);
                }
            }
        }
    }



    public function logout() {
        Auth::logout();
        return redirect()->route('site.login');
    }
}
