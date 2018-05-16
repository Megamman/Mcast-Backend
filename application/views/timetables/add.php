<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Add Timetable</h5>
</div>

<div class="container">


    <?=form_open('timetables/add', array('class' => '')); ?>

        <div class="form-group">
            <label for="exampleInputTName">Timetable Name</label>
            <input type="ID" class="form-control" id="exampleInputTName" name="timetable" placeholder="Enter Timetable Name">
        </div>

        <div class="form-group">
            <label for="exampleInputLevel">Level</label>
            <input type="text" class="form-control" id="exampleInputlevel"  name="level" placeholder="Enter Course Level">
        </div>

        <div class="form-group">
            <label for="exampleInpuTimetable">Timetable Image</label>
            <input type="file" class="form-control" id="exampleInpuTimetable"  name="userfile" placeholder="Upload Timetable">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    <?=form_close();?>
</div>
