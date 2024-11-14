<?php

class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Constructor to initialize database connection details
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    // Method to create a connection
    public function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn; // Return the connection object
    }

    // Method to close the connection
    public function close()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}