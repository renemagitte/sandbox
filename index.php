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
    
    <div id="calendar"></div>
    

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
    

</script>

<script src="calendar.js"></script>



</body>
</html>