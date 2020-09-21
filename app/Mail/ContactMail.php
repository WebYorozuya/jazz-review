<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $view;//これの意味がわからん
    // public $subject;これなくても出来た
    public $data; //これはないとダメ
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $subject, $data)
    {
        //
        // $this->template = $template; //これの意味がわからん
        $this->subject = $subject; //件名を受ける
        $this->data = $data;

    }

    /**
     * Build the message.送信するメールの設定はbuildメソッド
     * from, subject, view, attachなどメソッドを呼び出す
     * @return $this
     */
    public function build()
    {
        // return $this->text($this->template)->subject($this->subject);

        return $this->from('jazzreview.team@gmail.com')
                    ->view('contact.mail');
                    // var_dump($input); exit();
    }
}
