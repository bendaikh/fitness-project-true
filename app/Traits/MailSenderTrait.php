<?php

namespace App\Traits;

use App\Jobs\MemberSubscriptionJob;
use App\Jobs\SendVerifyMailToUser;
use App\Jobs\SocialLoginDefaultPasswordJob;
use App\Jobs\UserForgetPasswordJob;
use App\Mail\MemberSubscriptionMail;
use App\Mail\SocialLoginDefaultPasswordMail;
use App\Mail\UserForgetPassword;
use App\Mail\UserRegistration;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\ContactMessage\app\Emails\ContactMessageMail;
use Modules\ContactMessage\app\Jobs\ContactMessageSendJob;
use Modules\Customer\app\Emails\SendMailToUser;
use Modules\Customer\app\Emails\UserBanned;
use Modules\Customer\app\Jobs\SendBulkEmailToUser;
use Modules\Customer\app\Jobs\SendUserBannedMailJob;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use Modules\NewsLetter\app\Emails\NewsLetterVerifyMail;
use Modules\NewsLetter\app\Jobs\NewsLetterVerifyJob;
use Modules\Order\app\Emails\OrderSuccessfulMail;
use Modules\Order\app\Emails\PaymentRejectMail;
use Modules\Order\app\Jobs\OrderSuccessfulMailJob;
use Modules\Order\app\Jobs\PaymentRejectJob;

trait MailSenderTrait
{
    private static function isQueable(): bool
    {
        return getSettingStatus('is_queable');
    }

