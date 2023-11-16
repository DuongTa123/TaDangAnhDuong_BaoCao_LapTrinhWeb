<?php

use App\Models\User;

$list = user::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả khách hàng</h1>
                  <a href="index.php?option=customer&cat=create" class="btn btn-sm btn-primary">Thêm khách hàng</a>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=user&cat=trash" class="btn btn-danger btn-sm">Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:100px;">Hình ảnh</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Tên Đăng Nhập</th>
                        <th>Mật Khẩu</th>
                        <th>Địa Chỉ </th>

                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/user/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                              </td>
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $item->name; ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=user&cat=status&id=<?= $item->id; ?>
                                       " class="btn btn-success btn-xs"><i class="fas fa-toggle-on"></i>Hiện
                                       </a>
                                    <?php else : ?>
                                       <a href="index.php?option=user&cat=status&id=<?= $item->id; ?>
                                       " class="btn btn-danger btn-xs"><i class="fas fa-toggle-off"></i>Ẩn
                                       </a>
                                    <?php endif; ?>

                                    <a href="index.php?option=user&cat=edit&id=<?= $item->id; ?>
                                       " class="btn btn-primary btn-xs"><i class="fas fa-edit"></i>Chỉnh sửa</a>
                                    <a href="index.php?option=user&cat=show&id=<?= $item->id; ?>
                                       " class="btn btn-info btn-xs"><i class="fas fa-eye"></i>Chi tiết</a>
                                    <a href="index.php?option=user&cat=delete&id=<?= $item->id; ?>
                                       " class="btn btn-danger btn-xs"><i class="fas fa-trash"></i>Xoá</a>
                                 </div>
                              </td>
                              <td>
                                 <?= $item->phone; ?>
                              </td>
                              <td>
                                 <?= $item->email; ?>
                              </td>
                              <td>
                                 <?= $item->username; ?>
                              </td>
                              <td>
                                 <?= $item->password; ?>
                              </td>
                              <td>
                                 <?= $item->address; ?>
                              </td>

                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>