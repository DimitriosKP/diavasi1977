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
        <title>Διάβαση 1977</title>
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
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="index.php">Αρχική</a></li>
                        <li><a href="menu.php">Μενού</a></li>
                        <li><a href="#info-section">Σχετικά με μας</a></li>
                        <li><a href="#contact-section">Επικοινωνία</a></li>
                        <li><a href="index-en.php" language='english'>EN</a></li>
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

        <!----------INFO------------>
        <div class="info">
            <section class="cards-area" id="info-section">
                <h1>Ποιοί είμαστε</h1>
                <p class="text-justify">Μια από τις καθιερωµένες αξίες για καλό φαγητό στην πόλη, το εστιατόριο Διάβαση συνεχίζει από το 1977 να δηµιουργεί... πιστούς θαµώνες. Ξεκινώντας από τον Άγγελο Χαντακή, έναν από τους καλύτερους ψήστες στη Θεσσαλονίκη, master του γύρου, σήµερα τα ηνία έχει αναλάβει η... επόµενη γενιά, στην οποία ο ιδρυτής έχει µεταλαµπαδεύσει την εµπειρία τόσων χρόνων αλλά και το µεράκι του. Συνδυάζοντας παραδοσιακά και µοντέρνα στοιχεία στην αισθητική του, ξεχωρίζει εδώ και δεκαετίες για τα ζουµερά και πεντανόστιµα σουτζουκάκια του και φυσικά τον... διάσηµο γύρο του, που συνοδεύονται άψογα από σπιτικές πατάτες, χειροποίητη ρώσικη αλλά και πληθωρικές δροσερές σαλάτες, όλα από αγνές πρώτες ύλες. Δεν υπάρχει επώνυµος και µη Θεσσαλονικιός που να µην έχει περάσει από εδώ και να µην έχει φύγει µε τις καλύτερες εντυπώσεις για την ποιότητα, τις χορταστικές µερίδες και τις εξαιρετικές τιµές. Στα συν η ενηµερωµένη κάβα ελληνικών κυρίως κρασιών. Όσο για το service,... το υψηλό του επίπεδο θα το διαπιστώσετε µόνοι σας! Χώρος όμορφα διακοσμημένος, κατάλληλος για να νοιώσετε οικειότητα από την πρώτη στιγμή. Σπεσιαλιτέ της Διάβασης είναι τα σουτζουκάκια και ο γύρος, ενώ διαθέτει μεγάλη ποικιλία σε ψητά της ώρας. Συνοδέψτε τα με φρεσκοκομμένες τηγανιτές πατάτες, μελιτζανοσαλάτα ή ρώσικη, καθώς και με το αγαπημένο σας κρασί ή ποτό, αφού θα το βρείτε σίγουρα μέσα από την μεγάλη κάβα που διαθέτει.</p>
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
        <section class="contact">
            <h1>Τοποθεσία και Τρόποι Επικοινωνίας</h1>
            <div class="row">
                <div class="col-sm-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12112.08614860259!2d22.947726!3d40.629407!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x48a806ff0ab3b407!2sAFES%20CHANTAKI%20O.E.%7C%7CDIAVASI%201977!5e0!3m2!1sen!2sgr!4v1639141869970!5m2!1sen!2sgr" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                    
                        <p><i class="fas fa-map-marker-alt " style="color: #000;"></i><a href="https://goo.gl/maps/sUrVfhtbSKUC9ACv5" target="_blanc"> Παύλου Μελά 13, Θεσσαλονίκη 54622</a><br><br> </p>
                        <i class="fas fa-phone " style="color: #000; transform: rotateY(180deg);"></i><a href="tel:+30 +30 2310220596"> +30 2310 220596</a><br><br> 
                        <i class="fas fa-envelope " style="color: #000;"></i><a href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJTDGxfFzQsZtKhxbJMVWmmfshqTHqGsmkXZfgKTTXMfgxkhnxvbSscRDXpggXlDhRtb"> diavasi1977@gmail.com</a>
                </div>
            </div>
        </section>
        <br>
        <!-------RATING-------->
        <h1>Αξιολογήστε μας</h1>
        <div align="center" style="background-color: rgb(17, 17, 17); padding: 50px; color:white;">
            <i class="fa fa-star fa-2x" data-index="0"></i>
            <i class="fa fa-star fa-2x" data-index="1"></i>
            <i class="fa fa-star fa-2x" data-index="2"></i>
            <i class="fa fa-star fa-2x" data-index="3"></i>
            <i class="fa fa-star fa-2x" data-index="4"></i>
            <br><br>
            <p>Βαθμολογία</p><?php echo round($avg,2) ?>
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