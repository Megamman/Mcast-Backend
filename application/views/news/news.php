<div class="container td-margin d-flex flex-row mt-4 mb-3 align-items-center">
    <h5 class="card-title">News</h5>

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
    <table class="table table-sm  ">
        <thead>
            <tr class="table-active">
                <th scope="col">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </th>
                <th scope="col">News Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
<?php       foreach($news->result_array() as $news):
            $filename = urlencode($news['news_title']);
            $files = glob("uploads/news/{$filename}.*");
            if (count($files) > 0) $files = $files[0];
            else $files = "default.png";

?>
            <tr>
                <td scope="row">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                </td>
                <td> <?=$news['news_title'];?> </td>
                <td> <?=$news['news_desc'];?> </td>
                <td> <a href="<?=base_url($files)?>" target="_blank">View File</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
