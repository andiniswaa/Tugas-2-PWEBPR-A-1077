<?php

require_once 'database.php';

class Contact{
    static function select(){
        global $conn;
        $sql = "SELECT * FROM db_cat_diary";
        $result = $conn->query($sql);
        $arr = array();

        if ($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value){
                    $arr[$key][] = $value;
                }
            }
        }
        return $arr;
    }
    static function insert($id_cat_diary, $nama, $warna, $ras) {
        global $conn;
        $sql = "INSERT INTO`db_cat_diary`(id_cat_diary, nama, warna, ras) VALUES(?,?,?,?,?,?)";
        $stnt = $conn->prepare($sql);
        $stnt->bind_param("sss", $id_cat_diary, $nama, $warna, $ras);
        $stnt->execute();
        $result = $stnt->affected_rows > 0 ? true : false;
        return $result;
    }
    static function update($id_cat_diary, $nama, $warna, $ras) {
        global $conn;
        $sql = "UPDATE db_cat_diary SET nama = ?, warna = ?, ADRESS = ?, ras = ?, PHONE_NUMBER = ? WHERE Id = ?";
        $stnt = $conn->prepare($sql);
        $stnt->bind_param("ssssss", $nama, $warna, $ras, $id_cat_diary);
        $stnt->execute();
        $result = $stnt->affected_rows > 0 ? true : false;
        return $result;
    }
    static function delete($Id) {
        global $conn;
        $sql = "DELETE FROM db_cat_diary WHERE Id = ?";
        $stnt = $conn->prepare($sql);
        $stnt->bind_param("s", $id_cat_diary);
        $stnt->execute();
        $result = $stnt->affected_rows > 0 ? true : false;
        return $result;
    }
}