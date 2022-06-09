<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunctions.php");

if(isset($_POST['add_category_btn']))
{

    $name= $_POST['name'];
    $slug=$_POST['slug'] . "-" . rand(10,99);
    $description=$_POST['description'];
    $status=isset($_POST['status']) ? '1':'0';
    $image= $_FILES['image']['name'];

    $path="../images"; 
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories (name,slug,description,status,image) 
    VALUES ('$name', '$slug','$description',' $status', '$filename')";

    $cate_query_run=mysqli_query($conn, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-category.php", "Catefory added Successfully");
    }else
    {
        redirect("add-category.php", "Something Went Wrong");
    }
}else if(isset($_POST['update_category_btn']))
{

    $category_id= $_POST['category_id'];
    $name= $_POST['name'];
    $slug=$_POST['slug'];
    $description=$_POST['description'];
    $status=isset($_POST['status']) ? '1':'0';

    $new_image= $_FILES['image']['name'];
    $old_image= $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename= $new_image;
        $image_ext=pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    
    }
    else
    {
        $update_filename=$old_image;
    }
    $path="../images"; 
    $update_query= "UPDATE categories SET name='$name', slug='$slug', description='$description', status='$status', image='$update_filename' WHERE id='$category_id'";
    $update_query_run= mysqli_query($conn,$update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'. $update_filename);
            if(file_exists("../images/".$old_image))
            {
                unlink("../images/".$old_image);
            }
        }
        redirect("edit-category.php?id=$category_id","Category Update Successflly");
    }
    else
    {
        redirect("edit-category.php?id=$category_id","Something Wrong");
    }
}
else if(isset($_POST['delete_category_btn']))
{
    $category_id=mysqli_real_escape_string($conn,$_POST['category_id']);

    $category_query="SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run=mysqli_query($conn,$category_query);
    $category_data=mysqli_fetch_array($category_query_run);
    $image=$category_data['image'];
    
    $delete_query= "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run=mysqli_query($conn,$delete_query);
    
    if($delete_query_run)
    {
        if(file_exists("../images/".$image))
            {
                unlink("../images/".$image);
            }
        redirect("category.php","Category deleted Successflly");
    }else
    {
        redirect("caterory.php","Something Went Wrong");

    }
}
else if(isset($_POST['add_product_btn']))
{
    $category_id= $_POST['category_id'];

    $name= $_POST['name'];
    $slug= $_POST['slug']  . "-" . rand(10,99);
    $small_description= $_POST['small_description'];
    $description= $_POST['description'];
    $original_price= $_POST['original_price'];
    $selling_price= $_POST['selling_price'];
    $status= isset($_POST['status']) ? '1':'0';
    $qty= $_POST['qty'];
    $image= $_FILES['image']['name'];

    $path="../images"; 
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    if($name != "" && $slug != "" && $description !="")
    {
        $product_query= "INSERT INTO products (category_id,name,slug,small_description,description,original_price,selling_price,image,qty,status) VALUES 
        ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$filename','$qty','$status')";

        $product_query_run=mysqli_query($conn,$product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-product.php", "Product added Successfully");
        }else
        {
            redirect("add-product.php", "Something Went Wrong");
        }
    }else
    {
        redirect("add-product.php", "All fields are madatory");
    }
}
else if(isset($_POST['update_product_btn']))
{
    $product_id=$_POST['product_id'];
    $category_id= $_POST['category_id'];

    $name= $_POST['name'];
    $slug= $_POST['slug']  . "-" . rand(10,99);
    $small_description= $_POST['small_description'];
    $description= $_POST['description'];
    $original_price= $_POST['original_price'];
    $selling_price= $_POST['selling_price'];
    $status= isset($_POST['status']) ? '1':'0';
    $qty= $_POST['qty'];

    $path="../images"; 

    $new_image= $_FILES['image']['name'];
    $old_image= $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename= $new_image;
        $image_ext=pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    
    }
    else
    {
        $update_filename=$old_image;
    }

    $update_product_query= "UPDATE products SET name='$name', slug='$slug', small_description='$small_description', description='$description',
    original_price='$original_price', selling_price='$selling_price', status='$status', qty='$qty', image='$update_filename' WHERE id='$product_id' ";
    $update_product_query_run= mysqli_query($conn,$update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'. $update_filename);
            if(file_exists("../images/".$old_image))
            {
                unlink("../images/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id","Product Update Successflly");
    }else
    {
        redirect("edit-product.php?id=$product_id","Something Wrong");
    }
}
else if(isset($_POST['delete_product_btn']))
{
    $product_id=mysqli_real_escape_string($conn,$_POST['product_id']);

    $product_query="SELECT * FROM products WHERE id='$product_id'";
    $product_query_run=mysqli_query($conn,$product_query);
    $product_data=mysqli_fetch_array($product_query_run);
    $image=$product_data['image'];

    $delete_query= "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run=mysqli_query($conn,$delete_query);
    
    if($delete_query_run)
    {
        if(file_exists("../images/".$image))
            {
                unlink("../images/".$image);
            }
        redirect("products.php","Product deleted Successflly");
    }else
    {
        redirect("products.php","Something Went Wrong");

    }

}
else if(isset($_POST['add_blog_btn']))
{
    $title= $_POST['title'];
    $slug= $_POST['slug']  . "-" . rand(10,99);
    $content= addslashes($_POST['content']);

    $image= $_FILES['image']['name'];

    $path="../images"; 
    $image_ext=pathinfo($image, PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    if($title != "" && $slug != "" && $content !="")
    {
        $blog_query= "INSERT INTO blog (title,slug,img,content) VALUES 
        ('$title', '$slug', '$filename', '$content')";

        $blog_query_run=mysqli_query($conn,$blog_query);

        if($blog_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-blog.php", "blog added Successfully");
        }else
        {
            redirect("add-blog.php", "Something Went Wrong");
        }
    }else
    {
        redirect("add-product.php", "All fields are madatory");
    }
}
else if(isset($_POST['update_blog_btn'])){
    
    $id         = $_POST['id'];
    $title      = $_POST['title'];
    $slug       = $_POST['slug']  . "-" . rand(10,99);
    $content    = addslashes($_POST['content']);

    $path   =   "../images"; 

    $new_image= $_FILES['image']['name'];
    $old_image= $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename= $new_image;
        $image_ext=pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_blog_query= "UPDATE
                            `blog`
                        SET
                            `title`     = '$title',
                            `slug`      = '$slug',
                            `img`       = '$update_filename',
                            `content`   = '$content'
                        WHERE
                            `id` = '$id'";

    $update_blog_query_run  = mysqli_query($conn,$update_blog_query);

    if($update_blog_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'. $update_filename);
            if(file_exists("../images/".$old_image))
            {
                unlink("../images/".$old_image);
            }
        }
        redirect("edit-blog.php?id=$id","blog Update Successflly");
    }else
    {
        redirect("edit-blog.php?id=$id","Something Wrong");
    }
}
else if(isset($_POST['delete_blog_btn'])){
    $blog_id    =   $_POST['blog_id'];

    $blog_query =   "SELECT * FROM blog WHERE id='$blog_id'";

    $blog_query_run = mysqli_query($conn,$blog_query);

    $blog_data  =  mysqli_fetch_array($blog_query_run);

    $image      =   $blog_data['img'];

    $delete_query   = "DELETE FROM blog WHERE id='$blog_id'";

    $delete_query_run=mysqli_query($conn,$delete_query);
    
    if($delete_query_run)
    {
        if(file_exists("../images/".$image))
            {
                unlink("../images/".$image);
            }
        redirect("blog.php","Blog deleted Successflly");
    }else
    {
        redirect("blog.php","Something Went Wrong");

    }
}
{
    header('Location: ../index.php');
}
?>