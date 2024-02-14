<?php
include_once 'app/models/Student.php';
include_once 'app/controllers/BaseController.php';
function getStudent() {
    $students = getListStudent();
    return render('student.index',compact('students'));
}