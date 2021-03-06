<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\Order;
use Illuminate\Support\Facades\DB;



/*
* function number one of th alert 
* $alert =alert('this is function','info'); the key of  call function
* message type is toast or sweet
*/   
function alert($type,$message,$message_type){  
    $notification = array(
        'alert-type' => $type,
        'message' => $message,
        'message_type'=> $message_type,
    );
    return  $notification;   
}

/*
* function of move and save image 
*   $path_img = $request->img; // the key of call function
*/
function image($path_image)
{
    $image = time() . '.' . $path_image->extension();
    $path_image->move(public_path('imges\products'), $image);
    return  $image;
}

/*
* function of get the Category
*   
*/
function categories(){
    $categories = Category::select('id', 'name', 'picture')->get();;
    return  $categories;
}



/*
* Function Of GET User 
*    
*/
function user()
{
    $user = User::find(userId());
    return  $user;
}

/*
* Function Of GET Product In Cart For User If Auth Is Suecsse
*   
*/
function yourCart(){
    $user = Auth::user()->id;
    $cart_item = Cart::where('user_id',$user)->paginate(100);
    return  $cart_item;
}

/*
* function of SUM the price product of users
*   
*/
function sumPrice(){
    $user = User::find(userId());
    $cart_item = $user->products->sum('selling_price');
    return  $cart_item;
}

/*
* Function Of GET Product In Cart For User If Auth Is Suecsse
*   
*/
function yourWishlist()
{
    $user = Auth::user()->id;
    $wishlist_item = Wishlist::where('user_id', $user)->paginate(100);
    return  $wishlist_item;
}

function checkWishlist($id){
    if(Auth::check()){
        $user = Auth::user()->id;
    }else{
         $user =0;
    }
    
    $wishlist_item = Wishlist::where('user_id', $user)->where('product_id',$id)->get();
    if(count($wishlist_item) == 0){
        return  'No';
    }
    else{
        return  'Yes';
    }
    
}

/*
* Function Of Check stutas of shipped    
*/

function checkShipped(){
    $order = Order::where('user_id',userId())
                    ->where('status',3)
                    ->count();
    if($order >=1){
        return 'yes';
    }else{
        return 'no';
    }                    
}

function conutOrder(){
    $order = Order::where('user_id', userId())
        ->where('status', 3)
        ->count();
    return $order;
}

// function of Top selling products
function topSellingProducts()
{
    $product_sold = Product::select('products.id', 'products.name', 'products.selling_price', 'products.thumbnail', DB::raw('count(*) as total'))
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->join('orders', 'order_details.order_id', '=', 'orders.id')
                        ->where('orders.status', 3)
                        ->orwhere('orders.status', 4)
                        ->groupBy('order_details.product_id')
                        ->orderBy('total', 'desc')
                        ->get();
    return $product_sold;
}






