<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('crud_user.login'); // Đảm bảo bạn có view login.blade.php trong thư mục crud_user
    }

    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kiểm tra thông tin đăng nhập
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Nếu thông tin đăng nhập đúng, chuyển hướng đến trang dashboard
            return redirect()->intended('dashboard')->with('success', 'Đăng nhập thành công!');
        }

        // Nếu thông tin đăng nhập sai, quay lại trang đăng nhập với thông báo lỗi
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng.');
    }

    public function dashboard()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            return view('dashboard'); // Trả về view dashboard
        }
        
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để truy cập trang này.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
    public function showRegistrationForm()
    {
        return view('crud_user.register'); // Đảm bảo bạn có file register.blade.php trong thư mục views/crud_user
    }

    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:1|confirmed',
        ]);

        // Nếu xác thực thất bại, trả về thông báo lỗi
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo người dùng mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect()->route('login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập.');
    }
}

