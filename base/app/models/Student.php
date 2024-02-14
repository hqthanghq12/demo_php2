<?php
require_once 'app/models/BaseModel.php';
function getListStudent() {
    $sql = "select * from sinh_vien";
    return loadAllRows([],$sql);
}
?>