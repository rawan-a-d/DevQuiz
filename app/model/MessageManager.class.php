<?php 

// For database interaction with messages table
class MessageManager extends Dbh {

	/* Get all messages from users */
	protected function getAllMessages(){
		try {
			//$sql = "SELECT m.id, m.subject, m.message, m.date, u.name, u.email FROM messages AS m ";
			//	$sql .= "INNER JOIN users AS u ON m.userId = u.Id";

			$sql = "SELECT m.id, m.subject, m.message, m.created_at, u.name, u.email FROM messages AS m ";

			$sql .= "INNER JOIN users AS u ON m.user_id = u.Id";

			$statement = $this->connect()->prepare($sql);

			$statement->execute();

			$result = $statement->fetchAll();

			return $result;
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}

	}

	/* Delete a message by id */
	protected function deleteMessage($id){
		try {
			$sql = "DELETE FROM messages WHERE id = :id";

			$statement = $this->connect()->prepare($sql);

			// bind parameters to values
		    $statement->bindParam(':id', $id);

			$statement->execute();

			header('Location: ../admin/messages.php');

		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}

	/* Create a message */
	public function addMessage($userId, $subject, $message){
		try
		{
			//$sql = "INSERT INTO messages (subject, message, user_id, date) ";
			$sql = "INSERT INTO messages (subject, message, user_id, created_at) ";
			$sql .= "VALUES (:subject, :message, :userId, now())";

			$statement = $this->connect()->prepare($sql);

			// bind parameters to values
			$statement->bindParam(':subject', $subject);
			$statement->bindParam(':message', $message);
			$statement->bindParam(':userId', $userId);

			$statement->execute();
		}
		catch(PDOEXCEPTION $e) {
		    print_r("Something went wrong: " . $e->getMessage());
		}
	}
}	


 ?>
