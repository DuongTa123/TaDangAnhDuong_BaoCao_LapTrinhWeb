<?php

use App\Models\Page;

$list = page::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả Page</h1>
                  <!-- <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a> -->
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header p-2">
               <div class="row">
                  <div class="col-md-6">

                     <a href="index.php?option=page&cat=trash" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Thùng rác</a>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
                  </div>
               </div>
               <div class="card-body p-2">
                  <?php require_once "../views/backend/message.php"; ?>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th class="text-center" style="width:200px;">Tên trang</th>
                           <th class="text-center" style="width:200px;">Loại trang</th>
                           <th class="text-center">Chi tiết trang</th>
                           <th class="text-center" style="width:200px;">Chức năng</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0) : ?>
                           <?php foreach ($list as $item) : ?>
                              <tr>
                                 <td class="text-center">
                                    <input type="checkbox" />
                                 </td>
                                 <td class="text-center">
                                    <img src="../public/images/page/<?= $item->image; ?>" class="img-fluid" alt="hinh">
                                 </td>
                                 <td class="text-center">
                                    <?= $item->title; ?>
                                 </td>
                                 <td class="text-center"><?= $item->type; ?> </td>
                                 <td class="text-center"><?= $item->detail; ?> </td>
                                 <td class="text-center">
                                    <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                          <i class="fas fa-toggle-on"></i>Hiện
                                       </a>
                                    <?php else : ?>
                                       <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-dark">
                                          <i class="fas fa-toggle-off"></i>Ẩn
                                       </a>

                                    <?php endif; ?>
                                    <a href="index.php?option=page&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                       <i class="far fa-eye"></i>
                                    </a>
                                    <a href="index.php?option=page&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                       <i class="far fa-edit"></i>
                                    </a>
                                    <a href="index.php?option=page&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                       <i class="fas fa-trash"></i>
                                    </a>

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