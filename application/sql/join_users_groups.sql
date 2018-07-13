SELECT u.`id` AS user_id, ug.`group_id`, u.`username`,u.`first_name`, g.`name` 
FROM ion_users u 
INNER JOIN ion_users_groups ug ON u.`id`=ug.`user_id` 
INNER JOIN ion_groups g ON g.`id`=ug.`group_id`
WHERE user_id=2




