<?php
$alertType = "";
$alertContent = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emailTo = "ahmed.taha.ss24@gmail.com";
    $subject = $_POST['subject'];
    $body = $_POST['message'];
    $headers = "From: " . $_POST['email'];

    if (mail($emailTo, $subject, $body, $headers)) {
        $alertType = "alert-success";
        $alertContent = "Email sent successfully.";
    } else {
        $alertType = "alert-warning";
        $alertContent = "Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Contact Us</title>

    <style>
        #title {
            text-align: center;
            margin-top: 15px;
        }

        #footer {
            margin-top: 50px;
            padding-top: 15px;
            padding-bottom: 5px;
            text-align: center;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="portofolio.html#home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="portofolio.html#projects">Projects</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="portofolio.html#skills">Education</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="contact.php">Contact<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 id="title">Contact Me</h1>
        <form method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" placeholder="Subject" name="subject">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" rows="3" name="message"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Send</button>

            <div class="alert <?php echo $alertType ?>" role="alert" style="margin-top:20px">
                <?php echo $alertContent ?>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div id="footer" class="text-center bg-dark">
        <h1>Contact Me</h1>
        <p><i class="fas fa-phone-alt"></i> 10000</p>
        <p><i class="fas fa-envelope"></i> ahmed@gmail.com</p>
        <p>
            <i class="fas fa-map-marker-alt"></i> Address: New Cairo, Cairo - Egypt
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-2.0.0.js"
        integrity="sha256-iW43nTNM8LFseNmWKhV5FHFW1KcjVQMvzg3l9nPU4oc=" crossorigin="anonymous"></script>
</body>

</html>