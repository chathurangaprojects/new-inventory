<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserService extends CI_Model {
	
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
        $this->load->model('UserModel');
		$this->load->model('UserLevelModel');
    }
	
	
	
	
	function checkUserLoginAuthentication($userModel){
		
		$password=md5($userModel->getPassword());
		
		$parameters=array('Email' =>$userModel->getEmail(),'Password'=>$password);
		
		$query = $this->db->get_where('ta_ims_employee',$parameters);
		
		$loggedUserModel=NULL;
		
		foreach ($query->result() as $row)
        {
			//create the model upon succesful login
		   	$loggedUserModel=new UserModel();
			
		   $loggedUserModel->setEmployeeCode($row->Employee_Code);
		   $loggedUserModel->setEmployeeName($row->Employee_Name);
		   $loggedUserModel->setLevelCode($row->Level_Code);
		   $loggedUserModel->setDepartmentCode($row->Department_Code);
		   $loggedUserModel->setEmail($row->Email);

         }	
			
			
			return $loggedUserModel;
		
	}//checkUserLoginAuthentication
	
	
	
	
	
	 function registerNewEmployee($userModel){
		 
		 
		 $employeeData=array(
		 'Email'=>$userModel->getEmail(),
		 'Password'=>$userModel->getPassword(),
		 'Employee_Name'=>$userModel->getEmployeeName(),
		 'Designation'=>$userModel->getDesignation(),
		 'Level_Code'=>$userModel->getLevelCode(),
         'Department_Code'=>$userModel->getDepartmentCode(),
         'Confirmation_Code'=>'123',
		 'Status'=>'1');
		 
		 	$query = $this->db->get_where('ta_ims_employee', array('Email' => $userModel->getEmail()));
	
	if ($query->num_rows() > 0){
		//email address is already registered
		return FALSE;
	}
	else{
	   //email address is not registered	
	      $this->db->insert('ta_ims_employee', $employeeData); 
		  
		  return TRUE;
	}
	
	
  }//registerNewEmployee
  
  
  
  
  
  
  
  function retrieveAllEmployeeDetails(){
	  	  
	  	$query = $this->db->get('ta_ims_employee');
		
		$employeeDataArray=array();
		$index=0;
		
		foreach ($query->result() as $row)
		{
			$employeeModel=new UserModel();
			
		   $employeeModel->setEmployeeCode($row->Employee_Code);
		   $employeeModel->setEmployeeName($row->Employee_Name);
		   $employeeModel->setLevelCode($row->Level_Code);
		   $employeeModel->setDepartmentCode($row->Department_Code);
		   $employeeModel->setDesignation($row->Designation);
		   $employeeModel->setEmail($row->Email);
		   $employeeModel->setStatus($row->Status);
		   
		   
    		$employeeDataArray[$index]=$employeeModel;
			$index++;
		}
		
		
		return $employeeDataArray;  
	  
  }//retrieveAllEmployeeDetails
  
	 
	 
	 
   function retriveUserLevel($userModel){
	  
	   	   
	 $levelCode=$userModel->getLevelCode();
	 
	 $query = $this->db->get_where('ta_ims_level', array('Level_Code' =>$levelCode));
	 
	 	foreach ($query->result() as $row)
		{
		$userLevelModel = new UserLevelModel();
		
		$userLevelModel->setLevel_Code($row->Level_Code);
		$userLevelModel->setLevel($row->Level);
		$userLevelModel->setDescription($row->Description);
		
		return $userLevelModel;
		
		}
	   
   }//function
   
   
} 
?>

	