<?php
    $conn = new mysqli('localhost', 'root', '', 'rating');

    if (isset($_POST['save'])) {
        $uID = $conn->real_escape_string($_POST['uID']);
        $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
        $ratedIndex++;

        if (!$uID) {
            $conn->query("INSERT INTO stars (rateIndex) VALUES ('$ratedIndex')");
            $sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
            $uData = $sql->fetch_assoc();
            $uID = $uData['id'];
        } else
            $conn->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID'");

        exit(json_encode(array('id' => $uID)));
    }
    $sql = $conn->query("SELECT id FROM stars");
    $numR = $sql->num_rows;

    $sql = $conn->query("SELECT SUM(rateIndex) AS total FROM stars");
    $rData = $sql->fetch_array();
    $total = $rData['total'];

    $avg = $total / $numR;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Diavasi 1977</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@100;200;300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <section class="header">
            <nav>
                <a href="index.php"><img src="images/logo.png"></a>
                <div class="nav-links hidden-sm" id="navLinks">
                <i class="fas fa-bars" onclick="showMenu()"></i>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <!--<li><a href="menu.php">Μενού</a></li>-->
                        <li><a href="#info-section">About us</a></li>
                        <li><a href="#contact-section">Contact</a></li>
                        <li><a href="index-en.php" language='english'>GR</a></li>
                    </ul>
                </div>
                <i class="fas fa-bars" id="bars" onclick="hideMenu()"></i>
            </nav>
            <video src="images/video.mp4" muted loop autoplay></video>
            <div class="overlay"></div>
        </section>
        <!--<div class="backlogo">
            <img src="images/logo.png" style="position: fixed; align-items: center; opacity: 0.010;">
        </div>-->

        <!----------INFO------------>
        <div class="info">
            <section class="cards-area" id="info-section">
                <h1>Who we are</h1><br>
                <p class="text-justify">
                One of the established values ​​for good food in the city, the restaurant Diavasi continues since 1977 to create ... 
                faithful patrons. Starting from Angelos Chantakis, one of the best roasters in Thessaloniki, master of the tour, 
                today the reins have been taken over by the ... next generation, in which the founder has mastered the experience of 
                so many years and his little hand. Combining traditional and modern elements in its aesthetics, it stands out for decades 
                for its juicy and delicious soutzoukaki and of course its ... famous round, which are perfectly accompanied by homemade 
                potatoes, handmade Russian and exuberant fresh salads, all from fresh . There is not a single person from Thessaloniki 
                who has not passed through here and has not left with the best impressions for the quality, the filling dishes and the 
                excellent prices. Plus the updated wine cellar of mainly Greek wines. As for the service, ... its high level you will 
                find out yourself! Beautifully decorated space, suitable to feel intimacy from the first moment. The specialties of Diavasi 
                are the soutzoukaki and the gyros, while it has a great variety of grilled meats of the hour. Accompany them with freshly 
                cut french fries, eggplant salad or Russian, as well as with your favorite wine or drink, since you will definitely find it 
                through the large wine cellar.
            </p>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="images/diavasi-1.jpg" alt="" style="object-fit: cover;">                   
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="images/image2.jpg" alt="" style="object-fit: cover;">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="images/diavasi-2.jpg" alt="" style="object-fit: cover;">                   
                        </div>
                    </div>
                </div> 
            </section>  
        </section>

        <!----------CONTACT---------->
        <section class="contact" id="contact-section">
            <h1>Location and Contact</h1>
            <div class="row">
                <div class="col-sm-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12112.08614860259!2d22.947726!3d40.629407!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48a806ff0ab3b407!2sAFES%20CHANTAKI%20O.E.%7C%7CDIAVASI%201977!5e0!3m2!1sen!2sgr!4v1639141869970!5m2!1sen!2sgr" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                    
                        <p><i class="fas fa-map-marker-alt " style="color: #000;"></i><a href="https://goo.gl/maps/sUrVfhtbSKUC9ACv5" target="_blanc"> Pavlou Mela 13, Thessaloniki 54622</a><br><br> </p>
                        <i class="fas fa-phone " style="color: #000; transform: rotateY(180deg);"></i><a href="tel:+30 +30 2310220596"> +30 2310 220596</a><br><br> 
                        <i class="fas fa-envelope " style="color: #000;"></i><a href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJTDGxfFzQsZtKhxbJMVWmmfshqTHqGsmkXZfgKTTXMfgxkhnxvbSscRDXpggXlDhRtb"> diavasi1977@gmail.com</a>
                </div>
            </div>
        </section>
        <br>
        
        <?php require_once 'rating.php'; ?>
        
        <?php require_once 'footer.php'; ?>

        <a href="#" class="topBtn"><i class="fas fa-chevron-up"></i></a>
        
        <!---------JavaScript--------->
        <script src="JavaScript.js"></script>
    </body>
</html>