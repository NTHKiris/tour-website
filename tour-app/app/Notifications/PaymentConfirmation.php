<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentConfirmation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $payment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $booking = $this->payment->booking;
        $tour = $booking->tour;

        return (new MailMessage)
            ->subject('Xác nhận thanh toán thành công - Tour ' . $tour->title)
            ->greeting('Chào ' . $notifiable->name . ',')
            ->line('Chúc mừng! Thanh toán của bạn đã được xác nhận thành công.')
            ->line('**Thông tin tour:**')
            ->line('Tên tour: ' . $tour->title)
            ->line('Ngày tour: ' . $booking->tour_date->format('d/m/Y'))
            ->line('Số người tham gia: ' . $booking->participants)
            ->line('Tổng tiền: ' . number_format($this->payment->amount, 0, ',', '.') . ' VNĐ')
            ->line('Mã giao dịch: ' . $this->payment->transaction_id)
            ->line('**Lưu ý quan trọng:**')
            ->line('- Vui lòng có mặt tại điểm tập trung trước giờ khởi hành 30 phút')
            ->line('- Mang theo CMND/CCCD và giấy tờ cần thiết')
            ->line('- Liên hệ hotline: 1900-xxxx nếu có thắc mắc')
            ->action('Xem chi tiết booking', url('/bookings/' . $booking->id))
            ->line('Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi!');
    }

    public function toArray($notifiable)
    {
        return [
            'payment_id' => $this->payment->id,
            'booking_id' => $this->payment->booking_id,
            'amount' => $this->payment->amount,
            'transaction_id' => $this->payment->transaction_id,
        ];
    }
}
