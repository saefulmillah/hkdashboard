<style type="text/css">
.body-dashboard {
	/*margin-top: 20px;*/
}
.chart-container {
    float: left;
    padding: 1em 1em;
}

#chart2
{
    /*height: 300px;
    width: 300px;*/
    z-index: 1000;
    position: absolute;
    top: 21.94rem;
    left: 6.1rem;
}

#progress1
{
    /*height: 300px;
    width: 300px;*/
    z-index: 1000;
    position: absolute;
    top: 124px;
    left: 142px;
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
    z-index: -1;
    position: absolute;
    top: 114px;
    left: 132px;
}

#progress4
{
    /*height: 300px;
    width: 300px;*/
    z-index: 1000;
    position: absolute;
    top: 401px;
    left: 274px;
}

#gear1
{
    height: 350px;
    width: 350px;
    position: absolute;
    top: 48px;
    left: 67px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    /*cross browser transform*/
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    /*calling cross browser animation*/
    animation: rotation 40s linear infinite normal;
    -webkit-animation: rotation 40s linear infinite normal;
    -moz-animation: rotation 40s linear infinite normal;
}

#gear2
{
    height: 350px;
    width: 350px;
    position: absolute;
    top: 335px;
    left: 209px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    /*cross browser transform*/
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    /*calling cross browser animation*/
    animation: rotation 40s linear infinite reverse;
    -webkit-animation: rotation 40s linear infinite reverse;
    -moz-animation: rotation 40s linear infinite reverse;
}

#gear3
{
    height: 350px;
    width: 350px;
    position: absolute;
    top: 189px;
    left: 495px;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    /*cross browser transform*/
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    /*calling cross browser animation*/
    animation: rotation 40s linear infinite normal;
    -webkit-animation: rotation 40s linear infinite normal;
    -moz-animation: rotation 40s linear infinite normal;
}

/*cross browser animation */
@keyframes rotation { 100%{transform: rotate(360deg);} }
@-moz-keyframes rotation { 100%{-moz-transform: rotate(360deg);} }
@-webkit-keyframes rotation { 100%{-webkit-transform: rotate(360deg);} }	
</style>