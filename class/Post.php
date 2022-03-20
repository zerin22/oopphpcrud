<?php 
class Post{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //GET ALL POST FROM DATABASE
    public function getAllPost(){
        $query = "SELECT * FROM post ORDER BY id DESC";

        $result = $this->db->select($query);
        return $result;
    }

    //CREATE NEW POST
    public function createPost($data, $file)
    {
        $title = mysqli_real_escape_string($this->db->link, $data['post_title']);
        $description = mysqli_real_escape_string($this->db->link, $data['post_description']);


        //FILE PROCESS
        $image_name = $file['post_image']['name'];
        $image_size = $file['post_image']['size'];
        $image_temp = $file['post_image']['tmp_name'];
        $image_type = $file['post_image']['type'];

        
        $allowed = array(
            "jpg" => "image/jpg", 
            "jpeg" => "image/jpeg",
            "gif" => "image/gif", 
            "png" => "image/png"
        );

        //CHECK IF ANY REQUIRED FIELD IS EMPTY OR NOT
        if($title == "" || $image_name == "")
        {
            $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>Please check if any required field is left empty!</h4>
                    </div>
                ";
                return $msg;
        }

        // CHECKING ALOWED OR VAID FILE EXTENTION TYPE
        $ext = pathinfo($image_name, PATHINFO_EXTENSION);

        if(!array_key_exists($ext, $allowed))
        {
            $msg = "
                <div class='alert alert-danger mt-3 text-center'>
                    <h4>Only jpg/jpeg/png/gif file type is allowed!</h4>
                </div>
            ";
            return $msg;
        }

        //CHECKING FILE SIZE
        if($image_size > 1048567)
        {
            $msg = "
                <div class='alert alert-danger mt-3 text-center'>
                    <h4>Image Size should be less then 1MB!</h4>
                </div>
            ";
            return $msg;
        }

        $image = str_shuffle(time()).'.'.$ext; 

        $query = "INSERT INTO `post` (`title`, `description`, `image`)
                  VALUES ('$title', '$description', '$image')
                ";
        
        $insertPost = $this->db->insert($query);

        if($insertPost)
        {
            //STRING IMAGE TO SERVER IFDATA INSERTED SUCCESSFULLY
            $dir = "asset/img/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            move_uploaded_file($_FILES["post_image"]["tmp_name"], $dir . $image);
            $msg = "
                <div class='alert alert-success mt-3 text-center'>
                    <h4>Post successfully created!</h4>
                </div>
            ";
            return $msg;
        }else{
            $msg = "
                <div class='alert alert-danger mt-3 text-center'>
                    <h4>Something went wrong! Please try again later.</h4>
                </div>
            ";
            
            return $msg;
        }
    }

    //VIEW SINGLE POST
    public function viewSinglePost($id){
        $postQuery = "SELECT * FROM post WHERE id='$id'";
        $getPost = $this->db->select($postQuery);
        return $getPost;
    }
    //DELETE SINGLE POST
    public function deleteSinglePost($id){

        $postQuery = "SELECT * FROM post WHERE id='$id'";

        $getPost = $this->db->select($postQuery);

        if($getPost){
            $query = "DELETE FROM post WHERE id='$id'";
            $deletePost = $this->db->delete($query);
    
            if($deletePost)
            {
                $msg = "
                    <div class='alert alert-success mt-3 text-center'>
                        <h4>Post deleted successfully!</h4>
                    </div>
                ";
                return $msg;
            }else{
                $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>Unable to delete the post.!</h4>
                    </div>
                ";
                return $msg;
            }
        }else{
            $msg = "
                    <div class='alert alert-danger mt-3 text-center'>
                        <h4>The post you want to delete not found!</h4>
                    </div>
                ";
                return $msg;
        }
        
    }
}