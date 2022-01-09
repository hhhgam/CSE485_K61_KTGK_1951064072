<?php
    // Trước khi cho người dùng xâm nhập vào bên trong
    // Phải kiểm tra THẺ LÀM VIỆC
    session_start();
    if(!isset($_SESSION['isLoginOK'])){
        header("location:login.php");
    }
    
    require "template/header.php";
?>
    <main>
        <div class="container">
            <h5 class="text-center text-primary mt-5">Dự án khí tượng thủy văn, biến đổi khí hậu</h5>
            <div>
                <a class="btn btn-primary" href="add_employee.php">Thêm</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Maduan</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">nam thuc hien</th>
                        <th scope="col">linh vuc</th>
                        <th scope="col">nhiem vu</th>
                        <th scope="col">co quan thuc hien</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Vùng này là Dữ liệu cần lặp lại hiển thị từ CSDL -->
                    <?php
                        // Bước 01: Kết nối Database Server
                        $conn = mysqli_connect('localhost','root','','bdkh');
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT nv.maduan, nv.tenduan, nv.namthuchien, nv.linhvuc, nv.nhiemvu, nv.coquanthuchien, FROM bdkh WHERE nv.maduan = dv.maduan";
                        $result = mysqli_query($conn,$sql);
                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $row['maduan']; ?></th>
                                    <td><?php echo $row['tenduan']; ?></td>
                                    <td><?php echo $row['namthuchien']; ?></td>
                                    <td><?php echo $row['linhvuc']; ?></td>
                                    <td><?php echo $row['nhiemvu']; ?></td>
                                    <td><?php echo $row['coquanthuchien']; ?></td>
                                    
                                    <td><a href="update_employee.php?id=<?php echo $row['maduan']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a href="delete_employee.php?id=<?php echo $row['maduan']; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>
                    <?php
                            }
                        }
                        // Bước 04: Đóng kết nối Database Server
                        mysqli_close($conn);
                    ?>
                    
                    
                </tbody>
                </table>
        </div>    
    </main>

<?php
    include("template/footer.php");
?>