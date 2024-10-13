<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product; // استيراد نموذج Product
use App\Models\User; // استيراد نموذج User
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * عرض جميع الأوامر.
     */
    public function index()
    {
        $orders = Order::with('user', 'orderItems.product')->get(); // اضافة orderItems
        return view('orders.index', compact('orders'));
    }

    /**
     * عرض نموذج إضافة طلب جديد.
     */
    public function create()
    {
        $users = User::all(); // احصل على جميع المستخدمين
        $products = Product::all(); // احصل على جميع المنتجات
      

        return view('orders.create', compact('users', 'products'));
    }

    /**
     * تخزين الطلب الجديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,shipped,completed',
            'total_amount' => 'required|numeric',
            'products' => 'nullable|array',
            'products.*' => 'exists:products,id',
        ]);

        // إنشاء الطلب
        $order = Order::create([
            'user_id' => $validatedData['user_id'],
            'status' => $validatedData['status'],
            'total_amount' => $validatedData['total_amount'],
            'order_date' => now(),
        ]);

        // إضافة المنتجات إلى الطلب (إذا تم تحديدها)
        if (!empty($validatedData['products'])) {
            foreach ($validatedData['products'] as $productId) {
                $order->orderItems()->create([
                    'product_id' => $productId,
                    'quantity' => 1, // يمكنك تعديل الكمية حسب متطلباتك
                    'price' => Product::find($productId)->price,
                ]);
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * تعديل الطلب.
     */
    public function edit(Order $order)
    {
        $users = User::all(); // احصل على جميع المستخدمين
        $products = Product::all(); // احصل على جميع المنتجات
        return view('orders.edit', compact('order', 'users', 'products'));
    }

    /**
     * تحديث الطلب.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,shipped,completed',
            'total_amount' => 'required|numeric',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * حذف الطلب.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
