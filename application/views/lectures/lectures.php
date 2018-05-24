<div class="container td-margin mt-4 mb-3">
    <div class="row">
        <div class="col-12 d-flex">
            <h5 class="card-title">Absent</h5>

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

    <?=form_open('lectures/submit_form')?>
        <button type="submit" name="button" value="delete">Delete</button>
        <table class="table table-sm">
        <thead>
            <tr class="table-active">
                <th><input type="checkbox" name="check"  /></th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">End</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lectures->result_array() as $lect): ?>
            <tr>
                <td><input type="checkbox" name="lect[]" value="<?=$lect['tbl_login_id_login']?>"></td>
                <td>    <?=$lect['user_name'];?>                     </td>
                <td>    <?=$lect['email_login'];?>                   </td>
                <td>    <?=date('d M Y', $lect['lect_end']);?>        </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?=form_close();?>

</div>
