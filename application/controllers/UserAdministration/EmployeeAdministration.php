<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class EmployeeAdministration extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			
			$this->load->model('UserModel');
			$this->load->model('UserService');

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
			$this->load->model("PurchaseOrder/EmailClass");
			$this->load->model(array('PurchaseOrder/DepartmentModel','PurchaseOrder/DepartmentService'));
        }
	
	
	
	  function index(){
		  
		  echo "employee administration index";
	
	  }//function index
	  
	
	
	
	 function employeeRegistrationView(){
		 
		   // echo "new employee registration";
		
			if($this->session->userdata('logged_in'))
			{
		    //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(1);
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){
				
				//user has the priviledges
					$this->template->setTitles('Add New Employee', 'New Employee Registration', 'registration form', 'Registering new employee with LankaCom Inventory Management System');
			
			$this->template->load('template', 'PurchaseOrder/registerNewUserView');
			
				
			}
			else{
				
			  // "user doesnt have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			
		 
	 }//function registerNewEmployee
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 function registerNewEmployee(){
		 
		 
		 
		if($this->session->userdata('logged_in'))
			{
		    //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(1);
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){
			
				$employeeName=$this->input->post('Employee_Name', TRUE);
				
			//	$passwordSentToUser=substr(0,5,$employeeName);
			///	$passwordStoredInDatabase=md5($passwordSentToUser);
			
			$ramdomNum1=rand(500,1000);
			$randomNum2=rand(100,999);
			
			
			$passwordUser=substr($employeeName,0,4)."".$ramdomNum1."".$randomNum2;
			$passwordStoredInDatabase=md5($passwordUser);
			
			$userEmail=$this->input->post('Email', TRUE);
				//registering new user
				$userModel=new UserModel();
				$userModel->setEmail($this->input->post('Email', TRUE));
				$userModel->setPassword($passwordStoredInDatabase);
				$userModel->setEmployeeName($this->input->post('Employee_Name', TRUE));
				$userModel->setDepartmentCode($this->input->post('Department_Code', TRUE));
				$userModel->setLevelCode($this->input->post('Level_Code', TRUE));
				$userModel->setEmployeeCode($this->input->post('Employee_Code', TRUE));
				$userModel->setDesignation($this->input->post('Designation', TRUE));
				
				
				$userService=new UserService();
				
				$insertedStatus=$userService->registerNewEmployee($userModel);
				
				 if($insertedStatus){
					 	 
					//user registered 
				 				           
              $emailClass=new EmailClass();
             
              $emailSentStatus=$emailClass->sendEmail("abanstest@gmail.com",$userEmail,"new user registration","new user registration details <br/><br/><br/><b>username </b> ".$userEmail." <br/><b/>password </b>".$passwordUser);
             
			  echo '<font color="#009900"> New user created successfully and confirmation email was sent </font>';
				  
				 }
				 else{
				  //email address is already taken
				  echo '<font color="#CC0000">Email Address is already Taken<font color="#009900">';
					 
				 }
				 
				 
		    }
			else{
				
			  // "user doest have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			 
		 
	 }//registerNewEmployee
	 
	 
	 
	 
	 
	 
     function displayRegisteredEmployees(){
		 
	 
	 
	// echo "display registered emaployees";
	
	   // echo "new employee registration";
		
			if($this->session->userdata('logged_in'))
			{
		    //the user is logged and priviledges should be checked
			$userPriviledgeModel=new UserPriviledge();
			
		    $userPriviledgeModel->setLevelCode($this->session->userdata('level'));
			$userPriviledgeModel->setDepartmentCode( $this->session->userdata('department'));
			$userPriviledgeModel->setPriviledgeCode(2);//priviledge 2 is for edit employees
			
			$hasPriviledges=$userPriviledgeModel->checkUserPriviledge($userPriviledgeModel);
						
			if($hasPriviledges){
				
				//user has the priviledges
					$this->template->setTitles('Manage Employees', 'Employee Management', 'Registerd Employees', 'Manage Registered Employees');
			
			$this->template->load('template', 'RegisteredEmployees');
			
				
			}
			else{
				
			  // "user doesnt have the priviledges";
			  
			  $this->template->setTitles('Access Denied', 'You are not allowed to access this page.', 'You are not allowed to access this page.', 'Please Contact Administrator...');
			
			$this->template->load('template', 'errorPage');
						
			}
			
			}//if
			else{
				
				
			redirect(base_url().'index.php');
	
			
			}
			 
	 
	 }//displayRegisteredEmployees
	 
	 
	 
	 
	 
	 
	 function activateEmployee(){
		 
		 	 
		 echo "Activate Employee";
		 
		 
	 }//activateEmployee
	 
	 
	 
	 
	 
	 
	 
	 function inactivateEmployee(){
		 
		 
		 echo "inactivateEmployee";
		 
	 }//inactivateEmployee
	 
	 
	 
	 
	 
	 function retriveRegisteredEmployeesInDepartment(){
	 
	 
	 $departmentCode=$this->input->post('departmentCode',TRUE);
	 $employeeStatus=$this->input->post('employeeStatus',TRUE);

	   
	  	$userService=new UserService();
		$userModel=new UserModel();
		
		$userModel->setDepartmentCode($departmentCode);
		$userModel->setStatus($employeeStatus);
		$userModelObjectArray=$userService->retriveAllUsersMatchesProvidedCrieteria($userModel);

    //retrieve employees
	
	echo '<font color="#009900"> '.sizeof($userModelObjectArray).' records were found<br/><br/>';
	
	$tableHeader='<table id="sort-table"> 
                        <thead> 
                        <tr>
                            <th></th>
                            <th>Employee Name</th> 
                            <th>Designation</th> 
                            <th>Department</th> 
                            <th>Email</th> 
                            <th>Level</th>
                            <th style="width:128px">Options</th> 
                        </tr> 
                        </thead> 
                                                                                                          
                          <tbody> ';
						  
						  $userData="";
						  
						  $departmentModel=new DepartmentModel();
						  $departmentService = new DepartmentService();
						  
	 for($index=0;$index<sizeof($userModelObjectArray);$index++){
	 
	 						//finding the department name
							$departmentCode=$userModelObjectArray[$index]->getDepartmentCode();
							
							$departmentModel->setDepartmentCode($departmentCode);
							$departmentName=$departmentService->retrieveDepartmentName($departmentModel);
							
							
							//finding the level code and leveldescription			
							$userModel=new UserModel();							
							$userModel->setLevelCode($userModelObjectArray[$index]->getLevelCode());
							
							$userModelRetrieved=$userService->retriveUserLevel($userModel);
							
							
	  $userData=$userData.'<tr>
	  <td>'.$userModelObjectArray[$index]->getEmployeeCode().'</td>
	  <td>'.$userModelObjectArray[$index]->getDesignation().'</td>
	  <td>'.$userModelObjectArray[$index]->getEmployeeName().'</td>
	  <td>'.$departmentName.'</td>
	  <td>'.$userModelObjectArray[$index]->getEmail().'</td>
	  <td>'.$userModelRetrieved->getLevel()."-".$userModelRetrieved->getDescription().'</td> 
	  <td>
       <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this example" href="#">
        <span class="ui-icon ui-icon-wrench"></span>
       </a>';
	    if($userModelObjectArray[$index]->getStatus()=='0'){
	   $userData=$userData.'<a href="'.base_url().'index.php/UserAdministration/EmployeeAdministration/activateEmployee" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Enabled."  style="cursor:pointer;">
	   <span class="ui-icon ui-icon-arrowreturnthick-1-n"></span>
	   </a>';
	   }
	   
	    if($userModelObjectArray[$index]->getStatus()=='1'){
	   $userData=$userData.'<a href="'.base_url().'index.php/UserAdministration/EmployeeAdministration/inactivateEmployee" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Disabled."  style="cursor:pointer;">
       <span class="ui-icon ui-icon-arrowreturnthick-1-s"></span>
	   </a>
       </td></tr>'; 
	  }
	  
	 
	 }//for
		
		$tableFooter=' </tbody> </table>';
						  				  

       echo $tableHeader.''.$userData.''.$tableFooter;

	 }//retriveRegisteredEmployeesInDepartment
	 
	 
	 
	 
	}//class
	
?>
