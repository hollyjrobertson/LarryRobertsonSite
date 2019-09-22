<?php 
    $result = "";
    define('SITE_KEY', '6LfDv7kUAAAAANQGNYxxrndxXuxtbA9sekQzArKs');
    define('SECRET_KEY', '6LfDv7kUAAAAAA7APVMlkeVkIQpmf5xkl4Zhs7lH');

    if(isset($_POST['submit'])) {

      function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);

      //if($Return->success == true && $Return->score > 0) {

        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        $mailTo = "larry@larryrobertson.org";
        $headers = "From:".$mailFrom;
        $subject = "Larry (Ministry), You have mail from ".$name;
        $txt = "You have received an e-mail from ".$name.":\r\n"."\r\n".$message;

            if (mail($mailTo, $subject, $txt, $headers)){
                $result = "Thank you ".$name." for your message. <br>I will get back with you ASAP!";
            }
            else {
                $result = "Your message did not send. <br>I am working on this right now.";
            }
      //}
      //else {
       // $result = "Google thinks you're a robot. <br>If you're not, please email me at larry@larryrobertson.org.";
      //}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ministry - Contact Me</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" media="all" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
        <meta name="keywords" content="Ministry, Minister, Longview, Preaching, Preach, Weddings, Ceremonies, Therapy, Heal, Healing">
        <meta name="author" content="Holly Robertson">
        <meta name="description" content="Larry Robertson Ministry">
        <link rel="apple-touch-icon" sizes="180x180" href="images/logo/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/logo/favicon-16x16.png">
        <link rel="manifest" href="images/logo/site.webmanifest">
        <!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    </head>
    <body>
        <!-- Header -->
            <header id="header">
                <nav class="left">
                    <a href="#menu" title="Menu"><span>Menu</span></a>
                </nav>
                    <a href="index.html" class="logo"><img src="images/logo.png"/></a>
            </header>

        <!-- Menu -->
            <nav id="menu">
                <ul class="links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Me</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact.php">Contact Me</a></li>
                    <li><a href="https://www.desiringgod.org/articles/perfect-patience-with-the-worst-of-sinners" target="_blank">Article of the Month</a></li>
                </ul>
            </nav>

        <!-- Main -->
            <section id="main" class="wrapper">
                <div class="inner">
                    <header class="align-center">
                        <h1>Contact Me</h1>
                        <h3><?php echo "<br>".$result; ?></h3>
                    </header>
                    <!-- Form -->
                        <form action="contact.php" method="post">
                            <div class="row uniform">
                                <div class="6u 12u$(xsmall)">
                                    <input id="name" type="text" placeholder="Name" name="name" required>
                                </div>
                                <div class="6u$ 12u$(xsmall)">
                                    <input id="email" type="text" placeholder="Email" name="email" required>
                                </div>
                                <!-- Break -->
                                <div class="12u$">
                                    <textarea id="message" type="text" placeholder="Enter your message" name="message" rows="6"></textarea>
                                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br>
                                </div>
                                <!-- Break -->
                                <div class="12u$">
                                    <ul class="actions">
                                        <li><input type="submit" name="submit" value="Send Message" /></li>
                                        <li><input type="reset" name="reset" value="Reset" class="alt" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                </div>
            </section>

        <!-- Footer -->
            <footer id="footer">
                <div class="inner">
                    <h2><a href="contact.php">Get In Touch</a></h2>
                    <ul class="actions">
                        <li><span class="icon fa-phone"></span> (903) 331-8156</li>
                        <li><span class="icon fa-envelope"></span> larry@larryrobertson.org</li>
                        <li><span class="icon fa-map-marker"></span> East Texas Area</li>
                    </ul>
                </div>
                <div class="copyright">
                    &copy; Larry Robertson - Ministry
                </div>
            </footer>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>