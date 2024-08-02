<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class VNPayController extends Controller
{
    /**
     * Phương thức này thực hiện xử lý việc thanh toán qua VNPay.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function vnpay_payment(Request $request)
    {
        $order = Order::find($request->order_id);
        
        
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Order not found.');
        }

        $vnp_TxnRef = $order->id; // Mã đơn hàng từ DB
        $vnp_OrderInfo = "Thanh Toan Hoa Don #" . $order->id; // Thông tin đơn hàng
        $vnp_Amount = $order->total_price * 100; 

        // URL và các thông tin bảo mật của VNPay
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay_return');
        $vnp_TmnCode = "M4UO5CU3"; // Mã website tại VNPAY 
        $vnp_HashSecret = "K9GLHGQV737Q13GWRGG22I6ZY61W2MS6"; // Chuỗi bí mật

        //  thông tin khác cho VNPay
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
       
        //  dữ liệu đầu vào cho VNPay
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        // Sắp xếp dữ liệu 
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        // Tạo URL thanh toán
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); 
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // Chuyển hướng người dùng đến URL thanh toán của VNPay
        return redirect($vnp_Url);
    }

    /**
     * Phương thức này xử lý phản hồi từ VNPay sau khi thanh toán.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function vnpay_return(Request $request)
    {
        // Lấy giá trị mã băm bảo mật 
        $vnp_SecureHash = $request->get('vnp_SecureHash');
        
        // Lấy tất cả các tham số từ request ngoại trừ mã băm bảo mật
        $inputData = $request->except('vnp_SecureHash', 'vnp_SecureHashType');

        // Sắp xếp dữ liệu đầu vào 
        ksort($inputData);
        $hashData = '';
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        // Tạo mã băm bảo mật 
        $vnp_HashSecret = "K9GLHGQV737Q13GWRGG22I6ZY61W2MS6";
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        // Kiểm tra tính hợp lệ của mã băm bảo mật
        if ($secureHash == $vnp_SecureHash) {
            // Xử lý khi thanh toán thành công
            $order = Order::find($request->vnp_TxnRef);
            if ($order) {
                $order->payment_confirmed = "already paid"; 
                $order->status = 'paid';
                $order->total_price = 0; 
                $order->save();
                return redirect()->route('orders.show', $order->id)->with('success', 'Payment successful!');
            }
        }
        // Xử lý khi thanh toán thất bại
        return redirect()->route('orders.show', $request->vnp_TxnRef)->with('error', 'Payment failed!');
    }
}
