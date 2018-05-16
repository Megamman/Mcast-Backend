<div class="container td-margin d-flex flex-row mt-4 mb-3 align-items-center">
    <h5 class="card-title">Vacancies</h5>

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

    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<div class="container">
    <table class="table table-sm">
        <thead>
            <tr class="table-active">
                <th scope="col">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <th scope="col">Job Title</th>
                <th scope="col">Job Description</th>
                <th scope="col">End Date</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($jobs->result_array() as $job): ?>
            <tr>
                <td>    <input type="checkbox" name="job[]" value="<?=$job['job_id']?>">    </td>
                <td>    <?=$job['job_name'];?>                                              </td>
                <td>    <?=$job['job_desc'];?>                                             </td>
                <td>    <?=$job['job_end'];?>                                             </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
