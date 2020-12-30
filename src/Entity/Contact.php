<?php

namespace App\Entity;
use App\Entity\Bijoux;
use Symfony\Component\Validator\Constraints as Assert;
    class Contact{
    /**
    * @var string|null
    * @Assert\Not Blank()
    * @Assert\Length(min=2,max=100)
     */
        private $firstname;
    
     /**
    * @var string|null
    * @Assert\Not Blank()
    * @Assert\Length(min=2,max=100)
     */
    private $lastname;

    /**
    * @var int|null
    * @Assert\Not Blank()
     */
    private $phone;

    /**
    * @var string|null
    * @Assert\Not Blank()
    * @Assert\Email()
     */
    private $email;

     /**
    * @var string|null
    * @Assert\Not Blank()
    * @Assert\Length(min=25,max=250)
     */
    private $message;

      /**
    * @var Bijoux|null 
     */
    private $bijoux;
   


        public function getFirstname()
        {
            return $this->firstname;
        }
        public function setFirstname($firstname)
        {
            $this->firstname=$firstname;
        }
        public function getLastname()
        {
            return $this->lastname;
        }
        public function setLastname($lastname)
        {
            $this->lastname=$lastname;
        }
        public function getPhone()
        {
            return $this->phone;
        }
        public function setPhone($phone)
        {
            $this->phone=$phone;
        }
        public function getMessage()
        {
            return $this->message;
        }
        public function setMessage($message)
        {
            $this->message=$message;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email=$email;
        }
        
        public function getBijoux()
        {
            return $this->bijoux;
        }
        public function setBijoux($bijoux)
        {
            $this->email=$bijoux;
        }
        }
?>