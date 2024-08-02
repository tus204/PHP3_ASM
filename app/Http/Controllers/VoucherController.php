<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class VoucherController extends Controller
{
    //
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.admin.index', ['vouchers' => $vouchers]);
    }

    public function create()
    {
        return view('vouchers.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:vouchers,code|max:255',
            'total' => 'required|integer',
            'value' => 'required|integer',
            'expired_at' => 'required|date',
        ], [
            'name.required' => 'Tên Voucher là bắt buộc',
            'code.required' => 'Mã Voucher là bắt buộc và phải duy nhất',
            'total.required' => 'Số tiền là bắt buộc và phải là số nguyên',
            'value.required' => 'Giá trị là bắt buộc và phải là số nguyên',
            'expired_at.required' => 'Ngày hết hạn là bắt buộc',
        ]);
    
        $voucher = new Voucher($validated);
    
        $voucher->save();
    
        return redirect()->route('vouchers.index')->with('success', 'Voucher created successfully.');
    }

    public function edit(Voucher $voucher)
    {
        return view('vouchers.admin.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:vouchers,code,' . $voucher->id . '|max:255',
            'total' => 'required|integer',
            'value' => 'required|integer',
            'expired_at' => 'required|date',
        ]);

        $voucher->update($request->all());
        return redirect()->route('vouchers.index')->with('success', 'Voucher updated successfully.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('vouchers.index')->with('success', 'Voucher deleted successfully.');
    }
     // Hàm xử lý áp dụng mã giảm giá
     public function applyCoupon(Request $request)
     {
         $couponCode = $request->input('coupon_code');
         $voucher = Voucher::where('code', $couponCode)->first();
 
         //  mã giảm giá có hợp lệ, còn hạn và còn số lượng không
         if (!$voucher ) {
             return response()->json([
                 'success' => false,
                 'message' => 'Mã giảm giá không hợp lệ.'
             ]);
         }
            if ($voucher->expired_at < Date::now()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mã giảm giá đã hết hạn.'
                ]);
            }
         if ($voucher->total <= 0) {
             return response()->json([
                 'success' => false,
                 'message' => 'Mã giảm giá đã hết số lượng.'
             ]);
         }
         $voucher->total -= 1;
         $voucher->save();
         // Trả về giá trị 
         return response()->json([
             'success' => true,
             'discount' => $voucher->value
         ]);
     }
}
