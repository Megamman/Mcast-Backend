<div class="container td-margin mt-4 mb-3">
    <div class="row">
        <div class="col-12 d-flex">
            <h5 class="card-title">Jobs</h5>

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

    <?=form_open('jobs/submit_form')?>
        <button type="submit" name="button" value="delete"class="btn btn-link btn-sm"> <i class="fas fa-trash-alt"></i></button>
        <table class="table table-sm">
        <thead>
            <tr class="table-active">
                <th scope="col">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <th scope="col">Job Title</th>
                <th scope="col">Job Description</th>
                <th scope="col">End Date</th>
                <th scope="col"></th>


            </tr>
        </thead>
        <tbody>
            <?php foreach($jobs->result_array() as $job): ?>
            <tr>
                <td>    <input type="checkbox" name="job[]" value="<?=$job['job_id']?>">    </td>
                <td>    <?=$job['job_name'];?>                                              </td>
                <td>    <?=$job['job_desc'];?>                                              </td>
                <td>    <?=date('d M Y', $job['job_end']);?>                                </td>
                <td><?=anchor("jobs/edit/{$job['job_id']}", "Edit");?></td> <!-- anchor is the a href. -->

            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?=form_close();?>

</div>
