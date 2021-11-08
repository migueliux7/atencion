<?php
    class crud{
        //objeto privdo database
        private $db;
        //constructo para inicializar la variable privada a la conexion de BD
        function __construct($conn){
            $this->db = $conn;

        }

        public function insert($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                $sql = "insert into attendee (firstname, lastname, birthday, email_address, phone_number, specialty_id )
                values(:fname, :lname,:dob, :email, :contact, :specialty)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                //Ejecuta el statement
                $stmt->execute();
                return true;
            } catch (PDOException $th) {
                echo $th->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            try{
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            } catch(PDOException $th){
                echo $th->getMessage();
            }
        }

        public function getSpecialties(){
            try{
                $sql = "select * from specialties";
                $result = $this->db->query($sql);
                return $result;
            } catch(PDOException $th){
                echo $th->getMessage();
            }
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch(PDOException $th){
                echo $th->getMessage();
            }
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
           try{

           $sql = "update attendee set firstname = :firstname, lastname= :lastname, birthday = :birthday, 
            email_address= :email, phone_number = :contact, specialty_id = :specialty_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':firstname', $fname);
            $stmt->bindparam(':lastname', $lname);
            $stmt->bindparam(':birthday', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':specialty_id', $specialty);

            $stmt->bindparam(':id', $id);
            //Ejecuta el statement
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
        }

        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch(PDOException $e){
                echo 'ocurrio un erroro al borrar';
                return false;
            }
            
        }
    }
?>