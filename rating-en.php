 <!-------RATING-------->
 <h1>Rate us</h1>
        <div align="center" style="background-color: rgb(17, 17, 17); padding: 50px; color:white;">
            <i class="fa fa-star fa-2x" data-index="0"></i>
            <i class="fa fa-star fa-2x" data-index="1"></i>
            <i class="fa fa-star fa-2x" data-index="2"></i>
            <i class="fa fa-star fa-2x" data-index="3"></i>
            <i class="fa fa-star fa-2x" data-index="4"></i>
            <br><br>
            <p>Rate</p><?php echo round($avg,2) ?>
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

            const btn=document.querySelector(".button");
            const post=document.querySelector(".post");
            const widget=document.querySelector(".star-widget");
            const editBtn=document.querySelector(".edit");
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