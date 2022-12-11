<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    //
    public function ViewVillage()
    {
        $villages = Village::latest()->get();
        return view('Frontend-Layout.villages.index', compact('villages'))->with('i');
    }
    public function CreateVillage()
    {
        return view('Frontend-Layout.villages.create');
    }
    //store data
    public function StoreVillage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'note' => '',

        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះភូមិ!',
        ]);

        Village::insert([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        //alert toast msg
        $notification = array(
            'message' => "Create Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.village')->with($notification);
    }
    // edit
    public function VillageEdit($id)
    {
        $village = Village::FindOrFail($id);
        return view('Frontend-Layout.villages.edit', compact('village'));
    }
    public function VillageUpdate(Request $request)
    {
        $village_id = $request->id;
        $request->validate([
            'name' => 'required',
            'note' => '',

        ], [
            'name.required' => 'សូមបញ្ចូលឈ្មោះភូមិ!',
        ]);

        Village::FindOrFail($village_id)->update([
            'name' => $request->name,
            'note' => $request->note,
        ]);
        //alert toast msg
        $notification = array(
            'message' => "Updated Successfully!",
            'alert-type' => 'info'
        );
        return redirect()->route('all.village')->with($notification);
    }
    // Delete
    public function VillageDelete($id)
    {
        $villages = Village::findOrFail($id)->delete();

        //alert toast msg
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.village')->with($notification);
    }
}
