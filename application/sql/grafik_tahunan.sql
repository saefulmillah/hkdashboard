	SELECT x1.*
	FROM
	(
    	SELECT x3.year, x3.traffic, x3.cash_traffic, x3.non_cash_traffic,
    		x5.rp_tunai cash_revenue, x5.rp_non_tunai non_cash_revenue
    	FROM
    	(	
			SELECT YEAR(tanggal) YEAR,
		    	SUM(tunai + mandiri + bri + bni + bca ) traffic,
		    	SUM(tunai) cash_traffic,
		    	SUM(mandiri + bri + bni + bca ) non_cash_traffic,
	    		SUM(rptunai) cash_revenue,
	    		SUM(rpmandiri + rpbri + rpbni + rpbca) non_cash_revenue
			FROM eoj
			WHERE 1 = 1
			GROUP BY YEAR
    	)x3
	   LEFT OUTER JOIN
	   (
			SELECT YEAR(tanggal) YEAR, SUM(rpbagihasiltunai) rp_tunai,
			SUM(rpbagihasiletollmandiri + rpbagihasiletollbri + rpbagihasiletollbni + 
				rpbagihasiletollbtn + rpbagihasiletollbca ) rp_non_tunai 
			FROM bagihasil 
			WHERE 1 = 1 
			GROUP BY YEAR			
   	   ) x5 ON x5.year = x3.year    		
	   ORDER BY x3.year
    ) x1