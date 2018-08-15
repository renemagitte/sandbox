<?php
    require 'database.php';


if(isset($_POST)){
   $name = $_POST['name'];
   $email = $_POST['email'];
    $telephone = $_POST['telephone'];
   //Do same for all other variables

   //Steps to insert Data into Database
   //1. Connect to database 
   //2. Select Database
   //3. Generate Database Insert Query
   //4. Run mysql Query to insert

   // Return appropriate return back to Javascript code - Success or Failure 
    
    $statement = $pdo->prepare("
      INSERT INTO customers (name, email, telephone)
      VALUES (:name, :email, :telephone)
      ");

    $statement->execute(array(
      ":name" => $name,
      ":email" => $email,
      ":telephone" => $telephone
    ));
    
    //$blog_id = $pdo->lastInsertId();
    
 }


/* Old from millhouse..
    $user = $_POST["user"];
    $title = $_POST["post_title"];
    $post = $_POST["new_post"];
    $category = $_POST["category"];

    $path = $_FILES["uploaded_file"]["tmp_name"];
    $filename = $_FILES["uploaded_file"]["name"];

    // FETCHING LAST INSERTED ID FOR REDIRECTING
    $stmt = $pdo->prepare("
    SELECT id
    FROM posts
    WHERE user = :user 
    ");
    $stmt->execute(array(
    ":user" => $user
    ));

if(move_uploaded_file($path, "../blog_img/" . $filename)){
    // var_dump($_FILES);
    
    $statement = $pdo->prepare("
        INSERT INTO posts (user, title, post, category, image) 
        VALUES (:user, :title, :post, :category, :image) ");
    
        $statement->execute(array(
        ":user" => $user,
        ":title" => $title,
        ":post" => $post,
        ":category" => $category,
        ":image" => "blog_img/" . $filename
    ));
    
    $blog_id = $pdo->lastInsertId();

    header("Location: ../post.php?post=" . $blog_id);
    

} else {
    $statement = $pdo->prepare("
      INSERT INTO posts (user, title, post, category)
      VALUES (:user, :title, :post, :category)");

    $statement->execute(array(
      ":user" => $user,
      ":title" => $title,
      ":post" => $post,
      ":category" => $category
    ));
    
    $blog_id = $pdo->lastInsertId();

    header("Location: ../post.php?post=" . $blog_id);
}

*/


?>