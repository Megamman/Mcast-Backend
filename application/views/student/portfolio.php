<div class="container td-margin d-flex flex-row mt-4 mb-3">
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

    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<div class="container">
    <table class="table table-sm ">
        <thead>
            <tr class="table-active ">
                <th scope="col">Selected</th>
                <th scope="col">Favorite</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surame</th>
                <th scope="col">Course</th>
                <th scope="col">Level</th>
                <th scope="col">Link</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <td> <button type="button" name="button"> <i class="far fa-star"></i> <i class="fas fa-star yell hidden"></i></button></td>
                <td>123456M</td>
                <td>Mark</td>
                <td>Marks</td>
                <td>Course Name</td>
                <td>2</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>
</div>
