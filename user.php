<?php  
 Interface Account 
 {
     public function register ($pdo);
     public function login($pdo);
     //public function changePassword($pdo);
    //  public function logout ($pdo);
 }  

    class User implements Account{
       protected $fullnames;
       protected $email;
       protected $residence;
       protected $password;

       function __construct($email,$password){
      
        $this->email =$email;
        $this->password= $password;       
       }
       //getters and setters
       public function setFullnames ($name)
        {        	
        $this->fullnames = $name;        
        }              
        public function getFullnames ()
        {        	
        return $this->fullnames;        
        }
       
        public function setResidence ($residence)
        {        	
        $this->residence = $residence;        
        }              
        public function getResidence ()
        {        	
        return $this->residence;        
        }
       
        public function register ($pdo)
        {        
            
            $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);           
            try {                
                $stmt = $pdo->prepare ('INSERT INTO users (fullnames,email,residence,password) VALUES(?,?,?,?)');                
                $stmt->execute([$this->getFullnames(),$this->email,$this->getResidence(),$passwordHash]);
                header("location:index.php");
                return "Registration was successiful"; 
                exit();           
            } catch (PDOException $e) {            	
                return $e->getMessage();           
            }                   
        } 

        public function login($pdo){
             try{
                
                echo $this->email;
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");               
                $stmt->execute([$this->email]);                
                $row = $stmt->fetch();  
               // var_dump($row);              
                if($row == null){                	
                    return "This account does not exist";                
                }                
                if (password_verify($this->password,$row['password'])){                	
                  
                    $_SESSION['email']=$row['email'];
                    header("location:index.php");  
                    exit();             
                }               
                 return "Your username or password is not correct";            
                } catch (PDOException $e) 
                {            	
                    return $e->getMessage();           
            }        
       }

    public function is_loggedin()
    {
      
    }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
       
   public function logout()
    {
        session_destroy();
        
        return true;
    }
    // public function changePassword($pdo){
    //        try{

    //        }
    // }

             
         


 }
?>