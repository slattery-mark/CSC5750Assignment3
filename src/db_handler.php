<?php
    class DB_Handler {   
        private $conn;

        private function connect() {
            try {
                $this->conn = mysqli_connect($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
            }
            catch (Exception $e) {
                echo "<script>console.log('connection error');</script>";
                echo nl2br("Connection error:\n" . $e);
            }
        }
    
        public function execute_prepared_stmt(string $sql, string $types, $param) {
            echo "<script>console.log('4');</script>";
            $this->connect();
            echo "<script>console.log('5');</script>";
            $stmt = mysqli_prepare($this->conn, $sql);
            echo "<script>console.log('6');</script>";
            mysqli_stmt_bind_param($stmt, $types, $param);
            echo "<script>console.log('7');</script>";
            mysqli_stmt_execute($stmt);
            echo "<script>console.log('8');</script>";
            $res = mysqli_stmt_get_result($stmt);
            echo "<script>console.log('9');</script>";
            mysqli_close($this->conn);
            echo "<script>console.log('10');</script>";
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