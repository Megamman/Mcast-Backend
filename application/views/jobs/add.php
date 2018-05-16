<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Add Vacancy</h5>
</div>

<div class="container">
    <?=form_open('vacancy/add', array('class' => '')); ?>
        <div class="form-group">
            <label for="exampleInputJob">Job Title</label>
            <input type="text" class="form-control" id="exampleInputJob" name="jobName" placeholder="Enter Job Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Job Description</label>
            <textarea class="form-control" id="jobDesc" name="jobDesc" name="jobDesc" placeholder="Enter Description" rows="3"></textarea>
         </div>

         <div class="form-group">
             <label for="exampleInputEndDate">End Date</label>
             <input type="date" class="form-control" id="exampleInputNewsEndDate" name="jobEndDate" placeholder="Enter End Date">
         </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    <?=form_close();?>
</div>
