<div class="container td-margin mt-4 mb-3">
    <div class="row">
        <div class="col-12 d-flex">
            <h5 class="card-title">Forms</h5>

            <?php foreach ($links as $link): ?>
                <a href="<?=site_url($link['link'])?>" class="btn btn-link btn-sm mr-1 mt-2" role="button">
                    <?php if ($link['icon'] != null): ?>
                        <i class="fas <?=$link['icon']?> fa-sm "></i>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>

                <div class="btn btn-link btn-sm mr-1">
                    <?=anchor('form_delete','delete', 'class = btn btn-link btn-sm');?>
                </div>

            <?php foreach ($links as $link): ?>
                <a href="<?=site_url($link['link'])?>" class="btn btn-link btn-sm mr-1 mt-2" role="button">
                    <?php if ($link['caption'] != null): ?>
                        <?=$link['caption']?>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>

        </div>
    </div>

    <?=form_open('forms/submit_form')?>
    <button type="submit" name="button" value="delete"class="btn btn-link btn-sm"> <i class="fas fa-trash-alt"></i></button>
        <table class="table table-sm">
        <thead>
            <tr class="table-active">
                <th scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <th scope="col">Form Name</th>
                <th>Form Description</th>
                <th scope="col">File</th>
            </tr>
        </thead>
        <tbody>
<?php
                foreach($forms->result_array() as $form):
                    $filename = urlencode($form['form_name']);
                    $files = glob("uploads/forms/{$filename}.*");
                    if (count($files) > 0) $files = $files[0];
                    else $files = "default.png";
?>
                <tr>
                    <td>    <input type="checkbox" name="form[]" value="<?=$form['form_id']?>">                             </td>
                    <td>    <?=$form['form_name'];?>                                                                        </td>
                    <td>    <?=$form['form_desc'];?>                                                                        </td>
                    <td>    <a href="<?=base_url($files)?>" target="_blank">View File</a></td>
                    <td><?=anchor("forms/edit/{$form['form_id']}", "Edit");?></td> 


                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?=form_close();?>

</div>
