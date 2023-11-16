<?php

use App\Libraries\MyClass;

use App\Models\Contact;

$id = $_REQUEST['id'];
$contact = contact::find($id);
if ($contact == NULL) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);

    header("location:index.php?option=contact");
}
?>
<?php require_once('../views/backend/header.php'); ?>
<<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <strong class="text-dark text-lg">CHI TIẾT THÔNG TIN LIÊN HỆ</strong>
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
                        <a class="btn btn-sm btn-success" href="index.php?option=contact">
                            <i class="fas fa-arrow-left"></i> Quay lại trang liên hệ
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
                            <?= $contact->id; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Họ Tên</td>
                        <td>
                            <?= $contact->name; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Email</td>
                        <td>
                            <?= $contact->email; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Số điện thoại </td>
                        <td>
                            <?= $contact->phone; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Tiêu đề </td>
                        <td>
                            <?= $contact->title; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Chi tiết </td>
                        <td>
                            <?= $contact->content; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Nội dung liên hệ</td>
                        <td>
                            <?= $contact->replay_id; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Ngày tạo </td>
                        <td>
                            <?= $contact->created_at; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Người cập nhật </td>
                        <td>
                            <?= $contact->updated_by; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Ngày cập nhật </td>
                        <td>
                            <?= $contact->updated_at; ?>
                        </td>
                    </tr>

                    <tr>
                        <td> Trạng thái </td>
                        <td>
                            <?= $contact->status; ?>
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