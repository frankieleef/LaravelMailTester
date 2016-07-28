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

    /**
     * Checks if an email was sent.
     *
     * @return bool
     */
    public function assertEmailWasSent()
    {
        return $this->assertTrue(! empty($this->emails), 'Asserting that an email was sent while no email was sent.');
    }

    /**
     * Checks if no emails were sent.
     *
     * @return mixed
     */
    public function assertNoEmailWasSent()
    {
        return $this->assertTrue(empty($this->emails), 'Asserting that no email was sent, while ' . count($this->emails) . ' email(s) was/were sent.');
    }
}
