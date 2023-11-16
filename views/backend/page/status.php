<?php

use App\Libraries\MyClass;
use App\Models\Page;

$id = $_REQUEST['id'];
$page =  page::find($id);
if ($page == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi Trang 404']);
    header("location:index.php?option=page");
}
//
$page->status = ($page->status == 1) ? 2 : 1;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$page->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
header("location:index.php?option=page");
