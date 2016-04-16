<?php

class Login {

    private $user_key;
    private $id;
    private $pwd;
    private $name;
    public $member_type;

    function __construct ($input_id, $input_pwd) {
        $this->id = trim($input_id);
        $this->pwd = trim($input_pwd);
    }

    // Getter
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    // Setter
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

    // Error message function
    public function error($message) {
    	echo "
    		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    		<script>
    		window.alert (\"$message\");
    		history.go(-1);
    		</script>
    	";
    }

    // Warning message function
    public function warning($message) {
        echo "
    		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    		<script>
    		window.alert (\"$message\");
    		</script>
    	";
    }

    // Check login function
    public function check_login() {
        // Query to retrieve user password
		/* include'core/init.php';


		$eamil=$_POST['eamil'];
		$password=$_POST['password'];

		$sql = "SELECT * from advancedmarket.register where email ='$email' and password='$password'";
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		$_SESSION['user']=$row['username'];
		
		// have to modify this part based on seller and buyer
		
		if(mysqli_num_rows($result)==1)
			{
			   if($_SESSION['user'])
			   {
				goto_page();
				//header('Location:admin_services.php');
				}
				else
				die("you were logged out.");
			}
			else
			{        
			goto_home();
			}
		
		*/
        //$db_pwd = //select pwd from xxx_table where id=$id;

        // Variables to use this function in init.php
        global $con;

        // Retrieve member's data from DB
        require_once "./libs/core/database/connect.php";
        $sql_query = "SELECT * from register where email='".$this->id."' and password='".$this->pwd."'";
        $result = mysqli_query($con, $sql_query);

        // DB error
        if (!$result) {
            echo "Could not successfully run query ($sql_query) from DB: " . mysql_error();
            exit;
        }

        // Retrieve data successfully
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $this->user_key = $row["id"];
            $this->name = $row["first_name"]." ".$row["last_name"];
            $this->member_type = $row["type"];
            return true;
        }
        // 0 or more than 1 record: something wrong
        else {
            $this->member_type = "";
            return false;
        }


        /*
         * Kevin: 03/09/2016
         * Deprecated code used before DB
         *
        $db_pwd_seller = "12";
        $db_pwd_buyer = "34";

        if ($db_pwd_seller == $this->pwd) {
            $this->member_type = "seller";
            return true;
        }
        else if ($db_pwd_buyer == $this->pwd) {
            $this->member_type = "buyer";
            return true;
        }
        else {
            $this->member_type = "";
            return false;
        }
        */
    }
}

?>
