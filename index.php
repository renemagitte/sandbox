<!DOCTYPE html>
<html lang="en">

<?php
    require 'database.php';    
?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<style>
    body {
        background-color: lightgray;
      font-family: sans-serif;
      font-weight: 300;
    }
    .output{
        background-color: white;
        width: 100px;
        height: 100px;
    }
}


    
</style>


<body>
    <div class="output"></div>
    
<!--    Calendar -->
   
    <div id="calendar"></div>
    
<!--Post customer to database form -->
   
<!--    <form action="post-customer.php" method="POST" enctype="multipart/form-data">-->
    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label for="name"> Name: </label>
          <input type="text" name="name" class="form-control" id="nameField">
        </div>

        <div class="form-group">
          <label for="email"> Email: </label>
          <input type="text" name="email" class="form-control" id="emailField">
        </div>
        
        <div class="form-group">
          <label for="telephone"> Telephone number: </label>
          <input type="text" name="telephone" id="telephoneField">
        </div>

        <div class="form-group">
<!--          <input type="submit" class="btn btn-primary">-->
               <button class="btn btn-primary" onClick="loadXMLDoc()">Posta ny kund</button>
        </div>

      </form>
    
    
    
    

<script>
    

    
    
    /* Database connection & output */
    
    const outputDiv = document.querySelector('.output');
    
    function reqListener () {
      console.log(this.responseText);
    }

    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        //alert(this.responseText); //Will alert: 42
        console.log(this.responseText);
        
        let dataParsed = JSON.parse(this.responseText);
        console.log(dataParsed[0].name);
        let output = dataParsed[0].name;
        outputDiv.innerText = output;
    };
    oReq.open("get", "get-data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
    
    
    
    
    
    
    /* Post customer to database */
    
    const nameField = document.getElementById('nameField');
    const emailField = document.getElementById('emailField');
    const telephoneField = document.getElementById('telephoneField');  
    
    function loadXMLDoc() {
        
    
    let name = nameField.value;
    let email = emailField.value;
    let telephone = telephoneField.value;
        
        
       var xmlhttp;
       if (window.XMLHttpRequest){
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
       }
       else{
          // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
       }

       xmlhttp.onreadystatechange=function(){
         if (xmlhttp.readyState==4 && xmlhttp.status==200)
         {
            document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
         }
       }

       data = "name="+name+"&email="+email+"&telephone="+telephone;
       xmlhttp.open("POST","post-customer.php",true);
       xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send(data);
    }
    
    

</script>

<script src="calendar.js"></script>



</body>
</html>