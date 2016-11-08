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
     * Get all songs from database
     */
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
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
		include APP . 'utils/PHPMailer/class.phpmailer.php';
		include APP . 'utils/PHPMailer/class.smtp.php';

		$mail = new PHPMailer(); // create a new object
		//$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "axel.weyer83@gmail.com";
		$mail->Password = "7GASQP77";
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
