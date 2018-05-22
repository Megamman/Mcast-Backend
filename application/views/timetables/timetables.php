<div class="container td-margin mt-4 mb-3">
    <div class="row">
        <div class="col-12 d-flex">
            <h5 class="card-title">TimeTables</h5>

            <?php foreach ($links as $link): ?>
                <a href="<?=site_url($link['link'])?>" class="btn btn-link btn-sm mr-1 mt-2" role="button">
                    <?php if ($link['icon'] != null): ?>
                        <i class="fas <?=$link['icon']?> fa-sm "></i>
                    <?php endif; ?>

                    <?php if ($link['caption'] != null): ?>
                        <?=$link['caption']?>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <?=form_open('timetables/submit_form')?>
        <button type="submit" name="button" value="delete">Delete</button>
        <table class="table table-sm">
        <thead>
            <tr class="table-active">
                <th scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <th scope="col">Class Name</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </td>
                <td>BA in Class Name</td>
                <td>@Image@</td>
            </tr>
        </tbody>
    </table>
    <?=form_close();?>

</div>
