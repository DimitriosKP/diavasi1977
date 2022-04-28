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
        <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@100;200;300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <section class="header">
            <nav>
                <a href="index-en.php"><img src="images/logo.png"></a>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="index-en.php">Homepage</a></li>
                        <li><a href="menu-en.php">Menu</a></li>
                        <li><a href="#info-section">About us</a></li>
                        <li><a href="#contact-section">Contact</a></li>
                        <li><a href="index.php" language='greek'>GR</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
            <video src="images/video.mp4" muted loop autoplay></video>
            <div class="overlay">
            </div>
        </section>
        <div class="backlogo">
            <img src="images/logo.png" style="position: fixed; align-items: center; opacity: 0.010;">
        </div>
        <div class="text-box">
            <h1></h1>
        </div>
        <!----------INFO------------>
        <section class="info">
            <section class="cards-area" id="info-section">
                <h1>Who we are</h1>
                <p align="justify">One of the established values ​​for good food in the city, the restaurant Diavasi continues since 1977 to create ... faithful patrons. Starting from Angelos Chantakis, one of the best roasters in Thessaloniki, master of the tour, today the reins have been taken over by the ... next generation, in which the founder has mastered the experience of so many years and his little hand. Combining traditional and modern elements in its aesthetics, it stands out for decades for its juicy and delicious soutzoukaki and of course its ... famous round, which are perfectly accompanied by homemade potatoes, handmade Russian and exuberant fresh salads, all from fresh . There is not a single person from Thessaloniki who has not passed through here and has not left with the best impressions for the quality, the filling dishes and the excellent prices. Plus the updated wine cellar of mainly Greek wines. As for the service, ... its high level you will find out yourself! Beautifully decorated space, suitable to feel intimacy from the first moment. The specialties of Diavasi are the soutzoukaki and the gyros, while it has a great variety of grilled meats of the hour. Accompany them with freshly cut french fries, eggplant salad or Russian, as well as with your favorite wine or drink, since you will definitely find it through the large wine cellar.</p>
                <div class="row">
                    <div class="info-col">
                        <img src="images/diavasi-1.jpg" alt="" style="object-fit: cover;">                   
                    </div>
                    
                    <div class="info-col">
                        <img src="images/image2.jpg" alt="">
                    </div>

                    <div class="info-col">
                    <img src="images/diavasi-2.jpg" alt="" style="object-fit: cover;">                   
                    </div>
                </div>
        </section>

        <!----------CONTACT------------>
        <section class="contact">
            <section class="cards-area" id="contact-section">
                <h1>Location and Contact</h1>
                        <div class="contact-col">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12112.08614860259!2d22.947726!3d40.629407!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48a806ff0ab3b407!2sAFES%20CHANTAKI%20O.E.%7C%7CDIAVASI%201977!5e0!3m2!1sen!2sgr!4v1639141869970!5m2!1sen!2sgr" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                    
                                <p><i class="fas fa-map-marker-alt " style="color: #000;"></i><a href="https://goo.gl/maps/sUrVfhtbSKUC9ACv5" target="_blanc"> P. Mela 13, Thessaloniki 546 22</a><br><br> </p>
                                <i class="fas fa-phone " style="color: #000; transform: rotateY(180deg);"></i><a href="tel:+30 +30 2310220596"> +30 2310 220596</a><br><br> 
                                <i class="fas fa-envelope " style="color: #000;"></i><a href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJTDGxfFzQsZtKhxbJMVWmmfshqTHqGsmkXZfgKTTXMfgxkhnxvbSscRDXpggXlDhRtb"> diavasi1977@gmail.com</a>
                        </div>
                </section> 
            </section>
        </section>
        <br>
        <!-------RATING-------->
        <h1>Rate us</h1>
        <div align="center" style="background-color: rgb(17, 17, 17); padding: 50px; color:white;">
            <i class="fa fa-star fa-2x" data-index="0"></i>
            <i class="fa fa-star fa-2x" data-index="1"></i>
            <i class="fa fa-star fa-2x" data-index="2"></i>
            <i class="fa fa-star fa-2x" data-index="3"></i>
            <i class="fa fa-star fa-2x" data-index="4"></i>
            <br><br>
            <p>Rating</p><?php echo round($avg,2) ?>
        </div>

        <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script>   
            var ratedIndex = -1, uID = 0;

            $(document).ready(function () {
                resetStarColors();

                if (localStorage.getItem('ratedIndex') != null) {
                    setStars(parseInt(localStorage.getItem('ratedIndex')));
                    uID = localStorage.getItem('uID');
                }

                $('.fa-star').on('click', function () {
                ratedIndex = parseInt($(this).data('index'));
                localStorage.setItem('ratedIndex', ratedIndex);
                saveToTheDB();
                });

                $('.fa-star').mouseover(function () {
                    resetStarColors();
                    var currentIndex = parseInt($(this).data('index'));
                    setStars(currentIndex);
                });

                $('.fa-star').mouseleave(function () {
                    resetStarColors();

                    if (ratedIndex != -1)
                        setStars(ratedIndex);
                });
            });

            function saveToTheDB() {
                $.ajax({
                url: "index.php",
                method: "POST",
                dataType: 'json',
                data: {
                    save: 1,
                    uID: uID,
                    ratedIndex: ratedIndex
                }, success: function (r) {
                        uID = r.id;
                        localStorage.setItem('uID', uID);
                }
                });
            }

            function setStars(max) {
                for (var i=0; i <= max; i++)
                    $('.fa-star:eq('+i+')').css('color', 'gold');
            }

            function resetStarColors() {
                $('.fa-star').css('color', 'white');
            }

            const btn = document.querySelector("button");
            const post = document.querySelector(".post");
            const widget = document.querySelector(".star-widget");
            const editBtn = document.querySelector(".edit");
            btn.onclick = ()=>{
            widget.style.display = "none";
            post.style.display = "block";
            editBtn.onclick = ()=>{
                widget.style.display = "block";
                post.style.display = "none";
            }
            return false;
        }
        </script>
        
        <?php require_once 'footer.php'; ?>

        <a href="#" class="topBtn"><i class="fas fa-chevron-up"></i></a>
        
        <!---------JavaScript--------->
        <script src="JavaScript.js"></script>
    </body>
</html>