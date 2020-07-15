<?php 


class quizzManager extends Dbh {

    /* Get all questions */
    public function getAllQuestions(){
        try {
            $sql = "SELECT * FROM questions";
            

            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }  
    
    /* Get all subjects */
    public function getAllSubjects(){
        try {
            $sql = "SELECT * FROM subjects";
            

            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }   

    /* Get questions by subject and level */
    public function getQuestionsBySubjectLevel(int $subject, int $level){
        try {
            $sql = "SELECT * FROM questions WHERE subject_id=".$subject." AND level=".$level.";";
            

            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }   
    /* Get number of questions by subject and level */
    public function getCountBySubjectLevel(int $subject, int $level){
        try {
            $sql = "SELECT * FROM questions WHERE subject_id=".$subject." AND level=".$level.";";
            

            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->rowCount();

            return $result;
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }   
    /* Get subject name by id */
    public function getSubjectBYID(int $subject){
        try {
            $sql = "SELECT * FROM subjects WHERE id=".$subject.";";
            

            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result[0]['name'];
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }   
    /* Get questions by subject*/
    public function getQuestionsBySubject(int $subject){
        try {
            $sql = "SELECT * FROM questions WHERE subject_id=".$subject.";";
            

            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result;
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }
    
    /*Update question by id*/
    public function UpdateQuestionByID(string $question, string $answer1, string $answer2, string $answer3, string $answer4, string $canswer, int $id){
        try {
            $sql = "UPDATE questions SET question='".$_POST['question']."', ans_a='".$_POST['answer1']."', ans_b='".$_POST['answer2']."', ans_c='".$_POST['answer3']."', ans_d='".$_POST['answer4']."', answer='".$_POST['canswer']."' WHERE id='".$_SESSION['qnr']."';";
            
            $statement = $this->connect()->prepare($sql);

            $statement->execute();

            $result = $statement->fetchAll();

            return $result; 
        }
        catch(PDOEXCEPTION $e) {
            print_r("Something went wrong: " . $e->getMessage());
        }
    }
    
}

?>