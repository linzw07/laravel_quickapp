<?php
//get the first name
$first_name = Input::get('first_name');
$last_name = Input::get('last_name');
$phone_number = Input::get('phone_number');
$email = Input::get('email');
$subject = Input::get('subject');
$message = Input::get('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?> 

<h1>We been contacted by.... </h1>


<table  style="width:400px;border:1px solid black;">
    <tbody>
        <tr>
            <td> First name: </td>< <td> <?php echo ($first_name); ?></td>	
        </tr>
        <tr>
            <td> Email address: </td>< <td> <?php echo ($email); ?></td>
        </tr>
        <tr>
            <td>   Subject: </td>< <td> <?php echo ($subject); ?></td>	
        </tr>
        <tr>
            <td>   Message: </td>< <td> <?php echo ($message); ?></td>
        </tr>
        <tr>

            <td>    Date: </td>< <td> <?php echo($date_time); ?>	</td>
        </tr>
        <tr>
            <td>    User IP address: </td>< <td> <?php echo($userIpAddress); ?></td>
        </tr>


    </tbody>
</table>
<style>
    table,th,td
    {
        border:1px solid black;
        border-collapse:collapse;
    }
    th,td
    {
        padding:5px;
    }
</style>