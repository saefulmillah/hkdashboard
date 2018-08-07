SELECT x1.*
	FROM
	(
			SELECT tanggal,
		    	SUM(tunai + mandiri + bri + bni + bca ) traffic,
		    	SUM(tunai) cash_traffic,
		    	SUM(mandiri + bri + bni + bca ) non_cash_traffic,
	    		SUM(rptunai) cash_revenue,
	    		SUM(rpbri + rpbni + rpbca) non_cash_revenue
			FROM eoj
    		WHERE 1 = 1
    		AND Tanggal >= '2018-01-01' AND tanggal < '2018-08-31'
    		AND DAYOFWEEK(tanggal)=1
    		AND nogardu = 1
    		AND NoGerbang = 1
    		AND Shift = 1
			GROUP BY tanggal
			ORDER BY tanggal
    ) x1