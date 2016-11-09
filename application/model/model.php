<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getDesign($index)
    {
		$datas = array();
		$items = array_slice(glob("img/design/"."*.*"), $index, 10);
        foreach($items as $file)
		{
			array_push($datas, explode("/", $file)[2]);
		}
		return $datas;
    }


	public function sendMail($post)
	{
		 /*$to      = 'axel.weyer83@gmail.com';
		 $subject = $post['subject'];
		 $message = $post['message'];
		 $headers = 'From: '.$post['mail'];
		 mail($to, $subject, $message, $headers);

		//require APP . 'utils/PHPMailer/PHPMailerAutoload.php';
		include APP . 'utils/PHPMailer/class.phpmailer.php';
		include APP . 'utils/PHPMailer/class.smtp.php';

		$mail = new PHPMailer;
		$mail->Host = 'smtp.ird.fr';
		$mail->SMTPAuth   = true;
		$mail->Port = 465; // Par défaut

		// Authentification
		$mail->Username = ""; // ajouter adresse mail receveur
		$mail->Password = ""; // ajouter mot de passe receveur

		// Expéditeur
		$mail->SetFrom($post['mail'], $_POST['name']);
		// Destinataire
		$mail->AddAddress('roxxorkillu@gmx.fr', 'WEYER Axel');
		// Objet
		$mail->Subject = $post['subject'];
		// Votre message
		$mail->MsgHTML($post['message']);

		// Envoi du mail avec gestion des erreurs
		if(!$mail->Send())
		{
			echo 'Erreur : ' . $mail->ErrorInfo;
		}
		else
		{
			echo 'ok';
		}*/

        require APP . 'utils/variables.php';
		include APP . 'utils/PHPMailer/class.phpmailer.php';
		include APP . 'utils/PHPMailer/class.smtp.php';

		$mail = new PHPMailer(); // create a new object
		//$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = $secure;
		$mail->Host = $host;
		$mail->Port = $port; // or 587
		$mail->IsHTML(true);
		$mail->Username = $username;
		$mail->Password = $password;
		$mail->SetFrom("example@gmail.com");
		$mail->Subject = "Test";
		$mail->Body = "hello";
		$mail->AddAddress("email@gmail.com");

		 if(!$mail->Send())
		 {
			echo "Mailer Error: " . $mail->ErrorInfo;
		 }
		else
		{
			echo "Message has been sent";
		 }
	}
}
