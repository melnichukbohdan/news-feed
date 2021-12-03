<?php

class NewsDB implements INewsDB
{

    private $host;
    private $user;
    private $password;
    private $db;
    public $_db;

    function __construct()
    {
        $this->dbConnect();
    }

    public function dbConnect()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->db = 'news';

        $this->_db = new mysqli($this->host, $this->user, $this->password, $this->db);
        return $this->_db;
    }

    function __destruct()
    {
        unset($this->bdConnect);
    }

    function __get($name)
    {
        if ($name == 'db') {
            return $this->_db;
        } else {
            throw new Exception('Wrong property name');
        }
    }

    function __set($name, $value)
    {
        if ($name == 'db') {
            throw new Exception('Wrong property name');
        }
    }

    /**
     * InHerDoc
     */
    public function saveNews($title, $category, $description, $source)
    {
        $datatime = time();
        $mysql = $this->dbConnect();
        $sqlInsert = $mysql->prepare("INSERT INTO message(title, category, description, source, datetime) 
                                            VALUES (?, ?, ?, ?, ?)");
        $sqlInsert->bind_param('sissi', $title, $category, $description, $source, $datatime);
        return $sqlInsert->execute();
    }

    /**
     * InHerDoc
     */
    public function getNews()
    {
        $mysqli = $this->dbConnect();
        $sqlSelect = "SELECT message.id as id, title, description, category.name as category, source,datetime
                      FROM message, category
                      WHERE category.id = message.category
                      ORDER BY message.id DESC";
        $result = $mysqli->query($sqlSelect);
        return $this->toArray($result);
    }

    //conversion of data from DB to associative array
    public function toArray($data)
    {
        $arr = [];
        while ($row = $data->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    /**
     * InHerDoc
     */
    public function deleteNews($id)
    {
        $mysqli = $this->dbConnect();
        $sqlDelete = "DELETE FROM message WHERE id = $id";
        $result = $mysqli->query($sqlDelete);
        return $result;
    }
}
