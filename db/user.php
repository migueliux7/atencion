<?php
    class user {
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($username, $password){
            try {
                $result = $this->getUserbyUsername($username);
                if($result['num'] > 0){
                    return false;
                } else {
                    $new_password = md5($password.$username);
                    $sql = "insert into users (username, password )
                    values(:username, :password)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':username', $username);
                    $stmt->bindparam(':password', $new_password);
                    //Ejecuta el statement
                    $stmt->execute();
                    return true;
                }
            } catch (PDOException $th) {
                echo $th->getMessage();
                return false;
            }
        }

        public function getUser($username, $password){
            try{
                $sql = "select * from users where username = :username and password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $th){
                echo $th->getMessage();
            }
        }

        public function getUserbyUsername($username){
            try{
                $sql = "select count(*) as num from users where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $th){
                echo $th->getMessage();
            }
        }

    }
?>
