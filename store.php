<?php
session_start();
include 'conn.php';
include 'user_table.php';
$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['user_name']) && !empty(trim($_POST['user_name']))) {
        $user_name = trim($_POST['user_name']);
    } else {
        $errors[] = 'please enter name';
    }

    if (isset($_POST['last_name']) && !empty(trim($_POST['last_name']))) {
        $last_name = trim($_POST['last_name']);
    } else {
        $errors[] = 'please enter last name';
    }

    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = trim($_POST['email']);
    } else {
        $errors[] = 'please enter valid email';
    }

    if (isset($_POST['age']) && !empty(trim($_POST['age']))) {
        $age = trim($_POST['age']);
    } else {
        $errors[] = 'please enter age';
    }

    if (isset($_POST['password']) && strlen(trim($_POST['password'])) >= 6) {
        $plain_password = trim($_POST['password']);
    } else {
        $errors[] = 'password must be 6 characters long';
    }

    $confirm_password = $_POST['confirm_password'] ?? '';

    if (isset($_POST['city']) && !empty(trim($_POST['city']))) {
        $city = trim($_POST['city']);
    } else {
        $errors[] = 'please enter city';
    }

    if (isset($_POST['gender']) && !empty(trim($_POST['gender']))) {
        $gender = trim($_POST['gender']);
    } else {
        $errors[] = 'please enter gender';
    }

    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : '';

    $user_image = $_FILES['user_image'];
    $user_cv = $_FILES['user_cv'];

    $pdf_txt = strtolower(pathinfo($user_cv['name'], PATHINFO_EXTENSION));
    $pdf_ext = ['pdf'];

    $img_txt = strtolower(pathinfo($user_image['name'], PATHINFO_EXTENSION));
    $img_ext = ['jpg', 'png', 'jpeg', 'gif'];

    if (
        in_array($img_txt, $img_ext) && $user_image['error'] === 0 &&
        in_array($pdf_txt, $pdf_ext) && $user_cv['error'] === 0
    ) {
        $newName = uniqid("IMG") . '.' . $img_txt;
        $imgpath = "uploads/img/$newName";

        $pdf_new_name = uniqid("pdf") . '.' . $pdf_txt;
        $pdf_path = "uploads/pdf/$pdf_new_name";

        if (!is_dir('uploads/img')) mkdir('uploads/img', 0755, true);
        if (!is_dir('uploads/pdf')) mkdir('uploads/pdf', 0755, true);
    } else {
        $errors[] = "invalid file type";
    }

    if (empty($errors)) {
        if ($plain_password === $confirm_password) {
            if (move_uploaded_file($user_image['tmp_name'], $imgpath) &&
                move_uploaded_file($user_cv['tmp_name'], $pdf_path)
            ) {

                $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
                $sql = $conn->prepare("INSERT INTO user_info(user_name, last_name, email, age, password, city, gender, skills, user_image, user_cv)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $sql->bind_param("ssssssssss", $user_name, $last_name, $email, $age, $hashed_password, $city, $gender, $skills, $newName, $pdf_new_name);

                if ($sql->execute()) {
                    $_SESSION['success'] = "form submitted successfully";
                } else {
                    $_SESSION['error'] = "failed to insert data in database";
                }
            } else {
                $_SESSION['error'] = "failed to move file";
            }
        } else {
            $_SESSION['error'] = "password and confirm password are not matching";
        }
    } else {
        $_SESSION['errors'] = $errors;
    }

    header("location: registration_page.php");
    exit;
}
?>
