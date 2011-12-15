
<div class="content-box">
  <form action="#" method="post" enctype="multipart/form-data" class="forms" name="form" >
    <ul>
      <li>
        <label  class="desc"> Employee Name </label>
        <div>
          <input type="text" tabindex="1" maxlength="255" value="" class="field text small" id="Employee_Name" />
        </div>
      </li>
      <li>
      
        <label  class="desc"> Designation </label>
        <div>
          <input type="text" tabindex="1" maxlength="255" value="" class="field text small" id="Designation" />
        </div>
      </li>
      <li>
        <label  class="desc"> Department </label>
        <div>
          <select tabindex="3" class="field select small" id="Department_Code" >
            <option value="">Please select</option>
            <?php
								 
				$this->load->model(array('PurchaseOrder/DepartmentModel','PurchaseOrder/DepartmentService'));
			  
			    $departmentService=new DepartmentService();
				
				$departmentData=$departmentService->retriveAllDepartmentDetails();
					for($index=0;$index<sizeof($departmentData);$index++){
					?>
            <option value="<?php echo $departmentData[$index]->getDepartmentCode(); ?>"><?php echo $departmentData[$index]->getDepartmentName(); ?></option>
            <?php
					}
				?>
          </select>
        </div>
      </li>
      <li>
        <label  class="desc"> Email </label>
        <div>
          <input type="text" tabindex="1" maxlength="255" value="" class="field text small" id="Email" />
        </div>
      </li>
      <li>
        <label  class="desc"> Secutiry Level </label>
        <div>
          <select tabindex="3" class="field select small" id="Level_Code" >
            <option value="">Please select</option>
            <?php
								 
				$this->load->model('PurchaseOrder/SecurityLevelModelAndService');
			  
			    $securityService=new SecurityLevelModelAndService();
				
				$securityLevelData=$securityService->retriveAllSecurityLevels();
				
					for($index=0;$index<sizeof($securityLevelData);$index++){
					?>
            <option value="<?php echo $securityLevelData[$index]->getLevelCode(); ?>"><?php echo $securityLevelData[$index]->getDescription(); ?></option>
            <?php
					}
				?>
          </select>
        </div>
      </li>
      <li>

        <label  class="desc"> </label>
        <div id="addnewempmsg"> </div>
      </li>
      <li class="buttons">
        <button class="ui-state-default ui-corner-all ui-button" type="button" onclick="addNewEmployee()">Add</button>
      </li>
    </ul>
  </form>
  <div class="clear"></div>
</div>
