<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $userId = Auth::id();

        // Получаем товары корзины с продуктами
        $cartItems = CartItem::with('product')
            ->where('user_id', $userId)
            ->get();

        return view('cart', compact('cartItems'));
    }

    public function add($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = ($cart[$id] ?? 0) + 1;
        session(['cart' => $cart]);
        return back();
    }

    public function show()
    {
        $cart = session()->get('cart', []); // масив вигляду [id => ['name'=>..., 'price'=>..., 'quantity'=>...], ...]
        
        // Якщо хочеш, дістаємо продукти (опційно)
        $products = \App\Models\Product::findMany(array_keys($cart));

        // Порахуємо загальну суму
        $total = 0;
        foreach ($cart as $item) {
            // переконайся, що 'price' та 'quantity' існують
            $price = isset($item['price']) ? (float)$item['price'] : 0;
            $qty   = isset($item['quantity']) ? (int)$item['quantity'] : 0;
            $total += $price * $qty;
        }

        return view('cart.show', compact('cart', 'products', 'total'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        // Оновлюємо дані у cookies або сесії
        $cart = json_decode($request->cookie('cart', '{}'), true);
        
        if ($quantity <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id] = $quantity;
        }

        // Зберігаємо назад у cookie
        return response()->json(['status' => 'success'])
            ->cookie('cart', json_encode($cart), 60 * 24 * 7); // збереження на 7 днів
    }

    public function clear()
    {
        session()->forget('cart');
        return response()->json(['status' => 'success']);
    }
}

