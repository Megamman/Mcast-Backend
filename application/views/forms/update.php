<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Edit Application Form</h5>
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
    <img src="<?=$image;?>" alt="">
        <div class="form-group">
            <label for="exampleInputStartDate">Form</label>
            <input type="file" class="form-control" id="exampleInputFormFile" aria-describedby="FormHelp" placeholder="Upload From File">
        </div>
        <?=form_submit(null,"Submit");?>
        <?=form_close();?>
</div>
