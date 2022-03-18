<?php
    include_once('header.php');
?>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div>
                    <div class="mt-5">
                        <a href="index.php" class="d-block text-right">All Posts</a>
                    </div>
                    
                    <?php
                        if(isset($_GET['id']) && is_numeric($_GET['id'])){
                            $id = $_GET['id'];
                            
                            $sql = "SELECT * FROM `posts` WHERE `id` = $id";
                            
                            $result = $conn->query($sql);

                            if($result->num_rows > 0)
                            {
                                $data = $result->fetch_assoc();
                    ?>
                        
                                <form action="" method="POST">
                                <div class="form-group">
                                    <label for="postTitle">Post Title</label>
                                    <input id="postTitle" class="form-control" type="text" name="post_title" placeholder="Post Title" value="<?php echo $data['title']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="postDescription">Post Description</label>
                                    <textarea id="postDescription" class="form-control" name="post_description" cols="30" rows="5" placeholder="Post Description"><?php echo $data['description']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="update_post"  class="btn btn-primary float-right" value="UPDATE">
                                </div>
                                </form>
                        <?php
                            }else{
                        ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Post not found!
                            </div>
                        <?php
                            }
                        }else{
                        ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Something went wrong! Please try again later!
                            </div>
                        <?php
                        }
                    ?>
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