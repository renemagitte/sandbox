<!DOCTYPE html>
<html lang="en">

<?php
    require 'database.php';    
?>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<style>
    body {
        background-color: lightgray;
    }
    .output{
        background-color: white;
        width: 200px;
        height: 200px;
    }
    
</style>

<script>
    function reqListener () {
      console.log(this.responseText);
    }

    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        //alert(this.responseText); //Will alert: 42
        console.log(this.responseText);
    };
    oReq.open("get", "get-data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
</script>

<body>
    <div class="output"></div>
</body>
</html>