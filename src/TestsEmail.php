<?php
namespace TijmenWierenga\LaravelMailTester;

use Swift_Message;

trait TestsEmail
{
    /**
     * @var array
     */
    protected $emails = [];

    /**
     * @before
     */
    public function setMailPlugin()
    {
        app()->mailer
            ->getSwiftMailer()
            ->registerPlugin(new TestCaseMailEventListener($this));
    }

    /**
     * @param Swift_Message $email
     */
    public function addEmail(Swift_Message $email)
    {
        $this->emails[] = $email;
    }
}
