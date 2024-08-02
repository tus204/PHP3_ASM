<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.admin.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = new User($validated);
        $user->role = 'admin';

        // Save the image
        $image = $request->file('photo');
        $imageName = $image->hashName();
        $image->move(public_path('images'), $imageName);

        // Create a new book instance with validated data
        $user = new User($validated);
        $user->photo = $imageName;
        // if ($request->hasFile('photo')) {
        //     $path = $request->file('photo')->store('photos');
        //     $user->photo = $path;
        // }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Admin added successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.admin.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Xóa ảnh cu 
            if ($user->photo && file_exists(public_path('images/' . $user->photo))) {
                unlink(public_path('images/' . $user->photo));
            }
            

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $user->photo = $imageName;

            // Cập nhật ảnh trong comment
            Comment::where('account_id', $user->id)->update(['photo' => $imageName]);
        }

        $user->save();
        

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->photo) {
            Storage::delete($user->photo);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function ban($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->ban = true;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User banned successfully');
    }

    public function unban($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->ban = false;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User unbanned successfully');
    }

    public function createUser()
    {
        return view('users.admin.createUser');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:100',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = new User($validated);
        $user->role = 'user';

        // Save the image
        $image = $request->file('photo');
        $imageName = $image->hashName();
        $image->move(public_path('images'), $imageName);

        // Create a new book instance with validated data
        $user = new User($validated);
        $user->photo = $imageName;

        // if ($request->hasFile('photo')) {
        //     $path = $request->file('photo')->store('photos');
        //     $user->photo = $path;
        // }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }

    // Cho phép người dùng tự chỉnh sửa 
    public function editAccount()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('account.edit', compact('user'));
    }

    public function updateAccount(Request $request)
{
    $id = Auth::id();
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'nullable|string|max:255',
        'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
        'phone' => 'nullable|string|max:15',
        'gender' => 'nullable|string|max:3',
        'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'dayOfBirth' => 'nullable|string|min:6|',
        'address' => 'nullable|string|min:6|',
    ]);

    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->phone = $request->input('phone');
    $user->gender = $request->input('gender');
    $user->email = $request->input('email');
    $user->dayOfBirth = $request->input('dayOfBirth');
    $user->address = $request->input('address');

    if ($request->hasFile('photo')) {
        if ($user->photo && file_exists(public_path('images/' . $user->photo))) {
            unlink(public_path('images/' . $user->photo));
        }

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);
        $user->photo = $imageName;

          // Cập nhật ảnh trong comment
          Comment::where('account_id', $user->id)->update(['photo' => $imageName]);
    }

    $user->save();

    return redirect()->route('home')->with('success', 'Thông tin tài khoản đã được cập nhật.');
}


    public function changePassword(Request $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.'])->withInput();
        }

        // Kiểm tra xác nhận mật khẩu mới
        if ($request->new_password !== $request->new_password_confirmation) {
            return back()->withErrors(['new_password_confirmation' => 'Xác nhận mật khẩu mới không khớp.'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Đổi mật khẩu thành công.');
    }
}
