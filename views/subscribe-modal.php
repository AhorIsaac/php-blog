<?php

?>

<div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog bg-light" id="subscribe-frame">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="text-info"> <span class="site-logo">CB</span> CodeBlog </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controllers/SubscriberController.php" method="POST" class="mt-3">
          <div class="form-group text-center row justify-content-center m-2" style="font-family: monospace;">
            <label for="email" class="col-form-label col-md-1 col-sm-1">
              <i class="fa fa-envelope fa-1x"></i>
            </label>
            <div class="col-md-9">
              <input type="email" class="form-control shadow rounded" placeholder="someone@example.com" name="email" id="subscribers-email" style="border: 1px dotted #17a2b8;" required />
            </div>
          </div>
          <div class='form-group row justify-content-center'>
            <input type="reset" class="btn btn-outline-dark m-2 shadow" value='Reset' id="blog_button" />
            <input type="submit" class="btn btn-outline-info m-2 shadow" name="subscribe_to_codeblog" value="Subscribe" id="blog_button" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <h4 class="text-dark"> &copy;Trey Corporation </h4>
      </div>
    </div>
  </div>
</div>