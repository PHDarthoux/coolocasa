-- Je cherche un logement
-- maison
-- Paris

SELECT
    o.*, m.* 
FROM 
    offer AS o 
LEFT JOIN 
    media AS m ON o.media_id = m.id 
WHERE
    o.roommate_offer_id IN (
        SELECT 
            ro.id 
        FROM 
            roommate_offer AS ro
        LEFT JOIN 
            lodging_type AS lt ON ro.lodging_type_id = lt.id 
        WHERE
            ro.city = "Paris" 
            AND lt.type = "maison" 
    )
; 