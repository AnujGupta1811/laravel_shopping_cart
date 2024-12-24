<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function boot()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function registerform(Request $request)
    {
        // Validate input data
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Create a new user
        $user = User::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // Send a registration email
        Mail::to($user->email)->send(new RegistrationMail($user));

        // Redirect to login page with success message
        return redirect('login')->with('success', 'Registration successful! Please check your email.');
    }
    function loginform(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'login successful');
        } else {
            return redirect()->route('login')->with('error', 'login failed');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }

    public function PostByCategory(Request $request)
    {
        // Get the category_id from the query string
        $categoryId = $request->input('category_id');

        // Fetch posts filtered by the category_id
        $posts = Product::where('category_id', $categoryId)->get();

        // Pass the posts to the view
        return view('products', compact('posts'));
    }

    public function index()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

}
