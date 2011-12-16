<div class="hastable">   

<table id="sort-table"> 
                        <thead> 
                        <tr>
                            <th><input type="checkbox" value="check_none" onclick="this.value=check(this.form.list)" class="submit"/></th>
                            <th>Employee Name</th> 
                            <th>Designation</th> 
                            <th>Department</th> 
                            <th>Email</th> 
                            <th>Level</th>
                            <th style="width:128px">Options</th> 
                        </tr> 
                        </thead> 
                        
                        
<?php /*?>                        <tbody> 
                        
                         <?php   foreach($allemployees as $rowallemployees)
                            { ?>
                        <tr id="employees<?php echo $rowallemployees->Employee_Code ; ?>">
                            <td class="center"><input type="checkbox" value="1" name="list" class="checkbox"/></td> 
                            <td><?php echo $rowallemployees->Employee_Name; ?></td> 
                            <td><?php echo $rowallemployees->Designation; ?></td>   
                            <td><?php echo $rowallemployees->Department_Name; ?></td>   
                            <td><?php echo $rowallemployees->Email; ?></td>   
                            <td><?php echo $rowallemployees->Level." - ".$rowallemployees->Description; ?></td>   
                            <td>
                                <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this example" href="#">
                                    <span class="ui-icon ui-icon-wrench"></span>
                                </a>
                              
                              
                              <span id="emp_status<?php echo $rowallemployees->Employee_Code ; ?>">
                              
                                
                                <?php
                                 if($rowallemployees->Status=='0'){
                                 ?>
                                <a onclick="enableEmployee(<?php echo $rowallemployees->Employee_Code ; ?>)" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Enabled."  style="cursor:pointer;">
                                    <span class="ui-icon ui-icon-arrowreturnthick-1-n"></span>
                                </a>                                  
                                 <?php } ?>
                                 
                                                                 <?php
                                 if($rowallemployees->Status=='1'){
                                 ?>
                                <a onclick="disableEmployee(<?php echo $rowallemployees->Employee_Code ; ?>)" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Disabled."  style="cursor:pointer;">
                                    <span class="ui-icon ui-icon-arrowreturnthick-1-s"></span>
                                </a>                                  
                                 <?php } ?>
                                 </span>   
                                
                                
                                <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete this Empoyee" href="#" onclick="deleteitems('employees<?php echo $rowallemployees->Employee_Code; ?>','del_employees',<?php echo $rowallemployees->Employee_Code; ?>,'Are you sure want to delete this Employee?')">
                                    <span class="ui-icon ui-icon-circle-close"></span>
                                </a>
                            </td>
                        </tr> 
                        <?php } ?>
                        
                        
                             </tbody> <?php */?> 
                             
                             
                             
                             
                             
                          <tbody> 
                        
                         <?php   
						 
			     $this->load->model(array('UserModel','UserService','UserLevelModel','PurchaseOrder/DepartmentModel','PurchaseOrder/DepartmentService'));
				 
				 
				 $departmentModel= new DepartmentModel();
				 $departmentService = new DepartmentService();
				 
			  
			    $userService=new UserService();
				
				$userModelObjectArray=$userService->retrieveAllEmployeeDetails();
						 
						// foreach($allemployees as $rowallemployees)
                         //{ 
					for($index=0;$index<sizeof($userModelObjectArray);$index++){
							?>
                        <tr id="employees<?php echo $userModelObjectArray[$index]->getEmployeeCode(); ?>">
                      
                            <td class="center"><input type="checkbox" value="1" name="list" class="checkbox"/></td> 
                            <td><?php  echo $userModelObjectArray[$index]->getEmployeeCode(); ?></td> 
                            <td><?php  echo $userModelObjectArray[$index]->getDesignation(); ?></td>
                                                        <?php
							//finding the department name
							$departmentCode=$userModelObjectArray[$index]->getDepartmentCode();
							
							$departmentModel->setDepartmentCode($departmentCode);
							$departmentName=$departmentService->retrieveDepartmentName($departmentModel);	
							
							//finding the level code and leveldescription
														
							$userModel=new UserModel();							
							$userModel->setLevelCode($userModelObjectArray[$index]->getLevelCode());
							
							$userModelRetrieved=$userService->retriveUserLevel($userModel);
							//$userLevelModelRetrieved->getLevel();
							
							?>   
                            <td><?php  echo $departmentName; ?></td>
                            <td><?php  echo $userModelObjectArray[$index]->getEmail();?></td>   
                            <td><?php  echo $userModelRetrieved->getLevel()."-".$userModelRetrieved->getDescription();  ?></td>   
                            <td>
                                <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this example" href="#">
                                    <span class="ui-icon ui-icon-wrench"></span>
                                </a>
                              
                              
                              <span id="emp_status<?php //echo $rowallemployees->Employee_Code ; ?>">
                              
                                
                                <?php
									 if($userModelObjectArray[$index]->getStatus()=='0'){
										 //activate employee
                                 ?>
<?php /*?>                                <a onclick="enableEmployee(<?php //echo $rowallemployees->Employee_Code ; ?>)" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Enabled."  style="cursor:pointer;"><?php */?>

                                <a href="<?php  echo base_url(); ?>index.php/UserAdministration/EmployeeAdministration/activateEmployee" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Enabled."  style="cursor:pointer;">
                                
                                    <span class="ui-icon ui-icon-arrowreturnthick-1-n"></span>
                                </a>                                  
                                 <?php } ?>
                                 
                                 <?php
									 if($userModelObjectArray[$index]->getStatus()=='1'){
										 //diaable employees
                                 ?>
                                <a href="<?php  echo base_url(); ?>index.php/UserAdministration/EmployeeAdministration/inactivateEmployee" class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Mark as Disabled."  style="cursor:pointer;">
                                    <span class="ui-icon ui-icon-arrowreturnthick-1-s"></span>
                                </a>                                  
                                 <?php } ?>
                                 </span>   
                                
                                
   <!--                             <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Delete this Empoyee" href="#" onclick="deleteitems('employees<?php //echo $rowallemployees->Employee_Code; ?>','del_employees',<?php //echo $rowallemployees->Employee_Code; ?>,'Are you sure want to delete this Employee?')">
                                    <span class="ui-icon ui-icon-circle-close"></span>
                                </a>-->
                                
                            </td>
                        </tr> 
                        <?php } ?>
                        
                        
                             </tbody> 
                             
                             
                             
                             
                        
                        </table>
                              <?php /*?><div class="pagination"> <?php echo $this->pagination->create_links(); ?></div> <?php */?>   
                        </div>
                        
 
  