<style type="text/css">
.body-dashboard {
	/*margin-top: 20px;*/
}
.chart-container {
    /*float: left;*/
    padding: 1em 1em;
    /*z-index: 1000;*/
}
#loader-wrapper {
        position: relative;
        height:160px;
        z-index: 15;
        /*overflow: hidden;*/
    }

    .loader {
        width: 150px;
        height: 150px;
        border: 1px #fff solid;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
    }

    .loader .loading_A {
        font-size: 10px;
        position: absolute;
        width: 100%;
        text-align: center;
        line-height: 14px;
        font-family: 'Century Gothic', sans-serif;
        font-style: italic;
        left: 0;
        top: 50%;
        margin-top: 20px;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
    }

    .loader .loading_B {
        font-size: 10px;
        position: absolute;
        width: 100%;
        text-align: center;
        line-height: 14px;
        font-family: 'Century Gothic', sans-serif;
        font-style: italic;
        left: 0;
        top: 50%;
        margin-top: 20px;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
    }

    .loader-circle-1 {
        width: 138px;
        height: 138px;
        left: 5px;
        top: 5px;
        border: 1px #fff solid;
        border-radius: 50%;
        position: absolute;
        border-right-color: transparent;
        -webkit-animation: spin 3s linear infinite;
        animation: spin 3s linear infinite;
    }

    .loader-circle-2 {
        width: 126px;
        height: 126px;
        left: 5px;
        top: 5px;
        border: 1px transparent solid;
        border-radius: 50%;
        position: absolute;
        border-right-color: #e81512;
        -webkit-animation: spin 5s linear infinite;
        animation: spin 5s linear infinite;
    }

    .loader .line {
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
    }

    .loader .line:nth-child(1) {
        left: 16px;
        top: 50%;
        margin-top: -1px;
    }

    .loader .line:nth-child(2) {
        transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        left: 33px;
        top: 33px;
    }

    .loader .line:nth-child(3) {
        top: 16px;
        left: 55%;
        width: 2px;
        height: 10px;
        transform: rotate(190deg);
        -moz-transform: rotate(190deg);
        -webkit-transform: rotate(190deg);
        -ms-transform: rotate(190deg);
    }

    .loader .line:nth-child(4) {
        transform: rotate(150deg);
        -moz-transform: rotate(150deg);
        -webkit-transform: rotate(150deg);
        -ms-transform: rotate(150deg);
        right: 21px;
        top: 45px;
    }

    .loader .line:nth-child(5) {
        right: 16px;
        top: 63%;
        /*margin-top: -1px;*/
        transform: rotate(22.5deg);
	    -moz-transform: rotate(22.5deg);
	    -webkit-transform: rotate(22.5deg);
	    -ms-transform: rotate(22.5deg);
    }

    .loader .line:nth-child(6) {
        transform: rotate(66deg);
        -moz-transform: rotate(66deg);
        -webkit-transform: rotate(66deg);
        -ms-transform: rotate(66deg);
        right: 50px;
        bottom: 18px;
        background: #e81512;
    }

    .loader .subline {
        position: absolute;
        width: 3px;
        height: 2px;
        background: #fff;
    }

    .loader .subline:nth-child(7) {
        transform: rotate(22.5deg);
        -moz-transform: rotate(22.5deg);
        -webkit-transform: rotate(22.5deg);
        -ms-transform: rotate(22.5deg);
        left: 21px;
        top: 50px;
    }

    .loader .subline:nth-child(8) {
        transform: rotate(67.5deg);
        -moz-transform: rotate(67.5deg);
        -webkit-transform: rotate(67.5deg);
        -ms-transform: rotate(67.5deg);
        left: 57px;
        top: 18px;
    }

    .loader .subline:nth-child(9) {
        transform: rotate(112.5deg);
        -moz-transform: rotate(112.5deg);
        -webkit-transform: rotate(112.5deg);
        -ms-transform: rotate(112.5deg);
        right: 39px;
        top: 25px;
    }

    .loader .subline:nth-child(10) {
        transform: rotate(178deg);
        -moz-transform: rotate(178deg);
        -webkit-transform: rotate(178deg);
        -ms-transform: rotate(178deg);
        right: 15px;
        top: 68px;
    }

    .loader .subline:nth-child(11) {
        transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        right: 33px;
        bottom: 33px;
        background: #e81512;
    }

    .loader .needle_A {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        border: 1px #fff solid;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -8px 0 0 -8px;
        z-index: 1;
        transform: rotate(0deg); 
    }

    .loader .needle_A:before {
        content: "";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 3.5px 50px 3.5px 0;
        border-color: transparent #e81512 transparent transparent;
        position: absolute;
        right: 50%;
        top: 50%;
        margin: -3.5px 0 0 0;
        border-radius: 0 50% 50% 0;
    }

    .loader .needle_B {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        border: 1px #fff solid;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -8px 0 0 -8px;
        z-index: 1;
        transform: rotate(0deg); 
    }

    .loader .needle_B:before {
        content: "";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 3.5px 50px 3.5px 0;
        border-color: transparent #e81512 transparent transparent;
        position: absolute;
        right: 50%;
        top: 50%;
        margin: -3.5px 0 0 0;
        border-radius: 0 50% 50% 0;
    }

    @keyframes pegIt {
        0% {
            transform: rotate(0deg);
        }
        70% {
            transform: rotate(155deg);
        }
        90% {
            transform: rotate(140deg);
        }
        100% {
            transform: rotate(150deg);
        }
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .background{
        position: absolute;
        width:160px;
        height:155px;
        left: 50%;
        top: 50%;
        margin: -79px 0 0 -80px;
    }

</style>