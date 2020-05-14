<?php 

/* Responsible for handling questions in quizz */
class quizzController {
	// Stores the Model
	public $model;

	public function __construct()  
	{  
		$this->model = new quizzManager();
	} 

	/* Get all questions */
    public function getAllQuestions(){
		return $this->model->getAllQuestions();
	}

	/* Get all subjects */
    public function getAllSubjects(){
		return $this->model->getAllSubjects();
	}

	/* Get questions by subject and level */
    public function getQuestionsBySubjectLevel(int $subject, int $level){
		return $this->model->getQuestionsBySubjectLevel($subject, $level);
	}

	/* Get questions by subject*/
    public function getQuestionsBySubject(int $subject){
		return $this->model->getQuestionsBySubject($subject);
	}

	/* Get number of questions by subject and level */
    public function getCountBySubjectLevel(int $subject, int $level){
		return $this->model->getCountBySubjectLevel($subject, $level);
    }
    /* Get subject name by id */
    public function getSubjectBYID(int $subject){
        return $this->model->getSubjectBYID($subject);
	}
	/*Update question by id*/
    public function UpdateQuestionByID(string $question, string $answer1, string $answer2, string $answer3, string $answer4, string $canswer, int $id){
		return $this->model->UpdateQuestionByID($question, $answer1, $answer2, $answer3, $answer4, $canswer, $id);
	}
}

 ?>