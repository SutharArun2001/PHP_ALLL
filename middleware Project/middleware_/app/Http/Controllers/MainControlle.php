<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Student;

class mainControlle extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
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
        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phonenumber = $request->phonenumber;
        $student->gender = $request->gender;
        $student->role = '';
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect('/table');
    }
    public function view()
    {
        $student = Student::all();
        $data = compact('student');
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
            'gender' => 'required'
        ]);

        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phonenumber = $request->phonenumber;
        $student->gender = $request->gender;
        $student->save();
        return redirect('table');
    }

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
        // echo $student;
        $credentials = [
            'email' => $student->email,
            'password' => $student->password
        ];
        if ($student) {
            if (Hash::check($request->password, $student->password)) {
                $request->session()->put('email', $request->email);
                $request->session()->put('password', $request->password);
                return redirect('table');
            } else {
                return back()->with('error', 'Please Enter valid password.');
            }
        } else {
            return back()->with('error', 'Please Enter valid email.');
        }
    }
    public function logout()
    {
        session()->forget('email');
        return redirect('/login');
    }
}