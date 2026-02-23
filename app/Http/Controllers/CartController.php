<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // المنتج

class CartController extends Controller
{
    // -----------------------
    // 1️⃣ عرض محتوى السلة
    // -----------------------
    public function cart() {
        // جلب السلة من الجلسة، إذا ما كايناش ترجع مصفوفة فارغة
        $cart = session()->get('cart', []);

        // إرسال السلة للصفحة cart.blade.php
        return view('cart', compact('cart'));
    }

    // -----------------------
    // 2️⃣ إضافة منتج للسلة
    // -----------------------
    public function addToCart($id) {
        $product = Article::find($id); // جلب المنتج من قاعدة البيانات
        $cart = session()->get('cart', []); // جلب السلة الحالية

        // إذا المنتج موجود بالفعل في السلة → زيادة الكمية
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // إذا المنتج جديد → إضافته للسلة
            $cart[$id] = [
                'name' => $product->titre,   // الاسم
                'price' => $product->prix,   // السعر
                'quantity' => 1,             // الكمية الأولية
                'photo' => $product->image   // الصورة
            ];
        }

        // حفظ السلة في الجلسة
        session()->put('cart', $cart);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

    // -----------------------
    // 3️⃣ تعديل كمية منتج في السلة
    // -----------------------
    public function updateCart(Request $request) {
        $cart = session()->get('cart', []);

        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour');
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }

    // -----------------------
    // 4️⃣ حذف منتج من السلة
    // -----------------------
    public function removeFromCart(Request $request) {
        $cart = session()->get('cart', []);

        if(isset($cart[$request->id])) {
            unset($cart[$request->id]); // حذف المنتج
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produit supprimé');
        }

        return redirect()->back()->with('error', 'Produit non trouvé dans le panier');
    }
}