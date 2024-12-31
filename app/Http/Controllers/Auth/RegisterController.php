<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'remember_token' => now()
            ]);

            DB::commit();

            return redirect('/login')->with('success', 'Berhasil Mendaftar, Silahkan Login ' . $user['name']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal Mendaftar' . $e->getMessage());
        }
    }
}
