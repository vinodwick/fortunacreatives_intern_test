<?php

namespace Classes;

class User extends DB
{
    private $firstName;
    private $lastName;
    private $email;
    private $id;
    
    
        /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function insert()
    {
        $query = "insert into users(email,first_name, last_name) 
            values(
            '".$this->getEmail()."',
            '".$this->getFirstName()."',
            '".$this->getLastName()."'
            )";
            return mysqli_query($this->db, $query);
        if(mysqli_query == true){
            session_start();
            $_SESSION['message']='Record Has been Added';
             header("location:list.php");
        }
    }

  public function getAll()
    {
        $query = 'select * from users';
        $result = mysqli_query($this->db, $query);
        $users = [];
        if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_assoc($result)) {
                $thisUser = new self();
                $thisUser->setId($user['id']);
                $thisUser->setFirstName($user['first_name']);
                $thisUser->setLastName($user['last_name']);
                $thisUser->setEmail($user['email']);
                $users[] = $thisUser;
            }
        }

        return $users;
    }
    
    
    public function update()
    {
       $query = "update users set email='".$this->getEmail()."',
       first_name='".$this->getFirstName()."',
       last_name= '".$this->getLastName()."'
        where id='".$this->getId()."'";
//        die($query);
         return mysqli_query($this->db, $query);
        if(mysqli_query == true){
            session_start();
            $_SESSION['message']='Record Has been Updated';
             header("location:list.php");
        }
    }
    
    
    public function getById($id)
    {
        $query = "select * from users where id='". $id ."'";
        $result = mysqli_query( $this->db, $query);
        if(!empty( $result))
        {
            $user = mysqli_fetch_assoc($result);
            $thisUser = new self();
                $thisUser->setId($user['id']);
                $thisUser->setFirstName($user['first_name']);
                $thisUser->setLastName($user['last_name']);
                $thisUser->setEmail($user['email']);
            $users = $thisUser;
        }
        return $users;
    }
    
    public function delete()
    {
//        var_dump($this->getId());
     $query = "DELETE FROM users WHERE id='".$this->getId()."'";  
//        die($query);
        mysqli_query($this->db, $query);
        if(mysqli_query == true){
              session_start();
            $_SESSION['message']='Record Has been deleted';
             header("location:list.php");
    
        }
    }
}
