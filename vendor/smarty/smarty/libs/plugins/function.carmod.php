<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */
/**
 * Smarty {counter} function plugin
 * Type:     function
 * Name:     counter
 * Purpose:  print out a counter value
 *
 * @author Monte Ohrt <monte at ohrt dot com>
 * @link   http://www.smarty.net/manual/en/language.function.counter.php {counter}
 *         (Smarty online manual)
 *
 */
function smarty_function_carmod( $params, $template)
{
    //Lp express terminal
    $servername = "localhost";
    $username = "Admin";
    $password = "DFfgdde467%$#d";
    $dbname = "reikiadaliu";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //SELECT * from ps_orders WHERE ps_orders.reference = 'MCKLGYBMQ'
    $sql = "SELECT Max(id_order) from ps_orders";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $sql = "SELECT id_lpexpress_terminal FROM `ps_lpexpress_terminal_order` WHERE ps_lpexpress_terminal_order.id_order = ".$row['id_order'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $sql = "SELECT name,address,zip,city FROM `ps_lpexpress_terminal` WHERE ps_lpexpress_terminal.id_lpexpress_terminal =".$row['id_lpexpress_terminal'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    print($row['name'] . " ". $row['address'] . " ". $row['zip']." ". $row['city']. "<br>");
    echo"123";


    $conn->close();
    /*$sql = "INSERT INTO ps_lpexpress_terminal_order (id_cart, id_order, id_lpexpress_terminal,id_lpexpress_box,'type',weight,packets,cod,cod_amount)
VALUES ($id_cart, $order->id, $terminal,0,'terminal',0,1,1,$amount_paid)";*/
    /*$sql = "INSERT INTO ps_lpexpress_terminal_order (id_cart, id_order, id_lpexpress_terminal,id_lpexpress_box,type,weight,packets,cod,cod_amount)
VALUES (1500, 1500, 260,0,'terminal',0,1,1,1500)";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();*/

}
