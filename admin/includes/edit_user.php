<?php 
    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];

        $row = getUserById($the_user_id);

        $name = $row['name'];
        $email = $row['email'];
        $university = $row['university'];
        $birthday = $row['birthday'];
        $program = $row['program'];
        $role = $row['role'];
    }

    /* UPDATE USER */
    if (isset($_POST['edit_user'])) {        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $university = $_POST['university'];
        $birthday = $_POST['birthday'];
        $program = $_POST['program'];
        $role = $_POST['role'];
        $the_user_id = $_GET['edit_user'];

        updateUser($name, $email, $university, $birthday, $program, $role, $the_user_id);
    }
 ?>




<!-- Enctype send multiple/different form data(image and text) -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $name ?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" value="<?php echo $email ?>">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <!-- Roles -->
        <select name="role" id="role">
            <option value="subscriber"><?php echo $role ?></option>
            <?php 
                if($role == 'admin'){
                    echo "<option value='subscriber'>Subscriber</option>";
                }
                else {
                    echo "<option value='admin'>Admin</option>";   
                }
             ?>
        </select>
    </div>  
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input class="form-control" type="date" name="birthday" value="<?php echo $birthday ?>">
    </div>
    <div class="form-group">
        <label for="university">University</label>
        <input class="form-control" type="text" name="university" value="<?php echo $university ?>">
    </div>

    <div class="form-group">
        <label for="program">Program</label>
        <input class="form-control" type="text" name="program" value="<?php echo $program ?>">
    </div>


    <div class="form-group">
        <input class="btn" type="submit" name="edit_user" value="Update User">
    </div>
</form>