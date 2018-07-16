SELECT 
	Gerbang, 
	COUNT(id) AS Total_lalin,
	SUM(Rupiah) AS Total_Rupiah
FROM lalin
GROUP BY Gerbang