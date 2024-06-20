<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\SUpport\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $user = User::all()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $deliverd = Order::where('status','Delivered')->get()->count();

        return view('admin.index',compact('user','product','order','deliverd'));
    }

    public function home()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        }

        else
        {
            $count = '';
        }    

        return view ('home.index',compact('product','count'));
    }
    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }
    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();
        }

        else
        {
            $count = '';
        }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added to Cart Successfully!');

        return redirect()->back();

    }

    public function mycart()
    {
        if(Auth::id())
        {
        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id', $userid)->count();

        $cart = Cart::where('user_id',$userid)->get();
        }

        else
        {
            $count = '';
        }

        return view('home.mycart',compact('count','cart'));
    }

    public function delete_cart($id)
    {
        $cart = Cart::find($id);

        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Item removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Item not found in cart.');
        }
    }


    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id',$userid)->get();
        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name =$name;
            $order->rec_address =$address;
            $order->phone =$phone;

            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();

            toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered Successfully!');
           
            return redirect()->back();


        }

        
    }

    
}

