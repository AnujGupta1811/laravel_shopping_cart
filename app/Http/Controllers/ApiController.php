<?php
// Laravel ApiController
namespace App\Http\Controllers;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Google_Client;

class ApiController extends Controller
{
    public function datasend()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true, 'data' => $credentials], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials', 'email' => $request->email], 401);
        }
    }
    public function register(Request $request)
    {
        $verificationCode = rand(100000, 999999);
        $user = User::create([
            'firstname' => $request->name,
            'lastname' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'cpassword' => $request->cpassword,
            'verification_code' => $verificationCode,
        ]);
        Mail::to($user->email)->send(new RegistrationMail($user));
        return response()->json(['message' => 'Registration successful!', 'data' => $user], 201);
    }
    public function verifyEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && $user->verification_code === $request->verificationCode) {
            return response()->json(['success' => true, 'message' => 'Email verified successfully!'], 200);
        }
        return response()->json(['success' => false, 'message' => $user->verification_code, 'dat' => $request->verificationCode], 401);
    }
    
    function product()
    {
        $products = Product::inRandomOrder()->take(6)->get();
        return response()->json([
            'products' => $products,
        ]);
    }
    function productsByCategory($categoryId = null)
    {
        $products = Product::where('category_id', $categoryId)->get();
        return response()->json([
            'products' => $products,
        ]);
    }
    function productsById($id = null) {
        $product = Product::findOrFail($id);
        if($product) {
            return response()->json([
                'product' => $product,
            ]);
        }
        else{
            return response()->json([
                'product' => 'data not found',
            ]);
        }
       
    }
    public function addToCart(Request $request)
    {
        if (Auth::check()) { 
            $user = Auth::user();
            Cart::create([
                'user_id' => $user->id,
                'title' => $request->id,
                'price' =>'100' ,
                'pimage' =>'img.3.jpg' ,
                'product_id' => $request->id,
                'quantity' => 1,
            ]);
            return response()->json(['success' => true, 'message' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'User not authenticated.'], 401);
        }
    }

}