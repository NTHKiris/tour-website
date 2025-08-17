<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function create(Booking $booking)
    {
        // Check if user owns this booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }
        
        // Load relationships
        $booking->load(['tour', 'tour.destination']);
        
        return view('payments.create', compact('booking'));
    }
    
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'payment_method' => 'required|in:vnpay,momo,bank_transfer,cash'
        ]);
        
        // Check if user owns this booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action');
        }
        
        // Create payment record
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'amount' => $booking->total_amount,
            'payment_method' => $request->payment_method,
            'transaction_id' => $this->generateTransactionId($booking),
            'status' => Payment::STATUS_PENDING,
        ]);
        
        // Route to specific payment method
        switch ($request->payment_method) {
            case 'vnpay':
                return $this->vnpay($payment);
            case 'momo':
                return $this->momo($payment);
            case 'bank_transfer':
                return $this->bankInfo($payment);
            case 'cash':
                return redirect()->route('bookings.show', $booking)
                    ->with('success', 'Đặt tour thành công! Vui lòng thanh toán tiền mặt khi gặp hướng dẫn viên.');
            default:
                return back()->with('error', 'Phương thức thanh toán không hợp lệ');
        }
    }
    
    public function vnpay(Payment $payment)
    {
        $booking = $payment->booking;
        
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_ReturnUrl = route('payments.vnpay.callback');
        $vnp_TmnCode = env('VNPAY_TMN_CODE');
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');

        $vnp_TxnRef = $payment->transaction_id;
        $vnp_OrderInfo = "Thanh toan dat tour " . $booking->tour->title;
        $vnp_OrderType = 'tourism';
        $vnp_Amount = $payment->amount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

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
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }
    
    public function momo(Payment $payment)
    {
        // MoMo payment integration
        $booking = $payment->booking;
        
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $secretKey = env('MOMO_SECRET_KEY');
        $orderInfo = "Thanh toán tour " . $booking->tour->title;
        $amount = (string)$payment->amount;
        $orderId = $payment->transaction_id;
        $redirectUrl = route('payments.momo.callback');
        $ipnUrl = route('payments.momo.callback');
        $requestType = "captureWallet";
        
        // Create signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $orderId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        
        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $orderId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'requestType' => $requestType,
            'signature' => $signature
        ];
        
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);
        
        if (isset($jsonResult['payUrl'])) {
            return redirect($jsonResult['payUrl']);
        } else {
            return back()->with('error', 'Không thể kết nối đến MoMo. Vui lòng thử lại.');
        }
    }
    
    public function bankInfo(Payment $payment)
    {
        $payment->load(['booking', 'booking.tour', 'booking.user']);
        return view('payments.bank-info', compact('payment'));
    }
    
    public function vnpayCallback(Request $request)
    {
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');
        $vnp_SecureHash = $request->vnp_SecureHash;
        
        $inputData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        
        if ($secureHash == $vnp_SecureHash) {
            $payment = Payment::where('transaction_id', $request->vnp_TxnRef)->first();
            
            if ($payment) {
                $payment->gateway_response = $request->all();
                
                // Handle different response codes
                switch ($request->vnp_ResponseCode) {
                    case '00': // Success
                        $payment->markAsCompleted();
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('success', 'Thanh toán thành công!');
                    
                    case '24': // Transaction cancelled by user
                        $payment->markAsFailed('Giao dịch bị hủy bởi người dùng');
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('error', 'Bạn đã hủy giao dịch thanh toán.');
                    
                    case '51': // Not enough balance
                        $payment->markAsFailed('Không đủ số dư');
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('error', 'Tài khoản của bạn không đủ số dư để thực hiện giao dịch.');
                    
                    case '65': // Account exceeded daily limit
                        $payment->markAsFailed('Vượt quá hạn mức giao dịch hàng ngày');
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('error', 'Tài khoản của bạn đã vượt quá hạn mức giao dịch hàng ngày.');
                    
                    case '75': // Payment bank is under maintenance
                        $payment->markAsFailed('Ngân hàng đang bảo trì');
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('error', 'Ngân hàng của bạn đang trong thời gian bảo trì. Vui lòng thử lại sau.');
                    
                    case '79': // Transaction timeout
                        $payment->markAsFailed('Giao dịch hết thời gian chờ');
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('error', 'Giao dịch đã hết thời gian chờ. Vui lòng thử lại.');
                    
                    default: // Other errors
                        $payment->markAsFailed('VNPay response code: ' . $request->vnp_ResponseCode);
                        return redirect()->route('bookings.show', $payment->booking)
                            ->with('error', 'Thanh toán thất bại. Mã lỗi: ' . $request->vnp_ResponseCode);
                }
            }
        }
        
        return redirect()->route('tours.index')
            ->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
    }
    
    public function momoCallback(Request $request)
    {
        $payment = Payment::where('transaction_id', $request->orderId)->first();
        
        if ($payment) {
            $payment->gateway_response = $request->all();
            
            // Handle different MoMo result codes
            switch ($request->resultCode) {
                case 0: // Success
                    $payment->markAsCompleted();
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('success', 'Thanh toán thành công!');
                
                case 1006: // User cancelled transaction
                    $payment->markAsFailed('Người dùng hủy giao dịch');
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('error', 'Bạn đã hủy giao dịch thanh toán.');
                
                case 1001: // User declined transaction
                    $payment->markAsFailed('Người dùng từ chối giao dịch');
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('error', 'Bạn đã từ chối thực hiện giao dịch.');
                
                case 1002: // Transaction failed
                    $payment->markAsFailed('Giao dịch thất bại');
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('error', 'Giao dịch thất bại. Vui lòng thử lại.');
                
                case 1003: // Transaction pending
                    // Keep status as pending
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('info', 'Giao dịch đang được xử lý. Vui lòng chờ xác nhận.');
                
                case 1004: // Invalid amount
                    $payment->markAsFailed('Số tiền không hợp lệ');
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('error', 'Số tiền giao dịch không hợp lệ.');
                
                case 1005: // Invalid signature
                    $payment->markAsFailed('Chữ ký không hợp lệ');
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('error', 'Có lỗi bảo mật trong quá trình thanh toán.');
                
                default: // Other errors
                    $payment->markAsFailed('MoMo result code: ' . $request->resultCode);
                    return redirect()->route('bookings.show', $payment->booking)
                        ->with('error', 'Thanh toán thất bại. Mã lỗi: ' . $request->resultCode);
            }
        }
        
        return redirect()->route('tours.index')
            ->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
    }
    
    private function generateTransactionId(Booking $booking)
    {
        return 'TOUR-' . $booking->id . '-' . time() . '-' . Str::random(4);
    }
    
    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
