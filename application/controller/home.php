<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/presentation.html';
        require APP . 'view/home/experience.html';
        require APP . 'view/home/skills.html';
        require APP . 'view/home/personality.html';
        require APP . 'view/home/others.html';
        require APP . 'view/_templates/contact.html';
        require APP . 'view/_templates/footer.php';
    }

	public function sendMail()
	{
		return $this->model->sendMail($_POST);
	}
}
