<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

// function encodeUserId($id) {
//     $mapping = [
//         2 => '*&BUYG',
//         3 => ')(*YH'
//     ];
//     return array_key_exists($id, $mapping) ? $mapping[$id] : null;
// }

// function decodeUserId($encodedId) {
//     $mapping = [
//         '*&BUYG' => 2,
//         ')(*YH' => 3
//     ];
//     return array_key_exists($encodedId, $mapping) ? $mapping[$encodedId] : null;
// }
function encodeUserId($id)
{
    return base64_encode($id); // Mã hóa ID
}

function decodeUserId($encodedId)
{
    return base64_decode($encodedId); // Giải mã ID
}


$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    // Giải mã ID
    $_id = decodeUserId($_GET['id']);
    $user = $userModel->findUserById($_id); // Update existing user
}



if (!empty($_POST['submit'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Validate name
    if (empty($name)) {
        $errors[] = "Invalid name";
    } elseif (!preg_match("/^[A-Za-z0-9]{5,15}$/", $name)) {
        $errors[] = "Name from 5 to 15 characters, (A-Z), (a-z), (0-9).";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
        $errors[] = "Password must be 5 to 10 characters long and contain (a-z), (A-Z), (0-9) and one special character.";
    }

    // Nếu không có lỗi, thực hiện cập nhật
    if (empty($errors)) {
        if (!empty($_id)) {
            $_POST['id'] = $_id;
            $userModel->updateUser($_POST);
            header('location: list_users.php');
            exit;
        } else {
            $userModel->insertUser($_POST);
            header('location: list_users.php');
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) {
                        echo htmlspecialchars($error) . '<br>';
                    } ?>
                </div>
            <?php } ?>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id !== null ? encodeUserId($_id) : ''; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name"
                        value='<?php if (!empty($user[0]['name']))
                            echo htmlspecialchars($user[0]['name']); ?>'>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>