<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Add Lectures</h5>
</div>

<div class="container">
    <?=form_open('lectures/add_lecturer'); ?>
        <div class="form-group">
            <label for="exampleInputCourse">Lecturer Email</label>
            <?php
            echo form_dropdown('lectures', $lectures_list, NULL, $dropdown_class);
            ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEndDate">End Date</label>
            <input type="date" class="form-control" id="exampleInputNewsEndDate" name="endDate" placeholder="Enter End Date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?=form_close();?>
</div>
