<?php
require_once('header.php');
$arrField = array('*');
$intPageId = $_REQUEST['city_id'];
if (isset($intPageId) && $intPageId != '')
{
	$arrData = $objControl->getRecords('city_master', 'city_id', $intPageId, '', $arrField);
}
$arrField = array('country_id', 'country_name');
$arrCountryOption = $objControl->getRecords('country_master', null, null, 'country_name', $arrField);
$arrField = array('branch_id', 'branch_name');
$arrStateOption = $objControl->getRecords('branch_master', null, null, 'branch_name', $arrField);

?>
<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">City</a><span class="divider">/</span>
					</li>
					<li>
						Add City
					</li>
				</ul>
			</div>
<div class="row-fluid">		
				<div class="box span12">
					
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i>Create City</h2>
						
					</div>
						   <div class="box-content">
						<form class="form-horizontal" method="post" action="controller/routes.php">
                        	<input type="hidden" name="hid_action" id="hid_action" value="create_city" />
							<fieldset>
							 <div class="control-group">
								<label class="control-label" for="focusedInput">Country Name</label>
								<div class="controls">
								  <select name="parent_page" id="parent_page"  class="input-xlarge focused" >
										<option value=""></option>
										<?php
										for ($intIndex = 0; $intIndex < count($arrCountryOption); $intIndex++)
										{
											echo "<option value='" . $arrCountryOption[$intIndex]['country_id'] . "' ".($arrCountryOption[$intIndex]['country_id']==$arrData[0]['country_id']?'selected':'').">" . $arrCountryOption[$intIndex]['country_name'] . "</option>";
										}
										?>
									</select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">State Name</label>
								<div class="controls">
								  <select name="parent_page" id="parent_page"  class="input-xlarge focused" >
										<option value=""></option>
										<?php
										for ($intIndex = 0; $intIndex < count($arrStateOption); $intIndex++)
										{
											echo "<option value='" . $arrStateOption[$intIndex]['branch_id'] . "' ".($arrStateOption[$intIndex]['branch_id']==$arrData[0]['branch_id']?'selected':'').">" . $arrStateOption[$intIndex]['branch_name'] . "</option>";
										}
										?>
									</select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">City Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="txt_city" name="txt_city" type="text" value="<?php echo (isset($arrData[0]['city_name'])?$arrData[0]['city_name']:''); ?>">
								</div>
							  </div>
							 <div class="control-group">
								<label class="control-label" for="focusedInput">Status</label>
								<div class="controls">
								  <select class="input-xlarge focused" id="sel_status" name="sel_status" >
                                  <option <?php echo (isset($arrData[0]['status']) && $arrData[0]['status']=='Active' ?'selected="selected"':''); ?> value="Active">Active</option>
                                  <option <?php echo (isset($arrData[0]['status']) && $arrData[0]['status']=='Inactive' ?'selected="selected"':''); ?> value="Inactive">Inactive</option>
                                  </select>
								</div>
							  </div>
							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button type="button" class="btn" onclick="javascript:history.go(-1)">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>         
					
				</div><!--/span-->
                </div>
<?php
require_once('footer.php');
?>
