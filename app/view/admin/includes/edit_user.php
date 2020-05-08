<?php
    /* Edit user GET */
    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];

        // Create controller object
        $controller = new UserController();
        $row = $controller->getUser($the_user_id);

        /* Get user data */
        $name = $row['name'];
        $email = $row['email'];
        $university = $row['university'];
        $birthday = $row['birthday'];
        $program = $row['program'];
        $role = $row['role'];
    }

    /* Edit user POST */
    if (isset($_POST['edit_user'])) {        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $university = $_POST['university'];
        $birthday = $_POST['birthday'];
        $program = $_POST['program'];
        $role = $_POST['role'];
        $the_user_id = $_GET['edit_user'];

        // Create controller object        
        $controller = new UserController();
        // Update user's data
        $controller->updateUser($name, $email, $university, $birthday, $program, $role, $the_user_id);
       
    }
 ?>




<!-- Enctype send multiple/different form data(image and text) -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- Name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $name ?>">
    </div>
    <!-- Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="text" name="email" value="<?php echo $email ?>">
    </div>
    <!-- Roles -->
    <div class="form-group">
        <label for="role">Role</label>
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
    <!-- Birthday -->
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input class="form-control" type="date" name="birthday" value="<?php echo $birthday ?>">
    </div>
    <!-- University -->
    <div class="form-group">
        <label for="university">University</label>
        <input class="form-control" type="text" name="university" value="<?php echo $university ?>">
    </div>
    <!-- Program -->
    <div class="form-group">
        <label for="program">Program</label>
        <input class="form-control" type="text" name="program" value="<?php echo $program ?>">
    </div>

    <div class="form-group">
        <input class="btn" type="submit" name="edit_user" value="Update User">
    </div>
</form>