<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $fillable = ['user_id', 'book_id', 'quantity', 'total_price'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        // Tìm mã giảm giá trong database
        $coupon = Voucher::where('code', $couponCode)->first();

        if ($coupon) {
            // Tính toán giá trị giảm giá
            $discount = $coupon->discount;
            $totalPrice = Cart::getTotalPrice() - $discount;

            return response()->json([
                'success' => true,
                'discount' => $discount,
                'totalPrice' => $totalPrice,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mã giảm giá không hợp lệ'
            ]);
        }
    }
}
