<?php
    include_once('header.php');
?>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div>
                    <div class="mt-2">
                        <a href="index.php" class="d-block text-right">All Posts</a>
                    </div>
                    
                    <?php
                        if(isset($_GET['id']) && is_numeric($_GET['id'])){
                            $id = $_GET['id'];
                            
                            
                            $getPost = $post->viewSinglePost($id);

                            if($getPost != NULL)
                            {
                                $data = $getPost->fetch_assoc();
                    ?>
                            <img src="assets/img/post.jpg" alt="" class="img-fluid">
                            <hr>
                            <div>
                                <h6 class="text-center">
                                    <?php echo $data['title']; ?> | 
                                    Posted On: <?php echo date("F j, Y, g:i a", strtotime($data['created_at'])); ?>
                                </h6>
                            </div>

                            <p class="text-justify">
                                <?php echo $data['description']; ?>
                            </p>
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