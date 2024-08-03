<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function showCartTable()
    {
        $products = Produk::all();

        return view('cart', compact('products'));
    }
    public function addToCart($id)
    {
        $product = Produk::find($id);

        if (!$product) {

            abort(404);
        }

        $cart = session()->get('cart');

        if (!$cart) {

            $cart = [
                $id => [
                    "nama" => $product->nama,
                    "quantity" => 1,
                    "harga" => $product->harga,
                    "gambar" => $product->gambar
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "nama" => $product->nama,
            "quantity" => 1,
            "harga" => $product->harga,
            "gambar" => $product->gambar
        ];

        session()->put('cart', $cart);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeCartItem(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back();
    }

    public function showProducts()
    {
        $products = Produk::all();
        return view('welcome', compact('produck'));
    }

    public function home()
    {
        $products = Produk::all();
        return view('home', compact('products'));
    }
}
