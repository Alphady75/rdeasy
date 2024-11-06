<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailerService
{

	private string $email;
	private string $appName;

	public function __construct(private MailerInterface $mailer)
	{
		$this->email = $_ENV['SITE_EMAIL'];
		$this->appName = $_ENV['APP_NAME'];
	}

	public function sendContact($nom, $useremail, $sujet, $message)
	{

		$email = (new TemplatedEmail())
			->from(new Address($this->email, $this->appName))
			->to($this->email)
			->subject("Message de contact depuis " . $this->appName)
			->htmlTemplate('mails/_contact.html.twig')
			->context([
				'nom' => $nom,
				'useremail' => $useremail,
				'sujet' => $sujet,
				'message' => $message,
			]);

		return $this->mailer->send($email);
	}
}
