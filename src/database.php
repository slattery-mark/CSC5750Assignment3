<?php
    class Database {   
        private $conn;

        private function connect() {
            try {
                $this->conn = mysqli_connect($RDS_HOSTNAME, $RDS_USERNAME, $RDS_PASSWORD, $RDS_DB_NAME, $RDS_PORT);
            }
            catch (Exception $e) {
                echo nl2br("Connection error:\n" . $e);
            }
        }
    
        public function execute_prepared_stmt(string $sql, string $types, mixed &...$params) {
            $this->connect();
        
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            mysqli_close($this->conn);
        
            return $res;
        }
    
        public function execute_stmt(string $stmt) {
            $this->connect();
            
            $res = mysqli_query($this->conn, $stmt);
            mysqli_close($this->conn);
            
            return $res;
        }
    }
?>