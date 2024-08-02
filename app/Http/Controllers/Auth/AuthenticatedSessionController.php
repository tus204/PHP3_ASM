<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Kiểm tra xác thực đăng nhập
        $request->authenticate();

        // Làm mới session
        $request->session()->regenerate();

        // Kiểm tra người dùng đã đăng nhập chưa
        if (auth()->check()) {
            // Kiểm tra nếu người dùng bị cấm
            $user = auth()->user();
            if ($user->ban === 1) {
                // Đăng xuất người dùng
                Auth::logout();
                // Chuyển hướng người dùng đến trang đăng nhập và hiển thị thông báo lỗi
                return redirect()->route('login')->with([
                    'error' => 'Tài khoản của bạn đã bị cấm. Vui lòng liên hệ với quản trị viên.'
                ]);
            }
        
            // Kiểm tra vai trò của người dùng và chuyển hướng đến trang tương ứng
            if ($user->role === 'admin') {
                return redirect()->route('home.admin');
            }
        }

        return redirect()->route('home');
    }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
