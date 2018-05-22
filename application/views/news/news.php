<div class="container td-margin mt-4 mb-3">
    <div class="row">
        <div class="col-12 d-flex">
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
        </div>
    </div>

    <?=form_open('news/submit_form')?>
        <button type="submit" name="button" value="delete">Delete</button>
        <table class="table table-sm">
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
                <td><input type="checkbox" name="news[]" value="<?=$news['news_id']?>"></td>
                <td> <?=$news['news_title'];?> </td>
                <td> <?=$news['news_desc'];?> </td>
                <td> <a href="<?=base_url($files)?>" target="_blank">View File</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?=form_close();?>
</div>
