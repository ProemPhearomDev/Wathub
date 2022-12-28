<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Village;
use Intervention\Image\Facades\Image;

class ComissionController extends Controller
{
    //
    public function ViewComission()
    {
        $comissions = Comission::latest()->get();
        return view('Frontend-Layout.comissions.index', compact('comissions'))->with('i');
    }
    public function CreateComission()
    {
        $villages = Village::all();
        return view('Frontend-Layout.comissions.create', compact('villages'));
    }
    //store data
    public function StoreComission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => '',
            'gender' => '',
            'date_becam_comis' => '',
            'role' => 'required',
            'status' => '',
            'village_id' => 'required|numeric',
            'phone' => '',
            'note' => '',
            'comission_image' => 'required',
        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'dob.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'role.required' => 'សូមបញ្ចូលតួនាទី!',
            'comission_image.required' => 'សូមបញ្ចូលរូបភាព!',
        ]);

        $image = $request->file('comission_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
        Image::make($image)->resize(300, 300)->save('upload/comission_img/' . $name_gen);
        $save_url = 'upload/comission_img/' . $name_gen;

        Comission::insert([
            'name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'date_becam_comis' => $request->date_becam_comis,
            'role' => $request->role,
            'status' => 1,
            'phone' => $request->phone,
            'village_id' => $request->village_id,
            'note' => $request->note,
            // 'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
            'comission_image' => $save_url,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.comission')->with($notification);
    }
    // edit
    public function ComissionEdit($id)
    {
        $villages = Village::all();
        $comission = Comission::FindOrFail($id);
        return view('Frontend-Layout.comissions.edit', compact('comission','villages'));
    }
    public function ComissionUpdate(Request $request)
    {
        $comission_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('comission_image')) {

            $request->validate([
                'name' => 'required',
                'dob' => '',
                'gender' => '',
                'date_becam_comis' => '',
                'role' => 'required',
                'status' => '',
                'village_id' => 'required|numeric',
                'phone' => '',
                'note' => '',
                'comission_image' => 'required',
            ], [
                'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
                'dob.required' => 'សូមបញ្ចូលថ្ងៃ-ខែ-ឆ្នាំកំណើត!',
                'role.required' => 'សូមបញ្ចូលតួនាទី!',
                'comission_image.required' => 'សូមបញ្ចូលរូបភាព!',
            ]);
            @unlink($old_img);
            $image = $request->file('comission_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
            Image::make($image)->resize(300, 300)->save('upload/comission_img/' . $name_gen);
            $save_url = 'upload/comission_img/' . $name_gen;

            Comission::FindOrFail($comission_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'date_becam_comis' => $request->date_becam_comis,
                'role' => $request->role,
                'status' => 1,
                'village_id' => $request->village_id,
                'phone' =>$request->phone,
                'note' => $request->note,
                // 'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
                'comission_image' => $save_url,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated Successfully with new image!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.comission')->with($notification);

            // save without new image
        } else {

            Comission::FindOrFail($comission_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'date_becam_comis' => $request->date_becam_comis,
                'role' => $request->role,
                'status' => 1,
                'village_id' => $request->village_id,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated without add new image Successfully!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.comission')->with($notification);
        }
    }
    // // Active
    public function Active($id)
    {
        Comission::findOrFail($id)->update(['status' => 0]);

        //alert toastr msg
        $notification = array(
            'message' => "Comission is update Successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // // Active
    public function Inactive($id)
    {
        Comission::findOrFail($id)->update(['status' => 1]);

        //alert toastr msg
        $notification = array(
            'message' => "Comission is update Successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // Delete
    public function ComissionDelete($id)
    {
        $comissions = Comission::findOrFail($id);
        $img = $comissions->comission_image;
        // remove image
        @unlink($img);
        // delte brand
        $comissions = Comission::findOrFail($id)->delete();

        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.comission')->with($notification);
    }
}
