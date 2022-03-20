<?php
    include_once('header.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['create_post']))
    {
        $createPost = $post->createPost($_POST, $_FILES);
    }
?>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div>
                    <?php
                        if(isset($createPost))
                        {
                            echo $createPost;
                        }
                    ?>
                    <div class="mt-5">
                        <a href="index.php" class="d-block text-right">All Posts</a>
                    </div>
                    
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="postTitle">Post Title <span class="text-warning">*</span></label>
                            <input id="postTitle" class="form-control" type="text" name="post_title" placeholder="Post Title">
                        </div>

                        <div class="form-group">
                            <label for="postDescription">Post Description</label>
                            <textarea id="postDescription" class="form-control" name="post_description" cols="30" rows="5" placeholder="Post Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="postImage">Image <span class="text-warning">*</span></label>
                            <input id="postImage" class="form-control" type="file" name="post_image" placeholder="Post Image">
                           </div>

                        <div class="form-group">
                            <input type="submit" name="create_post"  class="btn btn-primary float-right" value="POST">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>