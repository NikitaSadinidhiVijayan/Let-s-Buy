<?php
 
 class validator
 {
	 // for form field names
	 private $fields = array();
	 
	 // to store the errors of form fields
	 private $field_errors =  array();
	 
	 private $form_is_valid = true;
	 
	 public function add_field($field_name)
	 {
		 $this-> fields[]= $field_name;
		 
		 //associative array for errors
		 $this -> field_errors[$field_name] = array();
	 }
	  public function add_rule_to_field($field_name, $field_rule, $field_display_name)
	 {
		 $rule_name = $field_rule[0];    // field rule is an array which has two elements for first name field in register.php
		 
		 switch ($rule_name) {
			 case 'email':
				 if(!filter_var($_POST[$field_name], FILTER_VALIDATE_EMAIL)) {
					 $this->add_error_to_field($field_name, "Please enter valid email address.");
				 }
                 break;

			 case 'min-length':
				if(strlen($_POST[$field_name]) < $field_rule[1]) {
					$this->add_error_to_field($field_name, ucwords($field_display_name)." cannot be less than {$field_rule[1]} in length.");
				}
			    break;
			 
			 case 'empty':
				if(strlen($_POST[$field_name]) == 0) {
					$this->add_error_to_field($field_name, ucwords($field_display_name)." cannot be empty.");
				}
			    break;

             case 'pwd-not-match-seller':
                 if($_POST['seller_pwd'] != $_POST['seller_pwd_repeat']) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." is not identical.");
                 }
                 break;

             case 'pwd-not-match-buyer':
                 if($_POST['buyer_pwd'] != $_POST['buyer_pwd_repeat']) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." is not identical.");
                 }
                 break;

             case 'letters-only':
                 if (!preg_match("/^[a-zA-Z]*$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." allows only alphabets.");
                 }
                 break;

             case 'numbers-only':
                 if (!preg_match("/^[0-9]*$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." allows only numbers.");
                 }
                 break;

             case 'price-only':
                 //if (!preg_match("/([0-9,]+(\.[0-9]{2})?)/", $_POST[$field_name]) || !preg_match("/^[0-9.]*$/", $_POST[$field_name])) {
                 if (!preg_match("/^([1-9][0-9]*|0)(\.[0-9]{2})?$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." allows only dollar amount (ex: 12.34) format.");
                 }
                 break;

             case 'discount-only-1':
                 $price_r = $_POST['unit_price'];
                 $price_1 = $_POST["amount_discount_1"];
                 if($price_r <= $price_1) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." must be less than Regular price.");
                 }
                 break;

             case 'discount-only-2':
                 $price_1 = $_POST["amount_discount_1"];
                 $price_2 = $_POST["amount_discount_2"];
                 if($price_1 <= $price_2) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." must be less than First price.");
                 }
                 break;

             case 'discount-only-3':
                 $price_2 = $_POST["amount_discount_2"];
                 $price_3 = $_POST["amount_discount_3"];
                 if($price_2 <= $price_3) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." must be less than Second price.");
                 }
                 break;

             case 'date-only':
                 if (!preg_match("/^((0?[13578]|10|12)(-|\/)(([1-9])|(0[1-9])|([12])([0-9]?)|(3[01]?))(-|\/)((19)([2-9])(\d{1})|(20)([01])(\d{1})|([8901])(\d{1}))|(0?[2469]|11)(-|\/)(([1-9])|(0[1-9])|([12])([0-9]?)|(3[0]?))(-|\/)((19)([2-9])(\d{1})|(20)([01])(\d{1})|([8901])(\d{1})))$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." allows only US date (ex: 12/31/2016) format.");
                 }
                 break;

             case 'no-past-date':
                 $s_date = date("Y-m-d", strtotime($_POST['start_date']));
                 $e_date = date("Y-m-d", time());
                 if($s_date < $e_date) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." must be at least today.");
                 }
                 break;

             case 'future-date-only':
                 $s_date = date("Y-m-d", strtotime($_POST['start_date']));
                 $e_date = date("Y-m-d", strtotime($_POST['end_date']));
                 if($s_date >= $e_date) {
                     $this->add_error_to_field($field_name, ucwords($field_display_name)." must be at least one day after starting date.");
                 }
                 break;

             case 'no-selection':
                 if (!preg_match("/^[0-9]*$/", $_POST[$field_name])) {
                     $this->add_error_to_field($field_name, "Please select one of the option.");
                 }
                 break;
			 
			 default:
			 
			    break;
		 }
		 		 
	 }
	 
	private function add_error_to_field($field_name, $error_message)
	{
		 $this->form_is_valid = false;  // sets the form as not valid
		 $this->field_errors[$field_name][] = $error_message;
	}
	 
	public function form_valid()
	{
		return $this-> form_is_valid;
	}
	
	 public function out_field_error($field_name)
	 {
		 if(isset($this->field_errors[$field_name]))
		 {
			 foreach($this->field_errors[$field_name] as $field_error)
			 {
                 $echo_message = "<div class=\"warning left-align\" id=\"err_".$field_name."\"><p style=\"color:red\">".$field_error."</p></div>";
                 echo $echo_message;
			 }
		 }
	 }
 }


?>