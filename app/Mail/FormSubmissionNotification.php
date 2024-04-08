<?php

namespace App\Mail;

use App\Models\australia;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     *
     * @param australia $formData
     */
    public function __construct(australia $formData)
    {
        $this->australia = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
public function build()
{
    return $this->view('mail')
                ->subject('Form Submission Notification');
}

}
