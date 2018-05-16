<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Add Application Form</h5>
</div>

<div class="container">
    <?=form_open_multipart('forms/add_forms', array('class' => '')); ?>
        <div class="form-group">
            <label for="exampleInputName">Form Name</label>
            <input type="text" class="form-control" id="formName" aria-describedby="formName" name="form_name" placeholder="Upload Form Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Form Description</label>
            <textarea class="form-control" id="formDesc" name="form_desc" placeholder="Enter Description" rows="3"></textarea>
         </div>


        <div class="form-group">
            <label for="exampleInputStartDate">Form</label>
            <input type="file" class="form-control" id="exampleInputFormFile" aria-describedby="FormHelp" name="userfile" placeholder="Upload From File">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    <?=form_close();?>
</div>
