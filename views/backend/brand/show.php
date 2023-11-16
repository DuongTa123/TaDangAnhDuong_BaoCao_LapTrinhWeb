<?php

use App\Libraries\MyClass;
use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::find($id);
if ($brand == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi trang 404']);
    header("location:index.php?option=brand");
}
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chi Tiết Thương Hiệu</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header ">
                <div class="row">

                    <div class="col-md-12 text-right">
                        <a href="index.php?option=brand" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên thương hiệu</th>
                                    <th>Tên slug</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><img style="width:100px" ; src=" ../public/images/brand/
                                    <?= $brand->image; ?>" alt="<?= $brand->image; ?>"> </td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td>Id</td>
                                    <td><?= $brand->id; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>