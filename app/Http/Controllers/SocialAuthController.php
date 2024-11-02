<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();

            // Kiểm tra xem người dùng đã tồn tại chưa
            $user = User::where('provider_id', $socialUser->getId())->first();

            if (!$user) {
                // Tạo người dùng mới nếu chưa tồn tại
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'provider' => 'google',
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                    'password' => bcrypt(Str::random(16)), // Sử dụng Str::random()
                ]);
            }

            // Đăng nhập người dùng
            Auth::login($user);

            return redirect()->route('dashboard')->with('success',  'Đăng nhập thành công.');
        } catch (\Exception $e) {
            // Log lỗi để kiểm tra chi tiết
            \Log::error($e->getMessage());
            return redirect()->route('login')->with('error', 'Đăng nhập không thành công.');
        }
    }
}
