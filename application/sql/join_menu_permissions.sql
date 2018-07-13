SELECT g.`id` AS group_id, m.`id` AS menu_id, g.`name`, m.`title`, m.`url`, m.`parent_id`, m.`menu_order`  
FROM ion_groups_permission gp 
INNER JOIN ion_groups g ON gp.`group_id`=g.`id` 
INNER JOIN ion_menu m ON m.`id`=gp.`permission_id`
WHERE g.`id`=3
