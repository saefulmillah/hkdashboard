	SELECT * FROM
	    (
	    	SELECT nogerbang, gerbang,  
	            SUM(CASE WHEN metoda = 'ALR' THEN 1 ELSE 0 END) sum_alr,
	            SUM(CASE WHEN metoda = 'LSB' THEN 1 ELSE 0 END) sum_lsb
	        FROM lalin WHERE waktu >= 
	    	(
	    		SELECT 
	    		CASE 
	    		  WHEN (CAST(HOUR(NOW()) AS SIGNED) >= 7)  THEN DATE_ADD(CURRENT_DATE(),INTERVAL 7 HOUR)
	    		  ELSE DATE_ADD(DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY),INTERVAL 7 HOUR) 
	    		  END start_time
	    	) 
	    	GROUP BY nogerbang, gerbang
	        ORDER BY gerbang
	    ) x3
