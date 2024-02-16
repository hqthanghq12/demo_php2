<?php
namespace App\Models;
//require_once 'app/models/BaseModel.php';
class Student extends BaseModel{
    protected $table = 'sinh_vien';
   public function getListStudent() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addStudent($id, $name, $year_of_birth, $phone_number){
       $sql = "INSERT INTO $this->table VALUES (?, ?, ?, ?)";
       $this->setQuery($sql);
       return $this->execute([$id, $name, $year_of_birth, $phone_number]);
    }
    public function deleteStudent($id){
       $sql = "DELETE FROM $this->table WHERE id = ?";
       $this->setQuery($sql);
       return $this->execute([$id]);
    }
    public function detailStudent($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editStudent($id, $name, $year_of_birth, $phone_number){
        $sql = "UPDATE $this->table SET name = ?, year_of_birth = ?, phone_number = ? WHERE id= ?";
        $this->setQuery($sql);
        return $this->execute([ $name, $year_of_birth, $phone_number, $id]);
    }
}

?>