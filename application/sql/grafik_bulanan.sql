SELECT x2.a, x1.traffic, x1.cash_traffic, x1.non_cash_traffic, x1.cash_revenue, x1.non_cash_revenue FROM		
		(SELECT YEAR(tanggal) year1, MONTH(tanggal) month1,
		    	SUM(tunai + mandiri + bri + bni + bca ) traffic,
		    	SUM(tunai) cash_traffic,
		    	SUM(mandiri + bri + bni + bca ) non_cash_traffic,
	    		SUM(rptunai) cash_revenue,
	    		SUM(rpmandiri + rpbri + rpbni + rpbca) non_cash_revenue
    		FROM eoj
			WHERE 1 = 1
			AND YEAR(tanggal)='2018'
			GROUP BY year1, month1
			ORDER BY month1) x1
		RIGHT JOIN
		(
		SELECT 1 a UNION SELECT 2 UNION SELECT 3
		UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7
		UNION SELECT 8 UNION SELECT 9 UNION SELECT 10  UNION SELECT 11 UNION SELECT 12
		) x2 ON x2.a = x1.month1