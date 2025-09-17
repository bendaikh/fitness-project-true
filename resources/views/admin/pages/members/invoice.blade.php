<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #222; margin: 0; padding: 40px 30px; }
        .header { width: 100%; margin-bottom: 40px; }
        .logo { max-height: 60px; }
        .invoice-title { font-size: 28px; font-weight: bold; text-align: right; }
        .order-number { font-size: 22px; color: #888; margin-top: 10px; text-align: right; }
        .section-title { font-weight: bold; margin-bottom: 8px; font-size: 16px; color: #444; }
        .info-table { width: 100%; border-collapse: collapse; }
        .info-table td { padding: 3px 0; }
        .badge { display: inline-block; padding: 2px 14px; border-radius: 14px; font-size: 13px; color: #fff; font-weight: bold; }
        .badge-success { background: #43b96e; }
        .badge-pending { background: #ff9800; }
        .badge-failed { background: #e74c3c; }
        .divider { border-top: 1px solid #eee; margin: 30px 0; }
    </style>
</head>
<body>
    <table class="header">
        <tr>
            <td style="width:60%;">
                <img src="{{ public_path($setting?->admin_logo) }}" alt="Gym Logo" class="logo" width="120px">
            </td>
            <td style="width:40%; text-align:right;">
                <div class="invoice-title">{{ $makeSubscription->plan_name ?? 'Subscription' }}</div>
                <div class="order-number">Invoice #{{ $makeSubscription->invoice_id ?? '-' }}</div>
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-bottom:30px;">
        <tr>
            <td style="width:48%; vertical-align:top;">
                <div class="section-title">Gym Information:</div>
                <table class="info-table">
                    <tr>
                        <td>Name:</td>
                        <td>{{ config('app.name', 'Your Gym Name') }}</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td>{{ config('gym.address', '123 Gym Street, City') }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ config('gym.email', 'info@gym.com') }}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{ config('gym.phone', '+123456789') }}</td>
                    </tr>
                </table>
            </td>
            <td style="width:4%;"></td>
            <td style="width:48%; vertical-align:top;">
                <div class="section-title">Subscription Details:</div>
                <table class="info-table">
                    <tr>
                        <td>Subscription:</td>
                        <td>{{ $makeSubscription->plan_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Type:</td>
                        <td>{{ $makeSubscription->subscription_type ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Start Date:</td>
                        <td>
                            {{ $makeSubscription->start_date ? \Carbon\Carbon::parse($makeSubscription->start_date)->format('d F, Y') : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>End Date:</td>
                        <td>
                            {{ $makeSubscription->end_date ? \Carbon\Carbon::parse($makeSubscription->end_date)->format('d F, Y') : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>Renewal Date:</td>
                        <td>{{ $makeSubscription->renewal_date ? \Carbon\Carbon::parse($makeSubscription->renewal_date)->format('d F, Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Cancellation Reason:</td>
                        <td>{{ $makeSubscription->cancellation_reason ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td>{{ isset($makeSubscription->plan_price) ? currency($makeSubscription->plan_price) : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Total Amount:</td>
                        <td>{{ isset($makeSubscription->total_amount) ? currency($makeSubscription->total_amount) : '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <table width="100%" style="margin-bottom:30px;">
        <tr>
            <td style="width:48%; vertical-align:top;">
                <div class="section-title">Billing Information:</div>
                <table class="info-table">
                    <tr><td>{{ $user->name ?? '-' }}</td></tr>
                    <tr><td>{{ $user->phone ?? '-' }}</td></tr>
                    <tr><td>{{ $user->address ?? '-' }}</td></tr>
                </table>
            </td>
            <td style="width:4%;"></td>
            <td style="width:48%; vertical-align:top;">
                <div class="section-title">Payment Information:</div>
                <table class="info-table">
                    <tr>
                        <td>Method:</td>
                        <td>{{ $makeSubscription->payment_method ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            @php
                                $status = strtolower($makeSubscription->payment_status ?? '');
                            @endphp
                            @if($status === 'success' || $status === 'paid')
                                <span class="badge badge-success">Success</span>
                            @elseif($status === 'pending')
                                <span class="badge badge-pending">Pending</span>
                            @else
                                <span class="badge badge-failed">{{ ucfirst($status) ?: 'Failed' }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Transaction:</td>
                        <td>{{ $makeSubscription->transaction ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
