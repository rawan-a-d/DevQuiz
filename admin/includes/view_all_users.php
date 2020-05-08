<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>University</th>
            <th>Birthday</th>
            <th>Program</th>

        </tr>
    </thead>
    <tbody>
        <?php
            $result = getAllUsers();

            // Display users
            foreach ($result as $row) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $university = $row['university'];
                $birthday = $row['birthday'];
                $program = $row['program'];
                $role = $row['role'];

                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $email ?></td>
                    <td></td>
                    <td><?php echo $role ?></td>
                    <td><?php echo $university ?></td>
                    <td><?php echo $birthday ?></td>
                    <td><?php echo $program ?></td>

                    <td><a href='users.php?change_to_admin=<?php echo $id ?>'>Admin</a></td>           
                    <td><a href='users.php?change_to_sub=<?php echo $id ?>'>Subscriber</a></td>           
                    <td><a href='users.php?source=edit_user&edit_user=<?php echo $id ?>'>Edit</a></td>
                    <td><a href='users.php?delete=<?php echo $id ?>'>Delete</a></td>
                </tr>


            <?php } ?>

            <!-- DELETE USER -->
            <?php 
                if(isset($_GET['delete'])){
                    $user_id = $_GET['delete'];

                    deleteUser($user_id);

                    header("Location: users.php");
                }
            ?>

            <!-- CHANGE TO ADMIN -->
            <?php 
                if(isset($_GET['change_to_admin'])){
                    $the_user_id = $_GET['change_to_admin'];

                    updateUserToAdmin($the_user_id);

                    header("Location: users.php");
                }
             ?>

            <!-- CHANGE TO SUBSCRIBER -->
            <?php 
                if(isset($_GET['change_to_sub'])){
                    $the_user_id = $_GET['change_to_sub'];

                    updateUserToSubscriber($the_user_id);

                    header("Location: users.php");
                }
             ?>
    </tbody>
</table>