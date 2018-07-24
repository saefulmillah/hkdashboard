SELECT Gerbang,  
	SUM(CASE WHEN Metoda LIKE 'eToll%' AND Shift = 1 THEN Rupiah ELSE 0 END) AS eToll_shift1, 
	SUM(CASE WHEN Metoda LIKE '%Tunai%' AND Shift = 1 THEN Rupiah ELSE 0 END) AS Tunai_shift1,
	SUM(CASE WHEN Metoda LIKE 'eToll%' AND Shift = 2 THEN Rupiah ELSE 0 END) AS eToll_shift2, 
	SUM(CASE WHEN Metoda LIKE '%Tunai%' AND Shift = 2 THEN Rupiah ELSE 0 END) AS Tunai_shift2,
	SUM(CASE WHEN Metoda LIKE 'eToll%' AND Shift = 3 THEN Rupiah ELSE 0 END) AS eToll_shift3, 
	SUM(CASE WHEN Metoda LIKE '%Tunai%' AND Shift = 3 THEN Rupiah ELSE 0 END) AS Tunai_shift3,
	SUM(CASE WHEN Metoda LIKE '%eToll%' THEN Rupiah ELSE 0 END) AS Total_eToll,
	SUM(CASE WHEN Metoda LIKE '%Tunai%' THEN Rupiah ELSE 0 END) AS Total_Tunai
FROM lalin
WHERE waktu >= '2018-07-15T00:00:00' AND waktu < '2018-07-16T00:00:00'
GROUP BY Gerbang