    private function sendVerifyMailToUserFromTrait($user_type, $user_info = null)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new SendVerifyMailToUser($user_type, $user_info = null));
                } else {
                    if ($user_type == 'all_user') {
                        $users = User::where('email_verified_at', null)->orderBy('id', 'desc')->get();
                        foreach ($users as $index => $user) {
                            $user->verification_token = \Illuminate\Support\Str::random(100);
                            $user->save();

                            try {
                                $template = EmailTemplate::where('name', 'user_verification')->first();
                                $subject = $template->subject;
                                $message = $template->message;
                                $message = str_replace('{{user_name}}', $user->name, $message);

                                Mail::to($user->email)->send(new UserRegistration($message, $subject, $user));
                            } catch (Exception $ex) {
                                if (app()->isLocal()) {
                                    Log::error($ex->getMessage());
                                }
                            }
                        }
                    } else {
                        try {
                            $template = EmailTemplate::where('name', 'user_verification')->first();
                            $subject = $template->subject;
                            $message = $template->message;
                            $message = str_replace('{{user_name}}', $user_info->name, $message);

                            Mail::to($user_info->email)->send(new UserRegistration($message, $subject, $user_info));
                        } catch (Exception $ex) {
                            if (app()->isLocal()) {
                                Log::error($ex->getMessage());
                            }
                        }
                    }
                }

                return true;
            } catch (Exception $th) {
                if (app()->isLocal()) {
                    Log::error($th->getMessage());
                }

                return false;
            }
        }

        return false;
    }

    private function sendUserForgetPasswordFromTrait($from_user, $mail_template_path = 'auth')
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new UserForgetPasswordJob($from_user, $mail_template_path));
                } else {
                    try {
                        $template = EmailTemplate::where('name', 'password_reset')->first();

                        $subject = $template->subject;
                        $message = $template->message;
                        $message = str_replace('{{user_name}}', $from_user->name, $message);
                        Mail::to($from_user->email)->send(new UserForgetPassword($message, $subject, $from_user, $mail_template_path));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }

                return true;
            } catch (Exception $th) {
                if (app()->isLocal()) {
                    Log::error($th->getMessage());
                }

                return false;
            }
        }

        return false;
    }

    private function sendSocialLoginDefaultPasswordFromTrait($user, $password)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new SocialLoginDefaultPasswordJob($user, $password));
                } else {
                    try {
                        Mail::to($this->user->email)->send(new SocialLoginDefaultPasswordMail($user, $password));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }

                return true;
            } catch (Exception $th) {
                if (app()->isLocal()) {
                    Log::error($th->getMessage());
                }

                return false;
            }
        }

        return false;
    }

    private function sendPaymentRejectMailFromTrait($subject, $description, $user)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new PaymentRejectJob($subject, $description, $user));
                } else {
                    try {
                        Mail::to($user->email)->send(new PaymentRejectMail($subject, $description));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }

                return true;
            } catch (Exception $th) {
                if (app()->isLocal()) {
                    Log::error($th->getMessage());
                }

                return false;
            }
        }

        return false;
    }
    private function sendMemberSubscriptionMailFromTrait($subject, $description, $user)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new MemberSubscriptionJob($description, $subject, $user->email));
                } else {
                    try {
                        Mail::to($user->email)->send(new MemberSubscriptionMail($description, $subject));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }

                return true;
            } catch (Exception $th) {
                if (app()->isLocal()) {
                    Log::error($th->getMessage());
                }

                return false;
            }
        }

        return false;
    }

    private function sendOrderSuccessMailFromTrait($subject, $description, $user, $admin)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new OrderSuccessfulMailJob($subject, $description, $user, $admin));
                } else {
                    try {
                        Mail::to($user->email)->send(new OrderSuccessfulMail($subject, $description));

                        if ($admin) {
                            Mail::to($admin->mail)->send(new OrderSuccessfulMail($admin->subject, $admin->description));
                        }
                    } catch (Exception $ex) {
                        Log::error($ex->getMessage());
                        return false;
                    }
                }
            } catch (Exception $ex) {
                if (app()->isLocal()) {
                    Log::error($ex->getMessage());
                }
                return false;
            }
        }
    }

    private function sendContactMessageMailFromTrait($message)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new ContactMessageSendJob($message));
                } else {
                    try {
                        $template = EmailTemplate::where('name', 'contact_mail')->first();
                        $subject = $template->subject;

                        $templateMessage = $template->message;
                        $templateMessage = str_replace('{{name}}', $message->name, $templateMessage);
                        $templateMessage = str_replace('{{email}}', $message->email, $templateMessage);
                        $templateMessage = str_replace('{{phone}}', $message->phone, $templateMessage);
                        $templateMessage = str_replace('{{subject}}', $message->subject, $templateMessage);
                        $templateMessage = str_replace('{{message}}', $message->message, $templateMessage);

                        $email_setting = Cache::get('setting');

                        Mail::to($email_setting->contact_message_receiver_mail)->send(new ContactMessageMail($subject, $templateMessage));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }

                return true;
            } catch (Exception $th) {
                if (app()->isLocal()) {
                    Log::error($th->getMessage());
                }

                return false;
            }
        }

        return false;
    }

    private function sendNewsLetterMailFromTrait($newsletter)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new NewsLetterVerifyJob($newsletter));
                } else {
                    try {
                        $template = EmailTemplate::where('name', 'subscribe_notification')->first();
                        $message = $template->message;
                        $subject = $template->subject;
                        Mail::to($newsletter->email)->send(new NewsLetterVerifyMail($newsletter, $subject, $message));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }
                return true;
            } catch (Exception $ex) {
                if (app()->isLocal()) {
                    Log::error($ex->getMessage());
                }
                return false;
            }
        }
        return false;
    }

    private function sendCustomerMailFromTrait($email, $subject, $description, $user_type, $user = null)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new SendBulkEmailToUser($subject, $description, $user_type, $user));
                } else {
                    try {
                        Mail::to($email)->send(new SendMailToUser($description, $subject));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }
                return true;
            } catch (Exception $ex) {
                if (app()->isLocal()) {
                    Log::error($ex->getMessage());
                }
                return false;
            }
        }
        return false;
    }
    private function sendBannedMailTrait($description, $subject, $user)
    {
        if (self::setMailConfig()) {
            try {
                if (self::isQueable()) {
                    dispatch(new SendUserBannedMailJob($description, $subject, $user));
                } else {
                    try {
                        Mail::to($user->email)->send(new UserBanned($description, $subject));
                    } catch (Exception $ex) {
                        if (app()->isLocal()) {
                            Log::error($ex->getMessage());
                        }
                    }
                }
                return true;
            } catch (Exception $ex) {
                if (app()->isLocal()) {
                    Log::error($ex->getMessage());
                }
                return false;
            }
        }
        return false;
    }
    private static function setMailConfig()
    {
        try {
            $email_setting = Cache::get('setting');

            $mailConfig = [
                'transport' => 'smtp',
                'host' => $email_setting->mail_host,
                'port' => $email_setting->mail_port,
                'encryption' => $email_setting->mail_encryption,
                'username' => $email_setting->mail_username,
                'password' => $email_setting->mail_password,
                'timeout' => null,
            ];

            config(['mail.mailers.smtp' => $mailConfig]);
            config(['mail.from.address' => $email_setting->mail_sender_email]);
            config(['mail.from.name' => $email_setting->mail_sender_name]);

            return true;
        } catch (\Throwable $th) {
            if (app()->isLocal()) {
                Log::error($th->getMessage());
            }

            return false;
        }
    }
}
