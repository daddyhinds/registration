<?php
    class crud{
        // private database object\
        private $db;
        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db =$conn;
        }
        // function to insert a new record into the registration database
        public function insertRegistrants($fname, $lname, $gender, $address, $dop, $email,$trn, $mtype, $avatar_path){
            try { 
                $sql ="INSERT INTO registrant (firstname, lastname, gender, homeaddress, dateofpurchase, emailaddress, trnnumber, mtype_id, avatar_path) VALUES (:fname, :lname, :gender,:address, :dop, :email, :trn, :mtype, :avatar_path)";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual value
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':address',$address);
                $stmt->bindparam(':dop',$dop);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':trn',$trn);
                $stmt->bindparam(':mtype',$mtype);
                $stmt->bindparam(':avatar_path',$avatar_path);


                $stmt->execute();
                return true;

             } catch(PDOException $e){
                 echo $e->getMessage() ;
                 return false;
             }
        }

        public function editRegistrant($id,$fname, $lname, $gender, $address,$dop, $email,$trn, $mtype){
            try{
                $sql = "UPDATE `registrant` SET `firstname`=:fname,`lastname`=:lname,`gender`=:gender,`homeaddress`=:address,`dateofpurchase`=:dop,`emailaddress`=:email,`trnnumber`=:trn,`mtype_id`=:mtype WHERE registrant_id = :id";
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual value
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dop',$dop);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':trn',$trn);
                $stmt->bindparam(':mtype',$mtype);

                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage() ;
                return false;

            }
            
        }
        
        public function getRegistrants(){
            try{
                $sql = "SELECT * FROM `registrant` a inner join models s on a.mtype_id = s.mtype_id";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage() ;
                return false;
            }
        }

        public function getRegistrantDetails($id){
            try{
                $sql = "SELECT * FROM registrant a inner join models s on a.mtype_id = s.mtype_id where registrant_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                    echo $e->getMessage() ;
                    return false;
            }
        }
        public function deleteRegistrant($id){
            try{
                $sql = "delete from registrant where registrant_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage() ;
                return false;
            }
            

        }
        public function getModels(){
            try{
                $sql = "SELECT * FROM `models`;";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage() ;
                return false;
            }
        }    
            public function getModelById($id){
                try{
                    $sql = "SELECT * FROM `models` where mtype_id = :id;";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    return $result;
                }catch(PDOException $e){
                    echo $e->getMessage() ;
                    return false;
                }    
        }
    }
?>
