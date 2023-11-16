<?php

use App\Libraries\MyClass;
use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::find($id);
if ($brand == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi trang 404']);
    header("location:index.php?option=brand&cat=trash");
}
$brand->delete(); //xóa khỏi database
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
header("location:index.php?option=brand&cat=trash");
