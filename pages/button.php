<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from development where id='".$row['id']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Company:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="company" class="form-control" value="<?php echo $erow['company']; ?>">
						</div>
					</div>



					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Comment:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="comment" rows="4" class="form-control"  rows="10" value="<?php echo $erow['comment']; ?>">
						</div>


					</div>












<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Contact Person:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="person" rows="4" class="form-control"  rows="10" value="<?php echo $erow['person']; ?>">
						</div>


					</div>







<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Position:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="position" rows="4" class="form-control"  rows="10" value="<?php echo $erow['position']; ?>">
						</div>
					</div>



<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Phone:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="phone" rows="4" class="form-control"  rows="10" value="<?php echo $erow['phone']; ?>">
						</div>
					</div>


<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Email:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="email" rows="4" class="form-control"  rows="10" value="<?php echo $erow['email']; ?>">
						</div>
					</div>

<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">RAG Satus:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="rag" rows="4" class="form-control"  rows="10" value="<?php echo $erow['rag']; ?>">
						</div>
					</div>


<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Status Remarks:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="status_remarks" rows="4" class="form-control"  rows="10" value="<?php echo $erow['status_remarks']; ?>">
						</div>
					</div>
					
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->
