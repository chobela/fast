<!-- Add New -->
    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="addnew.php">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Company:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="company">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Comment:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="comment">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Contact Person:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="person">
						</div>
					</div>

<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Position:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="position">
						</div>
					</div>

<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Phone:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="phone">
						</div>
					</div>


<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">RAG:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="rag">
						</div>
					</div>

<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Status Remarks:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="status_remarks">
						</div>
					</div>


					
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
				</form>
                </div>
				
            </div>
        </div>
    </div>
