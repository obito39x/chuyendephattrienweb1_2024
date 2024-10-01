<?php

session_start(); // Khởi động session

require_once 'models/UserModel.php';
$userModel = new UserModel();
if (!isset($_SESSION['id'])) {
    die('Vui lòng đăng nhập để thực hiện hành động này.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token không hợp lệ!');
    }
    $currentUserId = $_SESSION['id']; 
    $deleteUserId = $_POST['id'];
    if ($currentUserId !== $deleteUserId) {
        die('Bạn không có quyền xóa người dùng này!');
    }
    $userModel->deleteUserById($deleteUserId);
    
    header('location: list_users.php');
    exit();
}

// Nếu truy cập bằng phương thức GET, chuyển hướng về trang danh sách
header('location: list_users.php');
exit();
