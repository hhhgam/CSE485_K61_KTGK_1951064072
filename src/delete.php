<?php
    // admin.php TRUYỀN DỮ LIỆU SANG
    // deleteEmployee: NHẬN DỮ LIỆU TỪ admin.php gửi sang
    $maduan = $_GET['maduan'];

    // Bước 01: Kết nối Database Server
    $conn = mysqli_connect('localhost','root','','1951064072_kttv_bdkh');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    // Bước 02: Thực hiện truy vấn
    $sql = "DELETE FROM duan WHERE maduan = '$maduan'";

    $number = mysqli_query($conn,$sql);

    if($number > 0){
        header("location: index.php"); //Chuyển hướng về Trang quản trị
    }else{
        header("location: error.php"); //Chuyển hướng, hiển thị thông báo lỗi
    }

    // Bước 03: Đóng kết nối
    mysqli_close($conn);
?>