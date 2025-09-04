<?php 
include 'template/header.php';
include '../class/UserController.php';

$uc = new UserController();
$users = $uc->showUsers();

if(isset($_POST['deleteBtn'])){
    $uc->deleteUser($_POST['user']);
}

?>

<!-- Table -->
<div class="container my-5 table-responsive-xl">
    <table class="table table-hover caption-top mt-5 fs-4">
        <div class="d-flex justify-content-between">
            <h1 class="text-white">List of Users</h1>
            <h1 class="text-white">Admin : Owen</h1>
        </div>
        <thead class="table-dark text-center">
        <tr>
            <th scope="col" style="width: 50px;">No</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody class="text-center table-dark table-group-divider">
            <?php 
                $num = 1;
                foreach($users as $user):
            ?>
            <tr>
                <td><?= $num++;?></td>
                <td><?= $user['first_name'] . ' ' . $user['last_name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="view_user.php?id=<?=$user['id']?>" class="btn btn-primary btn-md">View</a>
                    <a href="edit_user.php?id=<?=$user['id']?>" class="btn btn-warning btn-md">Edit</a>
                    <form method="POST">
                        <input type="hidden" value="<?php $user?>" name="user">
                        <a class="btn btn-danger btn-md" type="submit"" name="deleteBtn">Remove</a>
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <!-- Add User Button -->
    <div class="text-center my-5">
        <a href="add_user.php" class="btn btn-primary">+ Add User</a>
    </div>
</div>

<?php include 'template/footer.php'?>