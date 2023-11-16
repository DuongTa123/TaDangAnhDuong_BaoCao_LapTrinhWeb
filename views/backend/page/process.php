<?php

use App\Models\Page;
use App\libraries\MyClass;

if (isset($_POST['THEM'])) {
    $page = new page();
    //lấy từ form
    $page->title = $_POST['title'];
    $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
    $page->description = $_POST['description'];
    $page->detail = $_POST['detail'];
    $page->type = $_POST['type'];
    $page->status = $_POST['status'];
    $page->topic_id = $_POST['topic_id'];

    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/page/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $page->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $page->image = $filename;
        }
    }
    //tư sinh ra
    $page->created_at = date('Y-m-d-h:i:s');
    $page->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($page);
    //luu vao csdl
    //ínet
    $page->save();
    //
    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=page");
}

if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $page = page::find($id);
    if ($page == null) {
        header("location:index.php?option=page");
    }
    //lấy từ form
    $page->title = $_POST['title'];
    $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $page->description = $_POST['description'];
    $page->detail = $_POST['detail'];
    $page->type = $_POST['type'];
    $page->status = $_POST['status'];
    $page->topic_id = $_POST['topic_id'];

    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        //


        //
        $target_dir = "../public/images/page/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $page->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $page->image = $filename;
        }
    }
    //tư sinh ra
    $page->updated_at = date('Y-m-d-h:i:s');
    $page->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($page);
    //luu vao csdl
    //ínet
    $page->save();
    //
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=page");
}
