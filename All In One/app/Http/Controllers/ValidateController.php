<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use App\Models\Student;
use Illuminate\Http\Request;
use Hash;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use \Illuminate\Support\Facades\Session;
use App\Helper\UrlGen;


class ValidateController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    // public function service(DemoService $showmsg){
    //     // dump($showmsg->test(1));
    //     dump($showmsg);        // echo $showmsg->test(1);
    // }

    public function loginHome()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:8'
        ]);
        $student = Student::where('email', '=', $request->email)->first();
        if ($student) {
            if (Hash::check($request->password, $student->password)) {
                $request->session()->put('email', $request->email);
                $request->session()->put('password',    $request->password);
                Auth::login($student);;
                if (Auth::attempt($request->only('email', 'password'))) {
                    echo "true";
                    return redirect('table');
                } else {
                    echo "false";
                    return view('login');
                }
            } else {
                return back()->with('errorpassword', 'Please Enter valid password.');
            }
        } else {
            return back()->with('erroremail', 'Please Enter valid email.');
        }
    }
    public function logout()
    {
        session()->forget('email');
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    public function create()
    {
        $url = url('register/');
        $title = "Add Student";
        $data = compact('url', 'title');
        return view('register')->with($data);
    }
    public function store(RegistrationRequest $request)
    {
        $imageName = $request->file('userphoto')->getClientOriginalName();
        $request->userphoto->move(public_path('user_photo'), $imageName);

        print_r($request->all());
        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phonenumber = $request->phonenumber;
        $student->gender = $request->gender;
        $student->role = '';
        $student->password = Hash::make($request->password);
        $student->user_photo = $imageName;
        $student->save();

        if (Auth::attempt($request->only('email', 'password'))) {
            echo "true";
            return redirect('table');
        }
        return redirect('login');
    }
    public function view(Request $request)
    {
        $student = Student::all();
        $sum = Student::avg ('id');
        $stddataa = $student->contains(9);
        $data = compact('student','stddataa','sum');
        return view('table')->with($data);
    }
    public function delete($id)
    {
        $stdid = Student::find($id);
        if (!is_null($stdid)) {
            $stdid->delete();
        }
        return redirect('table');
    }
    public function edit($id)
    {
        $stdinfo = $student = Student::find($id);
        if (is_null($stdinfo)) {
            return redirect('table');
        } else {
            $url = url('registerUpdate/update') . '/' . $id;
            $title = "Update Student Info";
            $data = compact('url', 'title', 'stdinfo');
            return view('registerUpdate')->with($data);
        }
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phonenumber' => 'required|digits:10',
            'gender' => 'required',
            'userphoto' => 'required|mimes:jpeg,png,jpg',
        ]);

        $old_photo_name = $request->oldphoto;
        unlink('user_photo/' . $old_photo_name);

        $imageName = $request->file('userphoto')->getClientOriginalName();
        $request->userphoto->move(public_path('user_photo'), $imageName);

        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phonenumber = $request->phonenumber;
        $student->gender = $request->gender;
        $student->user_photo = $imageName;
        $student->save();

        return redirect('table');
    }

    public function student(Student $key){  
        return $key->all();
    }
    
}