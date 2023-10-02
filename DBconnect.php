<?php
class DBconnec {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "project";
    private $conn;

    // Constructor
    function __construct($server = "localhost", $sys_username = "root", $sys_password = "") {
        $this->server = $server;
        $this->username = $sys_username;
        $this->password = $sys_password;
        $this->Connect(); // Add this line to establish the connection
    }
    

    function Connect() {
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function setDatabase($DatabaseName) {
        $this->Connect();
        $this->dbname = $DatabaseName;
        $this->conn->select_db($this->dbname) or die("Không chọn được database: " . $this->conn->error);
    }

    function select($sql) {
        $result = $this->conn->query($sql);
        if ($result) {
           
            return $result;
        } else {
            echo "Lỗi select: " . $this->conn->error;
            return [];
        }
    }

    function insert($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            echo "Lỗi insert: " . $this->conn->error;
            return false;
        }
        return true;
    }

    function update($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            echo "Lỗi update: " . $this->conn->error;
            return false;
        } else {
            return true;
        }
    }

    function delete($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            echo "Lỗi delete: " . $this->conn->error;
            return false;
        } else {
            return true;
        }
    }
    public function showdb($tableName, $columnNames) {
		
	}
	

    function escapeString($str) {
        return $this->conn->real_escape_string($str);
    }

    function getLastInsertedId() {
        return $this->conn->insert_id;
    }

    function getAffectedRows() {
        return $this->conn->affected_rows;
    }

    function __destruct() {
        $this->conn->close();
    }
}

?>
