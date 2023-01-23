<?php
// session_start();

require_once("Database.php");

class Comment extends Database
{

    public function store($fields)
    {
        $implodeColumns = implode(", ", array_keys($fields));
        $implodePlaceholder = implode(", :", array_keys($fields));
        $sql = "INSERT INTO comments($implodeColumns) VALUES(:" . $implodePlaceholder . ") ";

        $stmt = $this->open()->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(":" . $key, $value);
        }

        $stmtExec = $stmt->execute();

        if ($stmtExec) {
            return TRUE;
        }
    }

    public function comments($post_id, $limit)
    {
        $sql = "SELECT * FROM comments WHERE `post_id` = '$post_id' ORDER BY id DESC LIMIT $limit";

        $comments = $this->open()->prepare($sql);
        $comments->execute();

        if ($comments->rowCount() > 0) {
            while ($row = $comments->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return json_encode($data);
        } else {
            return null;
        }
    }

    public function initial($post_id)
    {
        $sql = "SELECT * FROM comments WHERE `post_id` = '$post_id' ORDER BY id DESC LIMIT 3";

        $comments = $this->open()->prepare($sql);
        $comments->execute();

        if ($comments->rowCount() > 0) {
            while ($row = $comments->fetch(PDO::FETCH_OBJ)) {
                $data[] = $row;
            }
            return json_encode($data);
        } else {
            return null;
        }
    }

    public function show($post_id, $name, $comment)
    {
        $sql = "SELECT * FROM comments WHERE 
        `post_comment` = '$comment' AND `name` = '$name' AND `post_id` = '$post_id' ";
        $stmt = $this->open()->prepare($sql);
        $stmt->bindValue(":post_comment", $comment);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":post_id", $post_id);
        $stmt->execute();
        $comment = $stmt->fetch(PDO::FETCH_OBJ);
        return $comment;
    }
}
