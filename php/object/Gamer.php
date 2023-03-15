<?php

/**
 * Description of Department
 *
 * @author https://roytuts.com
 */
class Gamer
{

    // database connection and table name
    private $conn;
    private $table_name = "gamers";
    // object properties
    public $id;
    public $nickname;
    public $age;
    public $level;


    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read gamers
    function read()
    {
        // query to select all
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create gamers
    function create()
    {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET  nickname=:nickname, age=:age, level=:level";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->nickname = htmlspecialchars(strip_tags($this->nickname));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->level = htmlspecialchars(strip_tags($this->level));

        // bind values
        $stmt->bindParam(":nickname", $this->nickname);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":level", $this->level);

        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // update gamers
    function update()
    {
        // update query
        $query = "UPDATE " . $this->table_name . " SET nickname=:nickname, age=:age, level=:level WHERE id=:id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nickname = htmlspecialchars(strip_tags($this->nickname));
        $this->age = htmlspecialchars(strip_tags($this->age));
        $this->level = htmlspecialchars(strip_tags($this->level));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nickname", $this->nickname);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":level", $this->level);

        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete the department
    function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
