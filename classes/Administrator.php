<?php 
// session_start();

require_once("Database.php");

class Administrator extends Database 
{
    public function store($fields)
    {
        $implodeColumns = implode(", ", array_keys($fields));
        $implodePlaceholder = implode(", :", array_keys($fields));
        $sql = "INSERT INTO admins($implodeColumns) VALUES(:".$implodePlaceholder.") ";

        $stmt = $this->open()->prepare($sql);

        foreach($fields as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }

        $stmtExec = $stmt->execute();

        if($stmtExec) {
            $_SESSION["admin_reg_success"] = tRUE;
            header("location: ../views/admin-homepage.php#admin_profile_frame");
            exit();                                                                       
        }
    }

    public function all() 
    {
        $sql = "SELECT * FROM admins ORDER BY id DESC";
        
        $result = $this->open()->prepare($sql);
        $result->execute();
        
        if($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return $data;
        }else{
            return "invalid";
        }
    }

    public function show($id)
    {
        $sql = "SELECT * FROM admins WHERE id = '$id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_OBJ);
        return $post;
    }

    public function valid($email)
    {
        $sql = "SELECT * FROM admins WHERE `email` = '$email' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        
        if($stmt->rowCount() > 0)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM admins WHERE `email` ='$email' AND  `password` = '$password' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $password);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $credentials = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION["admin_login_success"] = TRUE;
            $_SESSION["admin_id"] = $credentials->id;
            $_SESSION["admin_name"] = $credentials->name;
            $_SESSION["admin_email"] = $credentials->email;
            $_SESSION["admin_phone"] = $credentials->phone;
            $_SESSION["admin_role"] = $credentials->role;
            $_SESSION["admin_status"] = $credentials->status;
            $_SESSION["admin_image"] = $credentials->image;
            header("location: ../views/admin-homepage.php");
            exit();
        }
        else 
        {
            return FALSE;
        }
    }

    public function update_with_image($fields, $id)
    {
        $sql = "UPDATE admins 
        SET name=:name, 
            email=:email, 
            phone=:phone, 
            status=:status, 
            image=:image 
            WHERE id = '$id' ";
        $stmt = $this->open()->prepare($sql);
        
        foreach($fields as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }
        $stmtExec = $stmt->execute(); 
        
        if ($stmtExec) {
            return TRUE;
        }
    }

    public function update_without_image($fields, $id)
    {
        $sql = "UPDATE admins 
        SET name=:name, 
            email=:email, 
            phone=:phone, 
            status=:status
            WHERE id = '$id' ";
        $stmt = $this->open()->prepare($sql);
        
        foreach($fields as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }
        $stmtExec = $stmt->execute(); 
        
        if ($stmtExec) {
            return TRUE;
        }
    }

    public function new_credentials($email)
    {
        $sql = "SELECT * FROM admins WHERE `email` = '$email' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) 
        {   
            while($credentials = $stmt->fetch(PDO::FETCH_OBJ)) {

                $_SESSION["admin_id"] = $credentials->id;
                $_SESSION["admin_name"] = $credentials->name;
                $_SESSION["admin_email"] = $credentials->email;
                $_SESSION["admin_phone"] = $credentials->phone;
                $_SESSION["admin_role"] = $credentials->role;
                $_SESSION["admin_status"] = $credentials->status;
                $_SESSION["admin_image"] = $credentials->image;   

                $_SESSION["account_update_success"] = TRUE;
                $_SESSION["admin_icon"] = '<i class="fa fa-user-tie fa-2x"></i>';
                header("location: ../views/admin-homepage.php");
                exit();
            }
        } 
        else 
        {
            return FALSE;
        }
    }

    public function valid_old_password($password, $id) 
    {
        $sql = "SELECT password FROM admins WHERE `password` = '$password' AND `id` = '$id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {   
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function change_password($encrypted_new_password, $id)
    {
        $sql = "UPDATE admins SET `password` = '$encrypted_new_password' WHERE id = '$id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmtExec = $stmt->execute();
        
        if($stmtExec)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        } 
    }


}
