<?php
//authController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Task;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }


    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $users = User::all();  /
            return view('dashboard', compact('users'));  
        }
    
        // Для обычных пользователей
        $tasks = Task::with('category')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function manageUsers()
    {
        // Получаем всех пользователей
        $users = User::all();

        // Передаем переменную $users в представление
        return view('dashboard', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }
    public function showUser(User $user)
    {
        if (Auth::user()->isAdmin()) {
            return view('user.profile', compact('user'));
        }

        return redirect()->route('dashboard');
    }

    public function storeRegister(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    

    public function login() {
        return view('auth.login');
    }

    public function storeLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не совпадают с нашими записями.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    Gate::define('admin', function ($user) {
        return $user->isAdmin();
    });
}
