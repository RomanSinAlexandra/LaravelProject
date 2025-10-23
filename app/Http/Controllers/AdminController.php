<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // всі методи потребують авторизації
    }

    // 🏠 Головна сторінка адмін-панелі
    public function index()
    {
        // Підрахунок користувачів і товарів для статистики
        $usersCount = User::count();
        $productsCount = Product::count();

        return view('admin.admin', compact('usersCount', 'productsCount'));
    }

    // 🔹 Користувачі
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // 🔹 Товари
    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    // Редагування користувача
    public function editUser($id)
    {
        $user = User::findOrFail($id); // отримуємо користувача або помилка 404
        return view('admin.edit-user', compact('user'));
    }

    // Оновлення користувача
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Додаткові поля, якщо потрібно

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Користувача оновлено');
    }

    // Редагування продукту
    public function editProduct($id)
    {
        $product = Product::findOrFail($id); // отримуємо продукт або помилка 404
        return view('admin.edit-product', compact('product')); // не "edit-product"
    }

    // Оновлення продукту
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description'); // якщо є опис
        // додаткові поля продукту

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Товар оновлено');
    }
}
