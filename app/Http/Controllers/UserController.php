<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $roles = Role::orderBy('id', 'DESC')->get();
    if ($request->ajax()) {
      $data = User::orderBy('created_at', 'DESC')->Where('name', 'LIKE', "%{$request->search}%")
        ->orWhere('email', 'LIKE', "%{$request->search}%")->paginate(10);
      return view('admin.users.dataTable', compact(['data', 'roles']))->render();
    } else {
      $data = User::orderBy('created_at', 'DESC')->paginate(10);
      return view('admin.users.index', compact(['data', 'roles']));
    }
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($data, [
      'email' => 'required|unique:users,email|max:255',
      'username' => 'required|unique:users,username|max:255',
      'password' => [
        'required',
        'string',
        'min:8',             // must be at least 8 characters in length
        'regex:/[a-z]/',      // must contain at least one lowercase letter
        'regex:/[A-Z]/',      // must contain at least one uppercase letter
        'regex:/[0-9]/',      // must contain at least one digit
        'regex:/[@$!%*#?&]/', // must contain a special character
      ],
    ], [
      'email.unique' => 'This Email address already exist!!'
    ]);
    if ($validator->fails()) {
      return redirect()->route('users.index')->withErrors($validator)->withInput();
    }
    $user = new User();
    $user->name = $data['name'];
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->password = Hash::make($data['password']);
    if ($user->save()) {
      $user->assignRole($data['role']);
      return redirect()->route('users.index')->with(['status' => 'success', 'message' => 'Insert Operation Successfully Done.']);
    } else {
      return redirect()->route('users.index')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
    }
  }

  public function edit(Request $request)
  {
    $res = User::with('roles')->where('id', $request->id)->first();
    $roles_name = trim($res->roles->pluck('name'), '[""]');
    $roles = Role::orderBy('id', 'DESC')->get();

    echo '<div class="modal-header">
    <h4 class="modal-title">User Detail Update Form</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="' . route("users.update") . '" method="POST">
    <input type="hidden" name="_token" value="' . csrf_token() . '" />
    <input type="hidden" name="id" value="' . $res->id . '" />
      <div class="card-body">
        <div class="form-group">
          <label for="location">Assign Role</label>
          <select type="text" class="form-control" name="role">
          <option value="' . $roles_name . '" hidden>' . $roles_name . '</option>';
    foreach ($roles as $role) {
      echo '<option value="' . $role->name . '">' . $role->name . '</option>';
    }
    echo '</select>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" value="' . $res->name . '" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" class="form-control" name="username" value="' . $res->username . '" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="' . $res->email . '" placeholder="Enter Email Address">
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>';
  }

  public function update(Request $request)
  {
    try {
      $data = $request->all();
      $user = User::find($data['id']);
      $user->name = $data['name'];
      $user->username = $data['username'];
      $user->email = $data['email'];
      if ($user->save()) {
        $user->syncRoles($data['role']);
        return redirect()->route('users.index')->with(['status' => 'success', 'message' => 'Update Operation Successfully Done.']);
      } else {
        return redirect()->route('users.index')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
      }
    } catch (\Throwable $e) {
      // dd($e->getMessage());
      return redirect()->route('users.index')->with(['status' => 'error', 'message' => $e->getMessage()]);
    }
  }


  public function changePassword()
  {
    return view('admin.users.password');
  }

  public function updatePassword(Request $request)
  {
    # Validation
    $request->validate([
      'old_password' => 'required',
      'new_password' => 'required|confirmed',
    ]);


    #Match The Old Password
    if (!Hash::check($request->old_password, auth()->user()->password)) {
      return back()->with("error", "Old Password Doesn't match!");
    }


    #Update the new Password
    User::whereId(auth()->user()->id)->update([
      'password' => Hash::make($request->new_password)
    ]);

    return back()->with("status", "Password changed successfully!");
  }

  public function destroy(Request $request)
  {
    $res = User::where('id', $request->id)->delete();
    if ($res) {
      $data = [
        'status' => 'success',
        'message' => 'Your Record has been deleted'
      ];
    } else {
      $data = [
        'status' => 'error',
        'message' => 'Something Wrong.!'
      ];
    }
    return response()->json($data);
  }
}
