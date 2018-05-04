<div class="container td-margin d-flex flex-row mt-4 mb-3 align-items-center">
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

    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<div class="container">
    <table class="table table-sm text-center">
        <thead>
            <tr class="table-active">
                <th scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <th scope="col">Full Name</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </td>
                <td>Lecturer Name</td>
                <td>Starting Date</td>
                <td>Enging Date</td>
            </tr>
        </tbody>
    </table>
</div>
