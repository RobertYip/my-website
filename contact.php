<?php

if($_POST["submit"]) {
    $recipient="robertyip88@gmail.com";
    $subject="Form to email message";
    $senderName=$_POST["senderName"];
    $senderEmail=$_POST["senderEmail"];
    $sendermessage=$_POST["senderMessage"];

    $mailBody="Name: $senderName\nEmail: $senderEmail\n\n$senderMessage";

    mail($recipient, $subject, $mailBody, "From: $senderName <$senderEmail>");
    echo "<script type='text/javascript'>alert('Message Sent');</script>";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Robert Yip's Website</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="custom.css">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
  <script defer src="jquery-3.4.1.min.js"></script>
  <script defer src="bootstrap.bundle.min.js"></script>
  <script defer src="common.js"></script>
</head>

<body>
  <div class="page-container">
    <!-- Navbar Here -->
    <div id="navigation-bar"></div>
    <!-- End Navbar -->
    <!-- Content -->
    <section class="contents">
      <h1>Contact Me</h1>
      <div class="paragraph">
        <p>
          Feel free to reach out to me!
        </p>
      </div>
      <div>
        <form method="post" action="contact.php">
          <div class="form-group row">
            <label for="senderName" class="col-sm-2 col-form-label">Name<span id="required">*</span></label>
            <div class="col-sm-10">
              <input type="text" name="senderName" class="form-control" id="senderName" required minlength="1"
                maxlength="50">
            </div>
          </div>
          <div class="form-group row">
            <label for="senderEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="senderEmail" class="form-control" id="senderEmail" maxlength="50">
              <small class="form-text text-muted">Optional; leave an email if you want a reply.</small>
            </div>
          </div>
          <div class="form-group row">
            <label for="senderMessage" class="col-sm-2 col-form-label">Message<span id="required">*</span></label>
            <div class="col-sm-10">
              <textarea type="text" name="senderMessage" class="form-control" id="senderMessage" required minlength="1"
                maxlength="300" rows="5"></textarea>
              <small class="form-text text-muted">Characters remaining: <span id="msgChar"></span></small>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="pl-3">
              <button type="submit" class="btn btn-primary">Submit</button>

            </div>
          </div>
        </form>
      </div>
    </section>
    <div id="foot"></div>
  </div>
  
  <script type="text/javascript" language="javascript">
    //Set message character counter
    var msg = document.getElementById("senderMessage");
    var msgDisplay = document.getElementById("msgChar");
    var max = 300; //set max length here
    msg.maxLength = max;
    msgDisplay.textContent = (max - msg.value.length); //Initialize
    msg.addEventListener("input", function () {
      msgDisplay.textContent = (max - msg.value.length);
    });

    //Submit Button
    document.querySelector("button").addEventListener("click", function () {
      alert("Sent");
    })
  </script>
</body>

</html>