


<div class="form-group">
                        					<label  class="col-sm-4 control-label">Subcategory Name</label>
                        					<div class="col-sm-7">
                        						<select id="sub1" name="subcat"><?php
                        						foreach ($subcat as $row) 
                        						{
													echo '<option value="'.$row->fk_int_cat_id.'">'.$row->vchr_sub_name.'</option>';
												}
											?></select>
                        					</div>
                   						</div>