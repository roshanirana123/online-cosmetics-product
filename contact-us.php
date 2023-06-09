<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href=./CSS/contactus.css>
</head>
<body>

<body>
    <h1>Contact Us</h1>
    
    <form action="#" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name"required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email"required><br><br>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" placeholder="Enter Your message" rows="4" cols="30"></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>

</body>
</html>