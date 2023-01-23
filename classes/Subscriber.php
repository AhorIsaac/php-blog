<?php 

require_once("Database.php");

class Subscriber extends Database 
{
    public function store($fields)
    {
        $implodeColumns = implode(", ", array_keys($fields));
        $implodePlaceholder = implode(", :", array_keys($fields));
        $sql = "INSERT INTO subscribers($implodeColumns) VALUES(:".$implodePlaceholder.") ";

        $stmt = $this->open()->prepare($sql);

        foreach($fields as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }

        $stmtExec = $stmt->execute();

        if($stmtExec) {
            return TRUE;                                                                       
        }
    }

    public function valid($email)
    {
        $sql = "SELECT * FROM subscribers WHERE `email` = '$email' ";
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

    public function all() 
    {
        $sql = "SELECT * FROM subscribers ORDER BY id DESC";
        
        $result = $this->open()->prepare($sql);
        $result->execute();
        
        if($result->rowCount() > 0) 
        {
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return "invalid";
        }
    }

    public function total()
    {
        $sql = "SELECT COUNT(*) AS total FROM `subscribers` ";
        $stmt = $this->open()->prepare($sql);
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_OBJ);
        return $total;        
    }

    public function limited_number_of_subscribers($offset, $total_records_per_page)
    {
        $sql = "SELECT * FROM `subscribers` LIMIT $offset, $total_records_per_page";
        $result = $this->open()->prepare($sql);
        $result->execute();
        
        if($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return "invalid";
        }
    }

}
