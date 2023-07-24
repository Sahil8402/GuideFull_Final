<?php include 'includes/connection.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/navbar.php';?>

</script>

        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider4">
                    <li>
                        <div class="slider-img one-img">
                            <div class="container">
                                <div class="slider-info text-left">
                                    <h5 class="text-dark">We are here to solve <br>college problems</h5>
                                    </p>
                                </div>
                                <br>
                                <button type="button" class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="../index.html">Back to Home</a></button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider-img two-img">
                            <div class="container">
                                <div class="slider-info text-left">
                                    <h5 class="text-dark">To Guide Students<br>for carrier..</h5>
                                    </p>
                                </div>
                                <br>
                                <button type="button" class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="../index.html">Back to Home</a></button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider-img three-img">
                            <div class="container">
                                <div class="slider-info text-left">
                                    <h5 class="text-dark">To Get All study<br>stuff easily</h5>
                                    </p>
                                </div>
                                <br>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="../index.html">Back to Home</a>w</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </body>
</html>
<?php include 'includes/footer.php';?>
  <!--//model-->
    <!--js working-->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!--//js working-->
    <!--blast colors change-->
    <script src="js/blast.min.js"></script>
    <!--//blast colors change-->
    <!--responsiveslides banner-->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function() {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 900,
                namespace: "callbacks",
                before: function() {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--// responsiveslides banner-->
    <!--responsive tabs-->
    <script src="js/easy-responsive-tabs.js"></script>
    <script>
        $(document).ready(function() {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <!--// responsive tabs-->
    <!--About OnScroll-Number-Increase-JavaScript -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.countup.js"></script>
    <script>
        $('.counter').countUp();
    </script>
    <!-- //OnScroll-Number-Increase-JavaScript -->
    <!-- start-smoth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset()
                }, 900);
            });
        });
    </script>
  
    <script>
        
        $(document).ready(function() {

            var defaults = {
                containerID: 'toTop', 
                containerHoverID: 'toTopHover', 
                scrollSpeed: 1200,
                easingType: 'linear'
            };


            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
        
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>




        