
<?php
$fname_err = $lname_err = $email_err = $pass_err = $gender_err = $city_err = "";
$first_name = $last_name = $email = $password = $gender = $city = "";

if (!empty($_POST)) {

    /*
     * Getting form values
     */
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $city = $_POST['city'];
    
    /*
     * Defining Patterns for validation
     */
    $password_pattern = "/^[a-zA-Z0-9]{5,8}$/";
    $name_pattern = "/^[a-zA-Z\s]+$/";

    $check_valid = TRUE;//flag check for validation

    if ($first_name == "") {
        $fname_err = "Please enter first name!";
        $check_valid = FALSE;
    } elseif (!preg_match($name_pattern, $first_name)) {//matching with name pattern
        $fname_err = "First name must only contain letters!";
        $check_valid = FALSE;
    }

    if ($last_name == "") {
        $lname_err = "Please enter last name!";
        $check_valid = FALSE;
    } elseif (!preg_match($name_pattern, $last_name)) {
        $fname_err = "Last name must only contain letters!";
        $check_valid = FALSE;
    }
    
    if ($email == "") {
        $email_err = "Please enter email";
        $check_valid = FALSE;
    } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        $email_err = "pleae enter valid email format!";
        $check_valid = FALSE;
    }

    if ($password == "") {
        $pass_err = "Please enter password!";
        $check_valid = FALSE;
    } elseif (!preg_match($password_pattern, $password)) {
        $pass_err = "pleae enter valid password e-g minimum 5 a max 8 chars allowed !";
        $check_valid = FALSE;
    }

    if ($gender == NULL) {
        $gender_err = "Please select gender!";
        $check_valid = FALSE;
    }
    
    if ($city == "") {
        $city_err = "Please select city!";
        $check_valid = FALSE;
    }

    if ($check_valid) {
        header("Location: process.php");
    }
}
?>

<form name="myForm" action="index.php"  method="post">
    <div>
        <h2 class="center">Sign Up</h2>
        <p>Please fill in this form to create an account.</p>

        <label for="fname" class="label">First Name</label>
        <input type="text" placeholder="Enter Firstname" name="fname"  value="<?= $first_name; ?>"><br>
        <span class="danger"><?php echo $fname_err; ?></span>
        <br><br>
        
        <label for="lname" class="label">Last Name</label>
        <input type="text" placeholder="Enter Lastname" name="lname"  value="<?= $last_name; ?>">
        <span class="danger"><?php echo $lname_err; ?></span>
        <br><br>
        
        <label for="email" class="label">Email</label>
        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?= $email; ?>"><br>
        <span class="danger"><?php echo $email_err; ?></span>
        <br><br>

        <label for="psw" class="label">Password</label>
        <input type="password" placeholder="Enter Password" value="<?= $password ?>" name="psw"><br>
        <span class="danger"><?php echo $pass_err; ?></span>
        <br><br>
        
        <label class="label">Gender</label>
        <div class="pull-left">
            <input type="radio" name="gender" id="male" value="male" <?php echo ($gender === "male") ? "checked" : "" ?>> <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female" <?php echo ($gender === "female") ? "checked" : "" ?>> <label for="female">Female</label>
            <input type="radio" name="gender" id="other" value="other" <?php echo ($gender === "other") ? "checked" : "" ?>> <label for="other">Other</label>
        </div><br>
        <span class="danger"><?php echo $gender_err; ?></span>
        <br><br>
        
        <label class="label">City</label>
        <select name="city" style="width: 190px">

            <option value="">Select</option>
            <option value="toronto" <?= ($city === "toronto") ? "selected" : "" ?>>Toronto</option>
            <option value="mississauga" <?= ($city === "mississauga") ? "selected" : "" ?>>Mississauga</option>
            <option value="scarbrough" <?= ($city === "scarbrough") ? "selected" : "" ?>>Scarbrough</option>
            <option value="brampton" <?= ($city === "brampton") ? "selected" : "" ?>>Brampton</option>
        </select>
        <br>
        <span class="danger"><?php echo $city_err; ?></span>
        
        <div class="clear"></div>
        <div class="center">
            <button type="submit" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form><!--onsubmit="return validateForm()"-->