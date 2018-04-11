<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 4/10/2018
 * Time: 10:06 AM
 */
include 'includes/header.php';

$name = $email= $content= "";
$nameErr= $emailErr= $contentErr= "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $emailErr = "email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["content"])) {
        $contentErr = "Name is required";
    } else {
        $content = test_input($_POST["content"]);
    }
    $to_aws = json_encode(array('name' => $name, 'email' => $email, 'content' => $content));
    echo $to_aws;
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<section>
    <h3>Contact Me</h3>
    <p>I'd love to discuss my current projects and what I am learning about now.  Please feel free to reach out.<br>
        <span class="error">* All fields required</span></p>

    <form id="contactForm" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        Name: <input type="text" name="name">
        <span class="error">*<?= $nameErr ?></span>
        <br><br>
        Email: <input type="email" name="email">
        <span class="error">*<?= $emailErr ?></span>
        <br><br>
        Message:<br> <textarea rows="10" cols="100" name="content" form="contactForm"></textarea>
        <span class="error">*<?= $contentErr ?></span>
        <br><br>
        <input type="submit" value="send">
    </form></section>
<?
include 'includes/connecttoaws.php';
include 'includes/footer.php' ?>
