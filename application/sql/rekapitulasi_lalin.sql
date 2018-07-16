	SELECT x1.*
		FROM
		(
			SELECT nogerbang, gerbang, nogardu,
			SUM(CASE WHEN golongan = 1 THEN rptunai + rpmandiri + rpbri + rpbni + rpbca ELSE 0 END) rp1,
			SUM(CASE WHEN golongan = 1 THEN tunai + mandiri + bri + bni + bca ELSE 0 END) lalin1,
			SUM(CASE WHEN golongan = 2 THEN rptunai + rpmandiri + rpbri + rpbni + rpbca ELSE 0 END) rp2,
			SUM(CASE WHEN golongan = 2 THEN tunai + mandiri + bri + bni + bca ELSE 0 END) lalin2,
			SUM(CASE WHEN golongan = 3 THEN rptunai + rpmandiri + rpbri + rpbni + rpbca ELSE 0 END) rp3,
			SUM(CASE WHEN golongan = 3 THEN tunai + mandiri + bri + bni + bca ELSE 0 END) lalin3,
			SUM(CASE WHEN golongan = 4 THEN rptunai + rpmandiri + rpbri + rpbni + rpbca ELSE 0 END) rp4,
			SUM(CASE WHEN golongan = 4 THEN tunai + mandiri + bri + bni + bca ELSE 0 END) lalin4,
			SUM(CASE WHEN golongan = 5 THEN rptunai + rpmandiri + rpbri + rpbni + rpbca ELSE 0 END) rp5,
			SUM(CASE WHEN golongan = 5 THEN tunai + mandiri + bri + bni + bca ELSE 0 END) lalin5,
			SUM(tunai + mandiri + bri + bni + bca) total,
			SUM(rptunai + rpmandiri + rpbri + rpbni + rpbca) rptotal
	        FROM eoj
			WHERE tanggal >= '2018-07-11T00:00:00' AND tanggal < '2018-07-12T00:00:00'
			GROUP BY nogerbang, gerbang, nogardu
			ORDER BY nogerbang, nogardu
	    ) x1;
