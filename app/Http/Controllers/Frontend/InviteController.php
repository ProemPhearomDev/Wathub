<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Monk;
use App\Models\Invite;
use App\Models\Village;
use App\Models\MultiMonk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class InviteController extends Controller
{
    //view
    public function viewInvite()
    {
        $invites = Invite::latest()->get();
        return view('Frontend-Layout.Invite.index', compact('invites'))->with('i');
    }

    public function CreateInvite()
    {
        $villages = Village::all();
        // $monks = Monk::all();
        return view('Frontend-Layout.Invite.create', compact('villages'));
    }
    public function StoreInvite(Request $request)
    {

        $request->validate([
            'bun_name' => 'required',
            'person_name' => '',
            'date' => 'required',
            'address' => '',
            'village_id' => 'required',
            'monk_name' => 'required',
            // 'monk_id' => 'required',
            'note' => '',

        ], [
            'bun_name.required' => 'សូមបញ្ចូលឈ្មោះកម្មវីធីបុណ្យ!',
            'date.required' => 'សូមបញ្ចូលថ្ងៃ​ ទី!',
            'village_id.required' => 'សូមជ្រើសរើសភូមិ!',
            'monk_name.required' => 'សូមជ្រើសរើសព្រះសង្ឃ!',
        ]);

        Invite::insert([
            'bun_name' => $request->bun_name,
            'person_name' => $request->person_name,
            'date' => $request->date,
            'address' => $request->address,
            'monk_name' => $request->monk_name,
            'village_id' => $request->village_id,
            // 'monk_id' => $request->monk_id,
            'note' => $request->note,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.invite')->with($notification);
    }
    // edit
    public function InviteEdit($id)
    {
        $villages = Village::all();
        $invite = Invite::FindOrFail($id);
        return view('Frontend-Layout.Invite.edit', compact('invite', 'villages'));
    }
    public function InviteUpdate(Request $request)
    {
        $invite_id = $request->id;
        $request->validate([
            'bun_name' => 'required',
            'person_name' => '',
            'date' => 'required',
            'address' => '',
            'village_id' => 'required',
            'monk_name' => 'required',
            // 'monk_id' => 'required',
            'note' => '',

        ], [
            'bun_name.required' => 'សូមបញ្ចូលឈ្មោះកម្មវីធីបុណ្យ!',
            'date.required' => 'សូមបញ្ចូលថ្ងៃ​ ទី!',
            'village_id.required' => 'សូមជ្រើសរើសភូមិ!',
            'monk_name.required' => 'សូមជ្រើសរើសព្រះសង្ឃ!',
        ]);

        Village::FindOrFail($invite_id)->update([
            'bun_name' => $request->bun_name,
            'person_name' => $request->person_name,
            'date' => $request->date,
            'address' => $request->address,
            'monk_name' => $request->monk_name,
            'village_id' => $request->village_id,
            // 'monk_id' => $request->monk_id,
            'note' => $request->note,
        ]);
        //alert toast msg
        $notification = array(
            'message' => "Updated Invite Successfully!",
            'alert-type' => 'info'
        );
        return redirect()->route('all.invite')->with($notification);
    }
    // Delete
    public function InviteDelete($id)
    {
        $invites = Invite::findOrFail($id)->delete();

        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.invite')->with($notification);
    }
}
