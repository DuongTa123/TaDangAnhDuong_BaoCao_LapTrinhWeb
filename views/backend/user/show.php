<?php

use App\Libraries\MyClass;

use App\Models\User;

$id = $_REQUEST['id'];
$user = user::find($id);
if ($user == NULL) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

    header("location:index.php?option=user");
}
?>
<?php require_once('../views/backend/header.php'); ?>
<<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="text-dark text-lg">CHI TIẾT THÔNG TIN THÀNH VIÊN</strong>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-success" href="index.php?option=user">
                            <i class="fas fa-arrow-left"></i> Quay lại trang thành viên
                        </a>


                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>Tên trường</th>
                        <th>Giá trị</th>
                    </tr>

                    <tr>
                        <td> id</td>
                        <td>
                            <?= $user->id; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Tên thành viên</td>
                        <td>
                            <?= $user->name; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Tên đăng nhập </td>
                        <td>
                            <?= $user->username; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Mật khẩu </td>
                        <td>
                            <?= $user->password; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Email </td>
                        <td>
                            <?= $user->email; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Giới tính </td>
                        <td>
                            <?= $user->gender; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Số điện thoại</td>
                        <td>
                            <?= $user->phone; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Hình ảnh </td>
                        <td>
                            <img class="img-fluid" src="../public/images/user/<?= $user->image; ?>" alt="<?= $user->image; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> Quyền truy cập </td>
                        <td>
                            <?= $user->roles; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Địa chỉ </td>
                        <td>
                            <?= $user->address; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Ngày tạo </td>
                        <td>
                            <?= $user->created_at; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Người tạo </td>
                        <td>
                            <?= $user->created_by; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Người cập nhật </td>
                        <td>
                            <?= $user->updated_by; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Ngày cập nhật </td>
                        <td>
                            <?= $user->updated_at; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Trạng thái </td>
                        <td>
                            <?= $user->status; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">

            </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <?php require_once('../views/backend/footer.php'); ?>