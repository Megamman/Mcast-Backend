<div class="container td-margin mt-4 mb-3">
    <div class="row">
        <div class="col-12 d-flex">
            <h5 class="card-title">Students</h5>

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

    <?=form_open('students/submit_form')?>
        <button type="submit" name="button" value="delete">Delete</button>

        <table class="table table-sm">
            <thead>
                <tr class="table-active">
                    <th></th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course</th>
                    <th scope="col">Level</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users->result_array() as $user): ?>
                        <tr>
                            <td><input type="checkbox" name="student[]" value="<?=$user['id_login']?>"></td>
                            <td>    <?=$user['user_id'];?>         </td>
                            <td>    <?=$user['user_name'];?>       </td>
                            <td>    <?=$user['user_surname'];?>       </td>
                            <td>    <?=$user['email_login'];?>    </td>
                            <td>    <?=$user['course_name'];?>    </td>
                            <td>    <?=$user['course_lvl'];?>    </td>
                            <td>    <?=$user['std_link'];?>    </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?=form_close();?>
</div>
