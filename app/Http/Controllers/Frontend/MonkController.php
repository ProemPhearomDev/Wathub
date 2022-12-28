<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Monk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MonkController extends Controller
{
    //
    //
    //Monk 
    public function ViewMonk()
    {
        $monks = Monk::latest()->get();
        return view('Frontend-Layout.monks.index', compact('monks'))->with('i');
    }

    public function CreateMonk()
    {
        return view('Frontend-Layout.monks.create');
    }
    //store data
    public function MonkStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => '',
            'date_in' => '',
            'date_out' => '',
            'old' => '',
            'address' => '',
            'role' => 'required',
            'status' => '',
            'phone' => '',
            'note' => '',
            'monk_image' => 'required',
        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'dob.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'role.required' => 'សូមបញ្ចូលតួនាទី!',
            'monk_image.required' => 'សូមបញ្ចូលរូបភាព!',
        ]);

        $image = $request->file('monk_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
        Image::make($image)->resize(300, 300)->save('upload/monks_img/' . $name_gen);
        $save_url = 'upload/monks_img/' . $name_gen;

        Monk::insert([
            'name' => $request->name,
            'dob' => $request->dob,
            'date_in' => $request->date_in,
            'date_out' => $request->date_out,
            'old' => $request->old,
            'address' => $request->address,
            'role' => $request->role,
            'status' => 1,
            'phone' => $request->phone,
            'note' => $request->note,
            // 'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
            'monk_image' => $save_url,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.monk')->with($notification);
    }
    // edit
    public function MonkEdit($id)
    {
        $monk = Monk::FindOrFail($id);
        return view('Frontend-Layout.monks.edit', compact('monk'));
    }
    public function MonkUpdate(Request $request)
    {
        $monk_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('monk_image')) {

            $request->validate([
                'name' => 'required',
                'dob' => '',
                'date_in' => '',
                'date_out' => '',
                'old' => 'required',
                'address' => '',
                'role' => 'required',
                'status' => '',
                'phone' => '',
                'note' => '',
                'monk_image' => 'required',
            ], [
                'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
                'dob.required' => 'សូមបញ្ចូលថ្ងៃ-ខែ-ឆ្នាំកំណើត!',
                'role.required' => 'សូមបញ្ចូលតួនាទី!',
                'monk_image.required' => 'សូមបញ្ចូលរូបភាព!',
            ]);
            @unlink($old_img);
            $image = $request->file('monk_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
            Image::make($image)->resize(300, 300)->save('upload/monks_img/' . $name_gen);
            $save_url = 'upload/monks_img/' . $name_gen;

            Monk::FindOrFail($monk_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'date_in' => $request->date_in,
                'date_out' => $request->date_out,
                'old' => $request->old,
                'address' => $request->address,
                'role' => $request->role,
                'status' => 1,
                'phone' => $request->phone,
                'note' => $request->note,
                'monk_image' => $save_url,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated Successfully with new image!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.monk')->with($notification);

            // save without new image
        } else {

            Monk::FindOrFail($monk_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'date_in' => $request->date_in,
                'date_out' => $request->date_out,
                'old' => $request->old,
                'address' => $request->address,
                'role' => $request->role,
                'status' =>1,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated without add new image Successfully!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.monk')->with($notification);
        }
    }
    // // Active
    public function Active($id){
        Monk::findOrFail($id)->update(['status' => 0]);

         //alert toastr msg
         $notification = array(
            'message' => "Monk is update Successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // // Active
    public function Inactive($id){
        Monk::findOrFail($id)->update(['status' => 1]);

         //alert toastr msg
         $notification = array(
            'message' => "Monk is update Successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // Delete
    public function MonkDelete($id)
    {
        $monks = Monk::findOrFail($id);
        $img = $monks->monk_image;
        // remove image
        @unlink($img);
        // delte brand
        $monks = Monk::findOrFail($id)->delete();

        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.monk')->with($notification);
    }

      
}
