<?php

namespace App\Console\Commands;

use App\Mail\GlobalMail;
use App\Models\Member;
use App\Traits\MailSenderTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Modules\GlobalSetting\app\Models\EmailTemplate;

class SendSubscriptionNotifications extends Command
{
    use  MailSenderTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications for expiring subscriptions';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $setting = cache('setting');
        $template = EmailTemplate::where('name', 'Subscription Expire')->first();
        $subject = $template->subject;
        $message = $template->message;

        $message = str_replace('{{ app_name }}', $setting->app_name, $message);

        $members = Member::with('subscription')->whereHas('subscription', function ($query) {
            $query->where('end_date', '>=', now())
                ->where('end_date', '<', now()->addDays(3));
        })->get();

        foreach ($members as $member) {
            $message = str_replace('{{ user_name }}', $member->user->name, $message);
            $message = str_replace('{{ subscription_start_date }}', $member->subscription->start_date, $message);
            $message = str_replace('{{ subscription_renew_date }}', $member->subscription->renewal_date, $message);

            $this->sendMemberSubscriptionMailFromTrait($subject, $message, $member->user);
            $this->info("Notification sent to: {$member->user->email}");
        }


        return Command::SUCCESS;
    }
}
