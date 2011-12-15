// JavaScript Document
var base_url ='http://localhost/LCS_IMS/';

//user login process 


$(document).ready(function() {
    
    $('#login_button').click(function() {

	var login_username= $('#login_username').val();
	var login_password= $('#login_password').val();	
	
	$('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');
	
	

	$.ajax({
	   type: "POST",
	   url: base_url+"index.php/Login/authenticateUser/",   
	   data: "login_username="+login_username+"&login_password="+login_password,
	   
	   
	   success: function(msg){
		   

	   if(msg==1){     
    $('#login_msg').html('<div class="response-msg success ui-corner-all">Login successfull..</div>');   
      setTimeout("location.href = base_url",100); 
          } else{			   
$('#login_msg').html('<div class="response-msg error ui-corner-all">Invalid login details...</div>');   
    	}	   
	  
   }
   
 });
	
	 });
		
});




//adding new employee

function addNewEmployee(){
    
       
    var Employee_Name = $('#Employee_Name').val();
    var Designation = $('#Designation').val();
    var Department_Code = $('#Department_Code').val();
    var Email = $('#Email').val();
    var Level_Code = $('#Level_Code').val();
    
	  if(Employee_Name==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Employee Name is required </font>'); 
	  }
	  else if(Designation==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Designation field is required </font>'); 
	  }
      else if(Department_Code==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Department is Required </font>');
		 
	  }
	  else if(Email==""){
		 $('#addnewempmsg').html('<font color="#CC0000">Email is required </font>'); 
	  }
	  else if(Level_Code==""){
		  
		 $('#addnewempmsg').html('<font color="#CC0000">Security Level is required </font>'); 
	  }
	  
	  else{
	  
	  $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
	  
   $.ajax({
   type: "POST",   
   url: base_url+"index.php/UserAdministration/EmployeeAdministration/registerNewEmployee", 
   data: "Employee_Name="+Employee_Name+"&Designation="+Designation+"&Department_Code="+Department_Code+"&Email="+Email+"&Level_Code="+Level_Code,
   
   success: function(msg){
     
   $('#addnewempmsg').html(msg); 
     
   }
   
  
 });   
   
 
 }//else
	  
     
}//addEmployee

