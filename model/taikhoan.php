<?php
//
function insert_tk($email, $name, $pass)
{
      $sql = "insert into taikhoan(user,pass,email) values('$name','$pass','$email')";
      pdo_execute($sql);
}
//

function check_user($name, $pass)
{
      $sql = "select * from taikhoan where user='".$name."' AND pass='".$pass."'";
      $result = pdo_query_one($sql);
      return $result;
}

function check_email($email)
{
      $sql = "select * from taikhoan where email='".$email."'";
      $result = pdo_query_one($sql);
      return $result;
}

//
function update_tk($id,$user, $pass, $email,$address,$tel)
{
      $sql = "update taikhoan set user='$user',pass='$pass',email='$email',address='$address',tel='$tel'  where id=$id";
      pdo_execute($sql);
}

function load_list_tk()
{
      $sql = "SELECT * FROM taikhoan order by id desc ";
      $listtk = pdo_query($sql);
      return $listtk;
}
//
function delete_tk($id)
{
      $sql = "delete from taikhoan where id=" . $id;
      $result = pdo_execute($sql);
}
//

