# Tour Booking & Payment System

This document describes the completed booking and payment system for the tour application.

## Features Implemented

### 1. Booking System
- **Tour Booking Creation**: Users can book tours with specified dates and participant counts
- **Booking Management**: View booking details and status tracking
- **User Authorization**: Only booking owners can access their bookings

### 2. Payment System
- **Multiple Payment Methods**:
  - VNPay (Online payment gateway)
  - MoMo (Digital wallet)
  - Bank Transfer (Manual transfer with instructions)
  - Cash (Pay on tour)

- **Payment Processing**:
  - Secure payment record creation
  - Transaction ID generation
  - Gateway integration with callbacks
  - Status tracking (pending, completed, failed, refunded)

- **Payment Notifications**:
  - Automatic email notifications on successful payment
  - Payment confirmation details

## Database Structure

### Bookings Table
- `id` - Primary key
- `user_id` - Foreign key to users
- `tour_id` - Foreign key to tours
- `adults` - Number of adults
- `children` - Number of children
- `participants` - Total participants
- `tour_date` - Date of the tour
- `total_amount` - Total booking amount
- `status` - Booking status (pending, completed, cancelled)
- `note` - Optional notes

### Payments Table
- `id` - Primary key
- `booking_id` - Foreign key to bookings
- `amount` - Payment amount
- `payment_method` - Payment method (vnpay, momo, bank_transfer, cash)
- `transaction_id` - Unique transaction identifier
- `status` - Payment status (pending, completed, failed, refunded)
- `gateway_response` - JSON response from payment gateway
- `processed_at` - Timestamp when payment was processed

## Setup Instructions

### 1. Database Migration
```bash
php artisan migrate
```

### 2. Environment Configuration
Add the following variables to your `.env` file:

```env
# VNPay Configuration
VNPAY_TMN_CODE=your_vnpay_tmn_code
VNPAY_HASH_SECRET=your_vnpay_hash_secret

# MoMo Configuration
MOMO_PARTNER_CODE=your_momo_partner_code
MOMO_ACCESS_KEY=your_momo_access_key
MOMO_SECRET_KEY=your_momo_secret_key

# Email Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

# Queue Configuration (for email notifications)
QUEUE_CONNECTION=database
```

### 3. Queue Setup (for Email Notifications)
```bash
# Create jobs table
php artisan queue:table
php artisan migrate

# Run queue worker (in production, use supervisor)
php artisan queue:work
```

## Payment Gateway Integration

### VNPay
- Uses sandbox environment by default
- Supports ATM, Visa, MasterCard payments
- Automatic callback handling for payment confirmation

### MoMo
- Uses test environment by default  
- Digital wallet integration
- Real-time payment processing

### Bank Transfer
- Provides bank account details to customers
- Manual verification process
- Copy-to-clipboard functionality for transfer details

## Routes

### Booking Routes
- `GET /bookings/{booking}` - View booking details
- `POST /bookings` - Create new booking

### Payment Routes
- `GET /bookings/{booking}/payments/create` - Payment method selection
- `POST /bookings/{booking}/payments` - Process payment
- `GET /payments/{payment}/vnpay` - VNPay payment processing
- `GET /payments/{payment}/momo` - MoMo payment processing
- `GET /payments/{payment}/bank-info` - Bank transfer information
- `GET /payments/vnpay/callback` - VNPay callback handler
- `POST /payments/momo/callback` - MoMo callback handler

## Usage Flow

### 1. Customer Books a Tour
1. Customer selects a tour and fills booking form
2. System creates booking record with `pending` status
3. Customer is redirected to payment selection

### 2. Payment Processing
1. Customer selects payment method
2. System creates payment record
3. Customer is redirected to payment gateway (for online payments) or shows instructions (for manual payments)

### 3. Payment Confirmation
1. Payment gateway processes payment and calls callback
2. System updates payment status to `completed`
3. Booking status is updated to `completed`
4. Email notification is sent to customer

## Security Features

- **CSRF Protection**: All forms protected with Laravel's CSRF tokens
- **User Authorization**: Only booking owners can access/modify their bookings
- **Payment Verification**: Gateway signatures verified for security
- **Transaction Logging**: All payment responses logged for audit

## Error Handling

- **Payment Failures**: Graceful handling with user-friendly error messages
- **Gateway Timeouts**: Automatic retry mechanisms
- **Email Failures**: Logged but don't block payment processing
- **Validation**: Comprehensive input validation

## Testing

### Test Payment Gateways
- **VNPay Sandbox**: Use test card numbers provided by VNPay
- **MoMo Test**: Use test wallet credentials

### Test Flow
1. Create a test booking
2. Try each payment method
3. Verify email notifications
4. Check payment status updates

## Troubleshooting

### Common Issues

1. **Payment Gateway Not Working**
   - Check environment variables
   - Verify gateway credentials
   - Check callback URLs are accessible

2. **Emails Not Sending**
   - Verify SMTP configuration
   - Check queue is running
   - Ensure mail credentials are correct

3. **Callback Issues**
   - Ensure callback URLs are publicly accessible
   - Check firewall/security rules
   - Verify SSL certificates for HTTPS

## Production Considerations

1. **Environment Variables**: Use production gateway credentials
2. **Queue Workers**: Use supervisor to manage queue workers
3. **SSL Certificates**: Ensure HTTPS for all payment pages
4. **Logging**: Monitor payment logs for issues
5. **Backup**: Regular database backups for payment records

## Support

For technical support or questions about the payment system:
- Check Laravel logs in `storage/logs/`
- Review payment gateway documentation
- Contact payment gateway support for integration issues
