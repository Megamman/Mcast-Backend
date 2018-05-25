<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Add New</h5>
</div>

<div class="container">
    <?=form_open_multipart('news/add_news', array('class' => '')); ?>
        <div class="form-group">
            <label for="exampleInputNews">News Title</label>
            <input type="text" class="form-control" name="news_title" id="exampleInputNews" placeholder="Enter News Title">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <textarea class="form-control" name="news_desc" id="exampleInputDescription" placeholder="Enter Description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputNewsImage">Image</label>
            <input type="file" class="form-control" id="exampleInputNewsImage" name="userfile" placeholder="Upload Image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?=form_close();?>
</div>
