<style type="text/css">
.body-dashboard {
	height: 768px;
    overflow: auto;
    /*background-image: url(<?//=base_url('assets/images/background3.jpg')?>);*/
    background-size: cover;
}
.chart-container {
    float: left;
}

#gear1
{
    height: 300px;
    width: 300px;
    position: absolute;
    top: 50px;
    left: 17px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    /*cross browser transform*/
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    /*calling cross browser animation*/
    animation: rotation 10s linear infinite normal;
    -webkit-animation: rotation 10s linear infinite normal;
    -moz-animation: rotation 10s linear infinite normal;
}

#progress1
{
    /*height: 300px;
    width: 300px;*/
    z-index: 1000;
    position: absolute;
    top: 113px;
    left: 81px;
}

#progress2
{
    /*height: 300px;
    width: 300px;*/
    z-index: 1000;
    position: absolute;
    top: 123px;
    left: 92px;
}

#progress3
{
    /*height: 300px;
    width: 300px;*/
    z-index: 1000;
    position: absolute;
    top: 107px;
    left: 75px;
}

#gear2
{
    height: 300px;
    width: 300px;
    position: absolute;
    top: 295px;
    left: 138px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    /*cross browser transform*/
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    /*calling cross browser animation*/
    animation: rotation 10s linear infinite reverse;
    -webkit-animation: rotation 10s linear infinite reverse;
    -moz-animation: rotation 10s linear infinite reverse;
}

#gear3
{
    height: 300px;
    width: 300px;
    position: absolute;
    top: 249px;
    left: 410px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    /*cross browser transform*/
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    /*calling cross browser animation*/
    animation: rotation 10s linear infinite normal;
    -webkit-animation: rotation 10s linear infinite normal;
    -moz-animation: rotation 10s linear infinite normal;
}

/*cross browser animation */
@keyframes rotation { 100%{transform: rotate(360deg);} }
@-moz-keyframes rotation { 100%{-moz-transform: rotate(360deg);} }
@-webkit-keyframes rotation { 100%{-webkit-transform: rotate(360deg);} }	
</style>