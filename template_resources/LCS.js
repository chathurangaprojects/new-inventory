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
/*
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
	  else if(Email=="" && validateEmail()){
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
*/


function addNewEmployee(){
    
     
    var Employee_Name = $('#Employee_Name').val();
    var Designation = $('#Designation').val();
    var Department_Code = $('#Department_Code').val();
    var Email = $('#Email').val();
    var Level_Code = $('#Level_Code').val();

    
	  
	  
 $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
	  
   $.ajax({
   type: "POST",   
   url: base_url+"index.php/UserAdministration/EmployeeAdministration/registerNewEmployee", 
   data: "Employee_Name="+Employee_Name+"&Designation="+Designation+"&Department_Code="+Department_Code+"&Email="+Email+"&Level_Code="+Level_Code,
   
   success: function(msg){
     
   $('#addnewempmsg').html(msg); 
     
   
   }
  
 });   
   

  
}//addEmployee


/*
// validate signup form on keyup and submit
$("#user_registration_form").validate({
rules: {
Employee_Name: "required",
Designation: "required",
email: {
required: true,
email: true
},
messages: {
Employee_Name: "Please enter your firstname",
Designation: "Please enter your lastname",
email: "Please enter a valid email address",
}
}
});*/


/*
$().ready(function() {
	$("#user_registration_form").validate
	({
		rules:
		{
			Employee_Name: "required", messages:
			{
				Employee_Name: "Please enter your firstname"
			}
		}
	});
});

*/

function adduser(){
	
	
	alert('ddddd');
	
	
	
	
}




$().ready(function() {
    //form name and id
	$("#user_registration_form").validate
	({
	 
	 
	 
		rules:
		{
			Employee_Name: "required",
			Designation: "required",
			Department_Code: "required",
			Level_Code: "required",
			Email: {
				required: true,
				email: true
			}
		},
			messages:
			{
				Employee_Name: "Employee Name is required",
				Designation: "Designation is required",
				Department_Code: "Departmen code is required",
				Email: "Please enter valid email address",
				Level_Code: "Security Level is required"
				
			},
			
			submitHandler: function(form) {
				 $('#addnewempmsg').html('<font color="#CC0000"> Please wait............ </font>'); 
				$.post(base_url+'index.php/UserAdministration/EmployeeAdministration/registerNewEmployee', $("#user_registration_form").serialize(), function(msg) {
					$('#addnewempmsg').html(msg);
				});
			}

	});
});





