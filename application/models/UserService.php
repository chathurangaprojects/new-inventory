<?php 

class UserService extends CI_Model {
	
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
        $this->load->model('UserModel');
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
	 
	 

}
?>

	