<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Edit Vacancy</h5>
</div>

<div class="container">
    <?=form_open($properties['action'], NULL, $properties['hidden'])?>
    <?php foreach ($form as $key => $input):?>
        <div class="form-group">
            <?=form_error($input['name']);?>
            <?=form_label($key);?>
            <?=form_input($input);?>
        </div>
    <?php endforeach;?>
        

         <?=form_submit(null,"Submit");?>
       <?=form_close();?>
   </div>
