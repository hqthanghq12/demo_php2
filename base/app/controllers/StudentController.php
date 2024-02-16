<?php
namespace App\Controllers;
use App\Models\Student;
//include_once 'app/models/Student.php';
//include_once 'app/controllers/BaseController.php';
class StudentController extends BaseController{
    public $student;
    public function __construct()
    {
        $this->student = new Student();
    }
    public function getStudent() {
        $students = $this->student->getListStudent();
        return $this->render('student.index',compact('students'));
    }
    public function addStudent(){
        return $this->render('student.add');
    }
    public function postStudent(){
        if (isset($_POST['btn-submit'])){
            $error = [];
//            echo 123;
            // validate rỗng
            if(empty($_POST['name'])){
                $error[] = 'Vui lòng nhập tên';
            }
            if(empty($_POST['year_of_birth'])){
                $error[] = 'Vui lòng nhập năm sinh';
            }
            if(empty($_POST['phone_number'])){
                $error[] = 'Vui lòng nhập số điện thoại';
            }
            if(count($error)>=1){
                redirect('errors',  $error, 'add-student');
            }else{
                $check = $this->student->addStudent(NULL, $_POST['name'], $_POST['year_of_birth'], $_POST['phone_number']);
                if ($check){
                    redirect('success',  "Thêm thành công", 'add-student');
                }

            }

        }
    }
    public function deleteStudent($id){
        $check = $this->student->deleteStudent($id);
        if($check){
            redirect('success',  "Xóa thành công", 'list-student');
        }
    }
    public function detailStudent($id){
        $detail = $this->student->detailStudent($id);
        return $this->render('student.edit', compact('detail'));
    }
    public function editStudent($id){
        if (isset($_POST['btn-submit'])){
            $error = [];
//            echo 123;
            // validate rỗng
            if(empty($_POST['name'])){
                $error[] = 'Vui lòng nhập tên';
            }
            if(empty($_POST['year_of_birth'])){
                $error[] = 'Vui lòng nhập năm sinh';
            }
            if(empty($_POST['phone_number'])){
                $error[] = 'Vui lòng nhập số điện thoại';
            }
            $route = 'detail-student/'.$id;
            if(count($error)>=1){
                redirect('errors',  $error, $route);
            }else{
                $check = $this->student->editStudent($id, $_POST['name'], $_POST['year_of_birth'], $_POST['phone_number']);
                if ($check){
                    redirect('success',  "Sửa thành công", $route);
                }

            }

        }
    }
}
