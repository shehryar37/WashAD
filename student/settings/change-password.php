<?php
$page_title = "Change Password";
include_once("../master/header.php");

if (isset($_POST["btn_submit"])) {
    $new_password = $_POST["new_password"];
    if ($new_password == $_POST["c_new_password"]) {
        $old_password = $_POST["old_password"];
        $user_id = $_SESSION['student_id'];
        $user_query = "SELECT * FROM `students` WHERE `student_password` = '$old_password' AND `student_id` = $student_id";

        global $conn;

        $user = $conn->query($user_query);

        if ($user->num_rows > 0) {
            $update_password = "UPDATE `students` SET `student_password` = '$new_password' WHERE `password` = '$old_password'";
            if ($conn->query($update_password) === TRUE) {
                $_SESSION['changemsgSuccess'] = "Password has successfully been changed";
            } else {
                $_SESSION['changemsgSuccess'] = "Unable to change password";
            }
        } else {
            $_SESSION['changemsgFail'] = "Old password is incorrect";
        }
    } else {
        $_SESSION['changemsgFail'] = "New passwords do not match";
    }
}

?>
<div class="row">
    <div class="col-lg-12">
        <?php if (isset($_SESSION['changemsgFail'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php
                echo $_SESSION['changemsgFail'];
                unset($_SESSION['changemsgFail']);
                ?>
            </div>
        <?php
        } ?>
        <?php if (isset($_SESSION['changemsgSuccess'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php
                echo $_SESSION['changemsgSuccess'];
                unset($_SESSION['changemsgSuccess']);
                ?>
            </div>
        <?php
        } ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <form class="form-horizontal" action="change-password.php" method="post">
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" required placeholder="Old Password" class="form-control" id="old_password">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" required placeholder="New Password" class="form-control" id="new_password">
            </div>
            <div class="form-group">
                <label for="c_new_password">Confirm New Password</label>
                <input type="password" name="c_new_password" required placeholder="Confirm New Password" class="form-control" id="c_new_password">
            </div>
            <div class="text-right">
                <button type="submit" class="btn w-md btn-bordered btn-success waves-effect waves-light" name="btn_submit" id="btn_submit">Change Password</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once("../master/footer.php");
?>