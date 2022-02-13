<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\Cart;
use App\Models\Admin\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Show the admin dashboard.
     */
    public function index(){

        $canceled_orders = Order::where('status',0)->count();
        $new_orders = Order::where('status', 1)->count();
        $processing_orders = Order::where('status', 2)->count();
        $shipped_orders = Order::where('status', 3)->count();
        $delivered_orders = Order::where('status', 4)->count();
        $all_product = Product::all()->count();
        $users = User::all()->except(userId())->count();
        $carts = Cart::all()->count();
        return view('admin.index',compact(
            'canceled_orders',
            'new_orders',
            'processing_orders',
            'shipped_orders',
            'delivered_orders',
            'all_product',
            'users',
            'carts',
        ));
    }
}