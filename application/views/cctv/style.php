<style type="text/css">
@keyframes blink {
    0% { 
    	-webkit-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		-moz-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		box-shadow: 0px 0px 74px 15px rgba(252,8,8,1); 
	}
    50% { box-shadow: none; }
    100% { 
    	-webkit-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		-moz-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		box-shadow: 0px 0px 74px 15px rgba(252,8,8,1); 
	}
}

@-webkit-keyframes blink {
    0% { 
    	-webkit-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		-moz-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		box-shadow: 0px 0px 74px 15px rgba(252,8,8,1); 
	}
    50% { box-shadow: none; }
    100% { 
    	-webkit-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		-moz-box-shadow: 0px 0px 74px 15px rgba(252,8,8,1);
		box-shadow: 0px 0px 74px 15px rgba(252,8,8,1); 
	}
}

.blink {
	z-index: 1000;
    -webkit-animation: blink 1.0s linear infinite;
    -moz-animation: blink 1.0s linear infinite;
    -ms-animation: blink 1.0s linear infinite;
    -o-animation: blink 1.0s linear infinite;
    animation: blink 1.0s linear infinite;
}
</style>