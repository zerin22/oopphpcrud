<?php
    include_once('header.php');
?>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="mt-5 float-right">
                    <a href="create.php">New Post</a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Post Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $getPost = $post->getAllPost();
                        
                        if($getPost)
                        {
                            while($data = $getPost->fetch_assoc())
                            {
                    ?>
                                <tr>
                                    <td>  </td>
                                    <td>  </td>                            
                                    <td>
                                        <a href="view.php?id=" class="btn btn-primary">View</a> | 
                                        <a href="edit.php?id=" class="btn btn-warning">Edit</a> | 
                                        <a href="delete.php?id=" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                    <?PHP            
                            }
                        }else{
                    ?>
                            <tr>
                                <td colspan="3" class="text-center text-danger">
                                    No Post Found
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                    
                </table>
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