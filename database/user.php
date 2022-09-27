<?php

class user
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli("localhost","root","","user");
    }

    public function insert($name,$username,$email,$address_city,$address_street)
    {
       $data = $this->connection->query("INSERT INTO `user`(`name` , `username` , `email` , `address_city` , `address_street`) VALUES ('$name','$username','$email','$address_city','$address_street')");
       $check = $this->connection->affected_rows;
       if($check == 1){
        return true;
       }else{
        return false;
       }
    }


    public function delete($id)
    {
        $data = $this->connection->query("DELETE FROM `user` WHERE `id`=$id");

        if($this->connection->affected_rows == 1){
            return true;
           }else{
            return false;
           }
    }


    public function update($username,$email,$phone,$id)
    {
        $data = $this->connection->query("UPDATE `user` SET `username`='$username' , `email`='$email' , `phone` = '$phone' WHERE `id`=$id ");

        if($this->connection->affected_rows == 1){
            return true;
           }else{
            return false;
           }
    }


    public function select()
    {
        $data = $this->connection->query("SELECT * FROM `user`");

        $all = [];
        
        while($d = $data->fetch_assoc())
        {
            $all[] = $d;
        }
        return $all;
    }

}













?>