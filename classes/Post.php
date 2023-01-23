<?php 
// session_start();

require_once("Database.php");

class Post extends Database 
{
    public function store($fields)
    {
        $implodeColumns = implode(", ", array_keys($fields));
        $implodePlaceholder = implode(", :", array_keys($fields));
        $sql = "INSERT INTO posts($implodeColumns) VALUES(:".$implodePlaceholder.") ";

        $stmt = $this->open()->prepare($sql);

        foreach($fields as $key => $value) {
            $stmt->bindValue(":".$key, $value);
        }

        $stmtExec = $stmt->execute();

        if($stmtExec) {
            $_SESSION["post_created"] = '
                <div class="alert alert-success alert-dismissible fade show text-center d-inline-block" style="font-family: monospace; display: inline-block;">
                    <button role="button" class="close" data-dismiss="alert"> <span aria-hidden="true">&times;</span> </button>
                    <h6 class="alert-heading"> Post Created Successfully! </h6>
                </div>';
            header("location: ../views/blog.php");
            exit();                                                                       
        }
    }

    public function index($limit) 
    {
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $limit";
        
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

    public function initial() 
    {
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
        
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
        $sql = "SELECT * FROM posts WHERE id = '$id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_OBJ);
        return $post;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = '$id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return TRUE;
        }
    }

    public function star($id, $star)
    {
        $sql = "UPDATE posts SET `star` = $star WHERE `id` = '$id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0)
        {
            return TRUE;
        }
    }
}
