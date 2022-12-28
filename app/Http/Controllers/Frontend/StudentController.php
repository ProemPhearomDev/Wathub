<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    //
    public function ViewStudent()
    {
        $students = Student::latest()->get();
        return view('Frontend-Layout.students.index', compact('students'))->with('i');
    }
    public function CreateStudent()
    {
        return view('Frontend-Layout.students.create');
    }
    //store data
    public function StoreStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => '',
            'gender' => '',
            'date_in' => '',
            // 'date_out' => '',
            'old' => '',
            'address' => '',
            'role' => 'required',
            'status' => '',
            'phone' => '',
            'note' => '',
            'student_image' => 'required',
        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'dob.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'role.required' => 'សូមបញ្ចូលតួនាទី!',
            'student_image.required' => 'សូមបញ្ចូលរូបភាព!',
        ]);

        $image = $request->file('student_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
        Image::make($image)->resize(300, 300)->save('upload/student_img/' . $name_gen);
        $save_url = 'upload/student_img/' . $name_gen;

        Student::insert([
            'name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'date_in' => $request->date_in,
            // 'date_out' => $request->date_out,
            'old' => $request->old,
            'address' => $request->address,
            'role' => $request->role,
            'status' => 1,
            'phone' => $request->phone,
            'note' => $request->note,
            // 'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
            'student_image' => $save_url,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.student')->with($notification);
    }
    // edit
    public function StudentEdit($id)
    {
        $student = Student::FindOrFail($id);
        return view('Frontend-Layout.students.edit', compact('student'));
    }
    public function StudentUpdate(Request $request)
    {
        $student_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('student_image')) {

            $request->validate([
                'name' => 'required',
                'dob' => '',
                'date_in' => '',
                'gender' => '',
                // 'date_out' => '',
                'old' => 'required',
                'address' => '',
                'role' => 'required',
                'status' => '',
                'phone' => '',
                'note' => '',
                'student_image' => 'required',
            ], [
                'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
                'dob.required' => 'សូមបញ្ចូលថ្ងៃ-ខែ-ឆ្នាំកំណើត!',
                'role.required' => 'សូមបញ្ចូលតួនាទី!',
                'student_image.required' => 'សូមបញ្ចូលរូបភាព!',
            ]);
            @unlink($old_img);
            $image = $request->file('student_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
            Image::make($image)->resize(300, 300)->save('upload/student_img/' . $name_gen);
            $save_url = 'upload/student_img/' . $name_gen;

            Student::FindOrFail($student_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'date_in' => $request->date_in,
                // 'date_out' => $request->date_out,
                'old' => $request->old,
                'address' => $request->address,
                'role' => $request->role,
                'status' => 1,
                'phone' => $request->phone,
                'note' => $request->note,
                'student_image' => $save_url,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated Successfully with new image!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.student')->with($notification);

            // save without new image
        } else {

            Student::FindOrFail($student_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'date_in' => $request->date_in,
                'gender' => $request->gender,
                // 'date_out' => $request->date_out,
                'old' => $request->old,
                'address' => $request->address,
                'role' => $request->role,
                'status' => 1,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated without add new image Successfully!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.student')->with($notification);
        }
    }
    // // Active
    public function Active($id)
    {
        Student::findOrFail($id)->update(['status' => 0]);

        //alert toastr msg
        $notification = array(
            'message' => "Student is Leave",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // // Active
    public function Inactive($id)
    {
        Student::findOrFail($id)->update(['status' => 1]);

        //alert toastr msg
        $notification = array(
            'message' => "Student is Stay in",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // Delete
    public function StudentDelete($id)
    {
        $students = Student::findOrFail($id);
        $img = $students->student_image;
        // remove image
        @unlink($img);
        // delte brand
        $students = Student::findOrFail($id)->delete();

        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.student')->with($notification);
    }
}
