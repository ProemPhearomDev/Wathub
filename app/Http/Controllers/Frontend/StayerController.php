<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Stayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class StayerController extends Controller
{
    //
    public function ViewStayer()
    {
        $stayers = Stayer::latest()->get();
        return view('Frontend-Layout.stayers.index', compact('stayers'))->with('i');
    }
    public function CreateStayer()
    {
        return view('Frontend-Layout.stayers.create');
    }
    //store data
    public function StoreStayer(Request $request)
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
            'status' => 'required',
            'phone' => '',
            'note' => '',
            'stayer_image' => 'required',
        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'dob.required' => 'សូមបញ្ចូលឈ្មោះ!',
            'role.required' => 'សូមបញ្ចូលតួនាទី!',
            'status.required' => 'សូមបញ្ចូលស្ថានភាព!',
            'stayer_image.required' => 'សូមបញ្ចូលរូបភាព!',
        ]);

        $image = $request->file('stayer_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
        Image::make($image)->resize(300, 300)->save('upload/stayers_img/' . $name_gen);
        $save_url = 'upload/stayers_img/' . $name_gen;

        Stayer::insert([
            'name' => $request->name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'date_in' => $request->date_in,
            // 'date_out' => $request->date_out,
            'old' => $request->old,
            'address' => $request->address,
            'role' => $request->role,
            'status' => $request->status,
            'phone' => $request->phone,
            'note' => $request->note,
            // 'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_slug_en)),
            'stayer_image' => $save_url,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.stayer')->with($notification);
    }
     // edit
     public function StayerEdit($id)
     {
         $stayer = Stayer::FindOrFail($id);
         return view('Frontend-Layout.stayers.edit', compact('stayer'));
     }
     public function StayerUpdate(Request $request)
    {
        $stayer_id = $request->id;
        $old_img = $request->old_image;
        if ($request->file('stayer_image')) {

            $request->validate([
                'name' => 'required',
                'dob' => '',
                'date_in' => '',
                'gender' => '',
                // 'date_out' => '',
                'old' => 'required',
                'address' => '',
                'role' => 'required',
                'status' => 'required',
                'phone' => '',
                'note' => '',
                'stayer_image' => 'required',
            ], [
                'name.required' => 'សូមបញ្ចូលឈ្មោះ!',
                'dob.required' => 'សូមបញ្ចូលថ្ងៃ-ខែ-ឆ្នាំកំណើត!',
                'role.required' => 'សូមបញ្ចូលតួនាទី!',
                'status.required' => 'សូមបញ្ចូលស្ថានភាព!',
                'stayer_image.required' => 'សូមបញ្ចូលរូបភាព!',
            ]);
            @unlink($old_img);
            $image = $request->file('stayer_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //hexdec generate image
            Image::make($image)->resize(300, 300)->save('upload/stayers_img/' . $name_gen);
            $save_url = 'upload/stayers_img/' . $name_gen;

            Stayer::FindOrFail($stayer_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'date_in' => $request->date_in,
                // 'date_out' => $request->date_out,
                'old' => $request->old,
                'address' => $request->address,
                'role' => $request->role,
                'status' => $request->status,
                'phone' => $request->phone,
                'note' => $request->note,
                'stayer_image' => $save_url,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated Successfully with new image!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.stayer')->with($notification);

            // save without new image
        } else {

            Stayer::FindOrFail($stayer_id)->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'date_in' => $request->date_in,
                'gender' => $request->gender,
                // 'date_out' => $request->date_out,
                'old' => $request->old,
                'address' => $request->address,
                'role' => $request->role,
                'status' => $request->status,
                'phone' => $request->phone,
                'note' => $request->note,
            ]);

            //alert toast msg
            $notification = array(
                'message' => "Updated without add new image Successfully!",
                'alert-type' => 'info'
            );

            return redirect()->route('all.stayer')->with($notification);
        }
    }
    // Delete
    public function StayerDelete($id)
    {
        $stayers = Stayer::findOrFail($id);
        $img = $stayers->stayer_image;
        // remove image
        @unlink($img);
        // delte brand
        $stayers = Stayer::findOrFail($id)->delete();
        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.stayer')->with($notification);
    }
}
