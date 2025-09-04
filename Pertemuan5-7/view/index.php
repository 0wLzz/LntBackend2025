<?php 
include '../class/UserController.php';
include '../class/LoginController.php';
session_start();

$uc = new UserController();
$users = $uc->showUsers();

if (isset($_COOKIE["email"])){
    $_SESSION['login'] = true;
}

if (empty($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['deleteBtn'])) {
    $uc->deleteUser($_POST['id']);
    header("Location: index.php");
}

if(isset($_POST['logoutBtn'])) {
    $lc = new LoginController();
    $lc->logout();
    header("Location: login.php");
}

include 'template/header.php';
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
            <th scope="col">Photo</th>
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
                <td><?= $num++ ?></td>
                <td>
                    <img src="<?= !empty($user['photo']) ? '../img/' . $user['photo'] : 'https://via.placeholder.com/180x150'; ?>" 
                        alt="profile_picture" 
                        style="width: 100px;">
                </td>
                <td><?=$user['first_name']. ' ' . $user['last_name']?></td>
                <td><?= $user['email']?></td>
                <td>
                    <a href="view_user.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-md">View</a>
                    <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-md">Edit</a>
                    <button class="btn btn-danger btn-md" onclick="openModal('warningRemove<?=$num?>')">Remove</button>

                    <dialog class="warningRemove" id="warningRemove<?=$num?>" style="text-align: left">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $user["id"]?>">
                            <h2>Warning!</h2>
                            <h5>Are you sure you want to delete this?</h5>
                            <button type="submit" class="btn btn-danger" name="deleteBtn">Yes</button>
                            <button type="button" class="btn btn-secondary" formmethod="dialog" onclick="closeModal('warningRemove<?=$num?>')">No</button>
                        </form>
                    </dialog>
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

<script>
    function openModal(modalId){
    const modal = document.getElementById(modalId);
    if (modal.showModal) {
        modal.showModal();
        modal.addEventListener("click", e => {
            const dialogDimensions = modal.getBoundingClientRect()
            if (
              e.clientX < dialogDimensions.left ||
              e.clientX > dialogDimensions.right ||
              e.clientY < dialogDimensions.top ||
              e.clientY > dialogDimensions.bottom
            ) {
              modal.close()
            }
          });
    } else {
            modal.style.display = 'block';
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.close();
    }
</script>

<?php include 'template/footer.php'?>