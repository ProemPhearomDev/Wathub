<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    //
    // Show User-info
    public function ViewUser()
    {
        $users = User::latest()->paginate(5);
        return view('Frontend-Layout.users.index', compact('users'))->with('i');
    }
    // add user
    public function CreateUser()
    {
        return view('Frontend-Layout.users.create');
    }
    public function StoreUser(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => '',
            'password' => 'required|confirmed|min:8',
            'profile_photo_path' => '',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        if ($request->file('profile_photo_path')) {
            // remove old image if have
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_img'), $filename);
            $user['profile_photo_path'] = $filename;
        }
        $user->save();
        //alert toast msg
        $notification = array(
            'message' => "User Profile Updated Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.user')->with($notification);
    }
    // add user
    public function UserEdit($id)
    {
        $user = User::find($id);
        return view('Frontend-Layout.users.edit', compact('user'));
    }
    public function UserUpdate(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => '',
            'password' => 'required|confirmed|min:8',
            'profile_photo_path' => '',
        ]);
        $user = User::FindOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        // $user->password = Hash::make($request->password);
        if ($request->file('profile_photo_path')) {
            // remove old image if have
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $user['profile_photo_path'] = $filename;
        }
        $user->update();
        //alert toast msg
        $notification = array(
            'message' => "User Updated Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('all.user')->with($notification);
    }
    //DELETE
    public function UserDelete($id)
    {

        $users = User::findOrFail($id);
        $img = $users->image;
        // remove image
        @unlink($img);
        // deleted
        if ($users != null) {
            // delte brand
            $users = User::findOrFail($id)->delete();
            //alert toast msg
            $notification = array(
                'message' => "User Deleted Successfully",
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
    // User function 
    public function UserSearch(Request $request)
    {
        $output = "";
        $user = User::where('name', 'Like', '%' . $request->search . '%')
            ->orWhere('email', 'Like', '%' . $request->search . '%')
            ->orWhere('phone', 'Like', '%' . $request->search . '%')
            ->orWhere('created_at', 'Like', '%' . $request->search . '%')->get();

        if (count($user) > 0) {

            foreach ($user as $user) {
                $output .=
                    '
                    <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-sm mr-2"><img
                                        class="avatar-img rounded-circle"
                                        src="' . url('upload/user_img/' . $user->profile_photo_path) . '"
                                        alt="User Image"></a>
                            </h2>
                        </td>
                        <td>' .  $user->name . '</td>
                        <td>' . $user->email . ' </td>
                        <td> ' . $user->phone . ' </td>
                        <td>' . \Carbon\Carbon::parse($user['created_at'])->format('j \\ F Y')
                    . '</td>
                        <td class="text-right">
                            <div class="actions">
                                <!-- Delete -->
                                <a href="' . route('user.delete', $user->id) . '"
                                    class="btn btn-sm bg-danger-light" id="delete">
                                    <i class="fe fe-trash"></i> Delete
                                </a>
                                <!-- Delete -->
                            </div>
                        </td>
                    </tr>
                    ';
            }
        } else {
            return ($output) . '
            <div class="align-items-center mt-3"  onclick="window.location.reload()">
            <h3 class="text-center"><i class="bi bi-info-circle text-danger"></i></h3>
            <h6 class="text-danger text-center">????????????????????????!</h6>
            </div>
            ';
        }
        return response($output);
    }
}
