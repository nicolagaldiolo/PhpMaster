<?php
    
// exit() e die() sono praticamente la stessa funzione, die è un alias di exit

// a exit() o die() può essere passata una funzione che viene chiamata prima di terminare il processo

function printMessage(){
    return "Esegui la funzione prima si terminare il processo";
}
//die(printMessage());


$conn = mysqli_connect("localhost", "root", "", "phpmaster");
function err_msg($conn){
    return "Could do not exec query: " . mysqli_error($conn);
}

mysqli_query($conn, "SELECT * FROM ss") || die(err_msg($conn));