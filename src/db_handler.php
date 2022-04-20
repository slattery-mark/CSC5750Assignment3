<?php
    class DB_Handler {   
        private $conn;

        private function connect() {
            try {
                $this->conn = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
            }
            catch (Exception $e) {
                echo "<script>alert('connection error');</script>";
                echo nl2br("Connection error:\n" . $e);
            }
        }
    
        public function execute_prepared_stmt(string $sql, string $types, &...$params) {
            $this->connect();

            print_r($params);
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, $types, $params);
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