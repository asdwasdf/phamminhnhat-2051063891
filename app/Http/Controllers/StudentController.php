<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function get_all_student()
    {
        //
        $students = Student::all();
        return view('student.list', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'fullname' => 'required|min:4|max:20',
            'address' => 'required|min:4|max:20',
            'birthday' => 'required|'
        ];
        $messages = [
            'fullname.required' => 'Tên sinh viên bắt buộc phải nhập',
            'fullname.min' => 'Tên sinh viên phải lớn hơn :min ký tự',
            'fullname.max' => 'Tên sinh viên phải nhỏ hơn :max ký tự',
            'address.required' => 'Địa chỉ sinh viên bắt buộc phải nhập',
            'address.min' => 'Địa chỉ sinh viên phải lớn hơn :min ký tự',
            'address.max' => 'Địa chỉ sinh viên phải nhỏ hơn :max ký tự',
            'birthday.required' => 'Ngày sinh sinh viên bắt buộc phải nhập',
        ];
        $request->validate($rules,$messages);
        
        Student::create([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        return redirect("/students/list");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = Student::find($id);
        return view('student.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $rules = [
            'fullname' => 'required|min:4|max:20',
            'address' => 'required|min:4|max:20',
            'birthday' => 'required|'
        ];
        $messages = [
            'fullname.required' => 'Tên sinh viên bắt buộc phải nhập',
            'fullname.min' => 'Tên sinh viên phải lớn hơn :min ký tự',
            'fullname.max' => 'Tên sinh viên phải nhỏ hơn :max ký tự',
            'address.required' => 'Địa chỉ sinh viên bắt buộc phải nhập',
            'address.min' => 'Địa chỉ sinh viên phải lớn hơn :min ký tự',
            'address.max' => 'Địa chỉ sinh viên phải nhỏ hơn :max ký tự',
            'birthday.required' => 'Ngày sinh sinh viên bắt buộc phải nhập',
        ];
        $request->validate($rules,$messages);
        $data = Student::find($id);
        $data->update([
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'address'  => $request->address,
        ]);
        return redirect("/students/list");

    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data= Student::find($id);
        $data->delete();
        return redirect("/students/list");
    }
}
