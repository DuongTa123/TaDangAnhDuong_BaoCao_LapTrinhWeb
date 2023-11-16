<?php

use App\Models\page;
use App\Models\Topic;

$list_topic = Topic::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();

$topic_id_html = "";


// foreach ($list_topic as $topic) {
//    $topic_id_html .= "<option value ='$topic->id'>$topic->name</option>";
// }


$id = $_REQUEST['id'];
$page =  page::find($id);

foreach ($list_topic as $topic) {
   if ($page->topic_id == $topic->id) {
      $topic_id_html .= "<option value='$topic->id' selected>$topic->name</option>";
   } else {
      $topic_id_html .= "<option value='$topic->id'>$topic->name</option>";
   }
}
$topic_id_html .= "</select>";

if ($page == null) {
   header("location:index.php?option=page");
}


?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhập bài viết</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=page" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $page->id; ?>" />
                        <label>Tiêu đề bài viết (*)</label>
                        <input type="text" value="<?= $page->title; ?>" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Kiểu mẫu (*)</label>
                        <input type="text" value="<?= $page->type; ?>" name="type" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" value="<?= $page->slug; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"><?= $page->description; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea name="detail" rows="5" class="form-control"><?= $page->detail; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <option value="">Tên chủ đề (Topic)</option>
                           <?= $topic_id_html; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                        <img src="../public/images/page/<?= $page->image; ?>">

                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($page->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($page->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>