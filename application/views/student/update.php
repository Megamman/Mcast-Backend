<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Edit Student</h5>
</div>

<div class="container">
    <?=form_open($properties['action'], NULL, $properties['hidden'])?>
      <?php foreach ($form as $key => $input):?>        <div class="form-group">
            <label for="exampleInputID">ID no.</label>
            <input type="ID" class="form-control" id="exampleInputID"  value="<?=$user['user_id'];?>" name="id_card">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="Name" class="form-control" id="exampleInputName" value="<?=$user['user_name'];?>" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputSurname">Surname</label>
            <input type="Surname" class="form-control" id="exampleInputSurname" value="<?=$user['user_surname'];?>" name="surname">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Email</label>
            <input type="Email" class="form-control" id="exampleInputEmail" value="<?=$user['email_login'];?>" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputCourse">Course</label>
            <?php
            echo form_dropdown('course', $course_list, NULL, $dropdown_class);
            ?>
        </div>
        <div class="form-group">
            <label for="exampleInputStuLink">Links</label>
            <input type="Link" class="form-control" id="exampleInputStuLink"  value="<?=$user['std_link'];?>" name="link">
        </div>
        <?=form_submit(null,"Submit")?>
      <?=form_close()?>
  </div>
