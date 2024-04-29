<!-- Navigation Bar -->
<nav class="nav">
        <div class="wrapper">
            <div class="logo">
                <a href="/">Dericha</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#rsvp">RSVP</a></li>
                    <li><a href="#program-flow">Program</a></li>
                    <li><a href="#reception">Contact us</a></li>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>

<!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                $('.navTrigger').removeClass('active')
                $("#mainListDiv").removeClass("show_list");
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>

<script>
    function scrollToForm() {
        document.getElementById('id').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>
