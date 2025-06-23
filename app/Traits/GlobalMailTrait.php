<?php

namespace App\Traits;

use App\Jobs\GlobalMailJob;
use App\Mail\GlobalMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\GlobalSetting\app\Models\EmailTemplate;

trait GlobalMailTrait
{
    private static function isQueable(): bool
    {
        return getSettingStatus('is_queable');
    }
    /**
     * Sends an email using the specified subject and message.
     *
     * @param string $mail_address The email address to send the mail to.
     * @param string $mail_subject The subject of the email.
     * @param string $mail_message The body message of the email.
     * @param array $link An associative array containing one key-value pair. Example: ['Link Name' => 'https://example.com/link']
     *
     * @return void
     */
    public function sendMail($mail_address, $mail_subject, $mail_message, $link = [])
    {
        try {

            if (self::isQueable()) {
                dispatch(new GlobalMailJob($mail_address, $mail_subject, $mail_message, $link));
            } else {
                Mail::to($mail_address)->send(new GlobalMail($mail_subject, $mail_message, $link));
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    /**
     * Handle exceptions related to mail configuration and sending.
     *
     * Logs the exception message and determines the appropriate error message for different types of exceptions.
     * Redirects back with an error notification message.
     *
     * @param \Exception $e The exception to handle.
     * @return \Illuminate\Http\RedirectResponse Redirects back with an error notification.
     */
    public function handleMailException(\Exception $e)
    {
        info($e->getMessage());
        if ($e instanceof \Symfony\Component\Mailer\Exception\TransportExceptionInterface) {
            $message = __('Please check your mail server configuration.');
        } elseif ($e instanceof \ErrorException) {
            if (strpos($e->getMessage(), 'Trying to access array offset on value of type null') !== false) {
                $message = __('Check your mail server configuration.');
            } else {
                $message = __('An unexpected error occurred.');
            }
        } else {
            $message = __('Mail sending operation failed. Please try again.');
        }

        $notification = ['message' => $message, 'alert-type' => 'error'];
        return redirect()->back()->with($notification);
    }

    /**
     * Fetches and processes an email template by replacing placeholders with actual values.
     *
     * @param string $templateName The name of the email template to fetch.
     * @param array $str_replace An optional associative array of placeholders and their corresponding values. Placeholders should be provided without the surrounding curly braces. Example: ['user_name' => 'John Doe', 'app_name' => 'MyApp']
     *
     * @return array Returns an array with two elements:
     * - string The subject of the email template.
     * - string The processed message with placeholders replaced by actual values.
     */
    public function fetchEmailTemplate($templateName, $str_replace = [])
    {
        // Fetch the template by name
        $template = EmailTemplate::where('name', $templateName)->first();
        $subject = $template->subject;
        $message = $template->message;

        // Check if the $str_replace array exists and is not empty
        if (!empty($str_replace)) {
            // Replace placeholders with actual values
            foreach ($str_replace as $key => $value) {
                $message = str_replace(["{{" . $key . "}}", "{{ " . $key . " }}"], $value, $message);
            }
        }

        return [$subject, $message];
    }
}
