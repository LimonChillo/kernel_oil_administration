# GRUNDFUNKTIONEN

# Auflistung aller Sorten-IDs
SELECT s.ID
	FROM strain s;

# Check ob Flaschen vorhanden
SELECT b.amout 
	FROM bottle b
	WHERE b.ID = ?;

# Check ob Etiketten vorhanden
SELECT l.amount
	FROM label l JOIN bottle b JOIN strain strain
	ON l.bottleFK = b.ID AND l.strainFK = s.ID
	WHERE b.ID = ? AND s.ID = ?;

#########################################################################

# Auflistung aller Fässer nach Sorten, mit  Füllangabe (Sorten-Name aus Grundfunktion)
SELECT count(*) as count, b.fillLevel as fillLevel
	FROM barrel b JOIN strain s
	ON b.strainFK = s.ID
	WHERE s.ID = ? #Trennung im Frontend?
	ORDER BY s.name;

# Auflistung aller im Lager enthaltenen Produkte (Sorten-Name aus Grundfunktion)
SELECT p.amount as amount
	FROM product p JOIN strain s JOIN bottle b
	ON p.bottleFK = b.ID AND p.strainFK = s.ID
	WHERE s.ID = ? and b.ID = ? #Trennung im Frontend?
	ORDER BY s.name;

# Auflistung der Produktion eines Tages (Sorten-Name aus Grundfunktion)
	# Ergebnis = pro Tag
SELECT SUM(bo.amount) as amount GROUP BY bo.date
	FROM bottling bo JOIN pressing p JOIN strain s JOIN bottle b
	ON bo.strainFK = s.ID AND bo.pressingFK = pressing.ID AND bo.bottleFK = b.ID
	WHERE bo.date = ? 
	AND s.ID = ? AND b.ID = ? # Trennung im Frontend? 
	ORDER BY s.name,;

# Auflistung des Verkaufs eines Tages
	# Ergebnis = pro Tag
SELECT SUM(sh.amount) as amount GROUP BY sh.date
	FROM product p JOIN strain s JOIN bottle b JOIN shipmentitem shi JOIN shipment sh
	ON p.bottleFK = b.ID AND p.strainFK = s.ID AND shi.productFK = p.ID AND shi.shipmentFK = sh.ID
	WHERE sh.date = ? 
	AND s.ID = ? AND b.ID = ? # Trennung im Frontend? 
	ORDER BY s.name;

# Auflistung aller Verkäufe an einen Kunden, sortiert nach Tagen
SELECT SUM(sh.amount) as amount, sh.date as date GROUP BY sh.date
	FROM product p JOIN strain s JOIN bottle b JOIN shipmentitem shi JOIN shipment sh JOIN customer c
	ON p.bottleFK = b.ID AND p.strainFK = s.ID AND shi.productFK = p.ID AND shi.shipmentFK = sh.ID AND sh.customerFK = c.ID
	WHERE c.ID = ? 
	AND s.ID = ? AND b.ID = ? # Trennung im Frontend?  
	ORDER BY sh.date;