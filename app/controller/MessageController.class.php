<?php 

/* Responsible for handling the messages and contacting the MessageManager */
class MessageController extends MessageManager {
	// Stores the MessageManager object
	public $model;

	public function __construct()  
	{  
		$this->model = new MessageManager();
	} 

	/* Get all messages from users */
	public function getAllMessages(){
		return $this->model->getAllMessages();
	}

	/* Delete a message by id */
	public function deleteMessage($id){
		$this->model->deleteMessage($id);
	}

	/* Create a message */
	public function addMessage($userId, $subject, $message){
		$this->model->addMessage($userId, $subject, $message);
	}
}


 ?>