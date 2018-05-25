<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Edit New</h5>
</div>

<div class="container">
    <?=form_open_multipart($properties['action'], NULL, $properties['hidden'])?>
    <?php foreach ($news as $key => $input):?>
        <div class="form-group">
            <?=form_error($input['name']);?>
            <?=form_label($key);?>
            <?=form_input($input);?>
        </div>
    <?php endforeach;?>
    <div class="form-group">
        <label for="exampleInputStartDate">News</label>
        <input type="file" class="form-control" id="exampleInputFormFile" aria-describedby="FormHelp" name="userfile" placeholder="Upload From File">
    </div>

        <?=form_submit(null,"Submit");?>
        <?=form_close();?>
</div>
