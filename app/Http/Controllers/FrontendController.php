<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->category) {
            $pizzas = Pizza::latest()->get();
            return view('frontpage', compact('pizzas'));
        }
        $pizzas = Pizza::where('category', $request->category)->get();
        return view('frontpage', compact('pizzas'));
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);
        return view('show', compact('pizza'));
    }

    public function store(Request $request)
    {
        if ($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0) {
            return back()->with('errmessage', 'Please order atleast one pizza');
        }
        if ($request->small_pizza || 0 && $request->medium_pizza || 0 && $request->large_pizza || 0) {
            return back()->with('errmessage', 'Order should not have negative number');
        }
        $order = new Order;
        $order->time = $request->time;
        $order->date = $request->date;
        $order->user_id = Auth()->user()->id;
        $order->pizza_id = $request->pizza_id;
        $order->small_pizza = $request->small_pizza;
        $order->medium_pizza = $request->medium_pizza;
        $order->large_pizza = $request->large_pizza;
        $order->body = $request->body;
        $order->phone = $request->phone;
        $order->save();

        return back()->with('message', 'Your order is successfully');
    }
}
