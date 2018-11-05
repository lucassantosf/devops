<?php

namespace Hcode;

use Rain\Tpl;

class Mailer{

	const USERNAME = "a@gmail.com.br";
	const PASSWORD = "";
	const NAME_FROM = "Lucas Store";

	private $this->mail;

	public function __construct($toAddress, $toName, $subject, $tplName, $data=array()){

		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false // set to false to improve the speed
		);

		Tpl::configure( $config );

		$tpl = new Tpl;

		foreach ($data as $key => $value) {
			$tpl->assign($key, $value);
		}

		$html = $tpl->draw($tplName, true);

		$this->mail = new \PHPMailer;

		$this->mail->isSMTP();

		$this->mail->SMTPDebug = 0;

		$this->mail->Host = 'smtp.gmail.com';
		
		$this->mail->Port = 587;

		$this->mail->SMTPSecure = 'tls';

		$this->mail->SMTPAuth = true;

		$this->mail->Username = Mailer::USERNAME;

		$this->mail->Password = Mailer::PASSWORD;

		$this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

		$this->mail->addAddress("atendimentosp1@pactosolucoes.com.br", $toName);//Destinatário

		$this->mail->Subject = $subject;

		$this->mail->msgHTML($html);

		$this->mail->AltBody = 'This is a plain-text message body';

		if (!$this->mail->send()) {
		    echo "Mailer Error: " . $this->mail->ErrorInfo;
		} else {
		    echo "Message sent!";
		}

		function save_mail($this->mail){
		    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

		    $imapStream = imap_open($path, $this->mail->Username, $this->mail->Password);

		    $result = imap_append($imapStream, $path, $this->mail->getSentMIMEMessage());
		    imap_close($imapStream);

		    return $result;
		}
	}

	public function send(){
		return $this->mail->send();
	}
}

?>
