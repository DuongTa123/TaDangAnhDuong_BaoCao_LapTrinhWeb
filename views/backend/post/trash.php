<?php

use App\Models\Post;

$list = post::join('topic', 'post.topic_id', '=', 'topic.id')
   ->where('post.status', '=', 0)
   ->orderBy('post.created_at', 'desc')
   ->select("post.*", "topic.name as topic_name")
   ->get();


?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thùng rác bài viết</h1>

               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header p-2">
               <div class="row">
                  <div class="col-md-5">
                     <!-- <a href="index.php?option=post">Tất cả</a> |
                     <a href="index.php?option=post&cat=trash"> Thùng rác</a> -->
                  </div>

                  <div class="col-md-7 text-right">
                     <a href="index.php?option=post" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
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
                              <th>Tiêu đề bài viết</th>
                              <th>Tên chủ đề</th>
                              <th>Mô tả</th>
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
                                       <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                    </td>
                                    <td>
                                       <div class="title">
                                          <?= $item->title; ?>
                                       </div>
                                       <div class="function_style">
                                          <a href="index.php?option=post&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                             <i class="fas fa-undo"></i> Khôi Phục
                                          </a>
                                          <a href="index.php?option=post&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                             <i class="fas fa-trash"></i> Xóa VV
                                          </a>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="topic_id">
                                          <?= $item->topic_name; ?>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="description">
                                          <?= $item->description; ?>
                                       </div>
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