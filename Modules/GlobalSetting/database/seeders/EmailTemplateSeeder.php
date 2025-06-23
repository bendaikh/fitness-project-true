<?php

namespace Modules\GlobalSetting\database\seeders;

use Illuminate\Database\Seeder;
use Modules\GlobalSetting\app\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'password_reset',
                'subject' => 'Password Reset',
                'message' => '<p>Dear {{user_name}},</p>
                <p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>',
            ],
            [
                'name' => 'contact_mail',
                'subject' => 'Contact Email',
                'message' => '<p>Hello there,</p>
                <p>&nbsp;Mr. {{name}} has sent a new message. you can see the message details below.&nbsp;</p>
                <p>Email: {{email}}</p>
                <p>Phone: {{phone}}</p>
                <p>Subject: {{subject}}</p>
                <p>Message: {{message}}</p>',
            ],
            [
                'name' => 'subscribe_notification',
                'subject' => 'Subscribe Notification',
                'message' => '<p>Hi there, Congratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you will not approve this link, you can not get any newsletter from us.</p>',
            ],

            [
                'name' => 'user_verification',
                'subject' => 'User Verification',
                'message' => '<p>Dear {{user_name}},</p>
                <p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p>',
            ],

            [
                'name' => 'approved_refund',
                'subject' => 'Refund Request Approval',
                'message' => '<p>Dear {{user_name}},</p>
                <p>We are happy to say that, we have send {{refund_amount}} USD to your provided bank information. </p>',
            ],

            [
                'name' => 'new_refund',
                'subject' => 'New Refund Request',
                'message' => '<p>Hello websolutionus, </p>

                <p>Mr. {{user_name}} has send a new refund request to you.</p>',
            ],

            [
                'name' => 'pending_wallet_payment',
                'subject' => 'Wallet Payment Approval',
                'message' => '<p>Hello {{user_name}},</p>
                <p>We have received your wallet payment request. we find your payment to our bank account.</p>
                <p>Thanks &amp; Regards</p>',
            ],

            [
                'name' => 'approved_withdraw',
                'subject' => 'Withdraw Request Approval',
                'message' => '<p>Dear {{user_name}},</p>
                <p>We are happy to say that, we have send a withdraw amount to your provided bank information.</p>
                <p>Thanks &amp; Regards</p>
                <p>WebSolutionUs</p>',
            ],

            [
                'name' => 'approved_withdraw',
                'subject' => 'Withdraw Request Approval',
                'message' => '<p>Dear {{user_name}},</p>
                <p>We are happy to say that, we have send a withdraw amount to your provided bank information.</p>
                <p>Thanks &amp; Regards</p>
                <p>WebSolutionUs</p>',
            ],
            [
                'name' => 'Order Successfully',
                'subject' => 'Order Successfully',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Thanks for your new order. Your order has been placed .</p>
                <p>Total Amount : {{total_amount}},</p>
                <p>Payment Method : {{payment_method}},</p>
                <p>Payment Status : {{payment_status}},</p>
                <p>Order Status : {{order_status}},</p>
                <p>Order Date: {{order_date}},</p>',
            ],
            [
                'name' => 'Admin Order Confirmation',
                'subject' => 'New Order Confirmation - Order Placed',
                'message' => '
                <p>Hello Admin,</p>
                <p>A new order has been successfully placed. Please find the details below:</p>
                <p><strong>Total Amount:</strong> {{total_amount}}</p>
                <p><strong>Payment Method:</strong> {{payment_method}}</p>
                <p><strong>Payment Status:</strong> {{payment_status}}</p>
                <p><strong>Order Status:</strong> {{order_status}}</p>
                <p><strong>Order Date:</strong> {{order_date}}</p>
                <p>Thank you for your attention.</p>',
            ],
            [
                'name' => 'Order Cancel',
                'subject' => 'Order Cancel',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your order has been canceled .</p>
                <p>Total Amount : {{total_amount}},</p>
                <p>Payment Method : {{payment_method}},</p>
                <p>Payment Status : {{payment_status}},</p>
                <p>Order Status : {{order_status}},</p>
                <p>Order Date: {{order_date}},</p>',
            ],
            [
                'name' => 'Order Delivery',
                'subject' => 'Order Delivery',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your order has been delivered .</p>
                <p>Total Amount : {{total_amount}},</p>
                <p>Payment Method : {{payment_method}},</p>
                <p>Payment Status : {{payment_status}},</p>
                <p>Order Status : {{order_status}},</p>
                <p>Order Date: {{order_date}},</p>',
            ],
            [
                'name' => 'Payment Success',
                'subject' => 'Payment Success',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your payment has been successfully completed .</p>
                <p>Total Amount : {{total_amount}},</p>
                <p>Payment Method : {{payment_method}},</p>
                <p>Payment Status : {{payment_status}},</p>
                <p>Order Status : {{order_status}},</p>
                <p>Order Date: {{order_date}},</p>',
            ],

            [
                'name' => 'Workout Enrolled',
                'subject' => 'Workout Enrolled',
                'message' => '<p>Hi {{user_name}},</p>
                <p> You have successfully enrolled in the workout .</p>
                <p>Workout Name : {{workout_name}},</p>
                <p>Workout Date : {{workout_date}},</p>
                <p>Workout Time : {{workout_time}},</p>',
            ],

            // member registration successful
            [
                'name' => 'Member Registration',
                'subject' => 'Member Registration',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your registration has been successfully completed .</p>
                <p>Member ID : {{member_id}},</p>
                <p>Member Name : {{member_name}},</p>
                <p>Member Email : {{member_email}},</p>
                <p>Member Password : {{member_password}},</p>
                <p>Member Phone : {{member_phone}},</p>',
            ],

            // subscription success
            [
                'name' => 'Subscription Success',
                'subject' => 'Subscription Success',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your subscription has been successfully completed .</p>
                <p>Subscription Start Date:{{subscription_start_date}},</p>
                <p>Subscription End Date:{{subscription_end_date}},</p>
                <p>Subscription Name : {{subscription_name}},</p>
                <p>Subscription Price : {{subscription_price}},</p>',
            ],

            // trial Subscription

            [
                'name' => 'Trial Subscription',
                'subject' => 'Trial Subscription',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your trial subscription has been Started.</p>
                <p>Trial Start Date:{{subscription_start_date}},</p>
                <p>Trial End Date:{{subscription_end_date}}</p>',
            ],

            // assign locker
            [
                'name' => 'Assign Locker',
                'subject' => 'Assign Locker',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your locker has been successfully assigned.</p>
                <p>Locker ID : {{locker_no}},</p>',
            ],

            // locker status change
            [
                'name' => 'Locker Status Change',
                'subject' => 'Locker Status Change',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your locker status has been successfully changed.</p>
                <p>Locker ID : {{locker_no}},</p>',
            ],

            // remove assign locker
            [
                'name' => 'Remove Assign Locker',
                'subject' => 'Remove Assign Locker',
                'message' => '<p>Hi {{user_name}},</p>
                <p> Your locker has been successfully removed.</p>
                <p>Locker ID : {{locker_no}},</p>',
            ],
        ];

        foreach ($templates as $index => $template) {
            $new_template = new EmailTemplate();
            $new_template->name = $template['name'];
            $new_template->subject = $template['subject'];
            $new_template->message = $template['message'];
            $new_template->save();
        }
    }
}
