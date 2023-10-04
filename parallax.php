<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="parallax_style.css">
    </head>
    <body><br><br>  
        <section>
            <!-- <img src="stars.jpg" id="stars"> -->
            <img src="moon.png" id="moon">
            <img src="mountain.png" id="mountain">
            <img src="road.png" id="road">
            <h2 id="text">Applied 2023</h2>
        </section>
        <script type="text/javascript">
            // let stars = document.getElementById("stars");
            let moon = document.getElementById("moon");
            let mountain = document.getElementById("mountain");
            let road = document.getElementById("road");
            let text = document.getElementById("text");

            window.addEventListener('scroll', function(){
                var value = window.scrollY;

                // stars.style.top = value + 0.5 + 'px';
                moon.style.left = -value * 0.5 + 'px';
                mountain.style.top = -value * 0.10 + 'px';
                road.style.top = value * 0.15 + 'px';
                text.style.left = value * 0.9 + "px";

            
            })
        </script>
    </body>
</html>

