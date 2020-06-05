// Create unique index for multiple columns
$sql = 'CREATE UNIQUE INDEX item_rateGroup ON boq_rate (`itemID`, `rateGroupID`)';

// insert before a row and reconfigure sort
begin; 
update categories set sort = sort + 1 where parent_id = <category id> and sort >= <position to insert at>; 
insert into categories (name, sort, parent_id) values ('my new category', <position to insert at>, category_id); 
commit;

UPDATE `boq_categories` SET categID = CHAR(ASCII(categID) + 1) WHERE categID > "D" ORDER BY categID DESC

// insert sequential numbers in a column:
SELECT @i:=0;
UPDATE yourTable SET yourField = @i:=@i+1;

// (same result as above, using 'window function') Add values equal to the corresponding row-number in the new column `qtySubGroupSort`:
UPDATE `boq_qtysubgroup` AS t1 JOIN (SELECT qtySubGroupID, row_number() over(ORDER BY qtyGroupID) as rowNum FROM `boq_qtysubgroup`) AS t2 ON t1.qtySubGroupID = t2.qtySubGroupID SET t1.qtySubGroupSort = t2.rowNum 

// add with sort value = 1 + highest in table:
UPDATE `boq_rategroup` set rateGroupSort = (SELECT max(rateGroupSort) FROM `boq_rategroup`) + 1 WHERE rateGroupSort = 0
INSERT INTO `boq_rategroup` ($rateGroupSort, $rateGroupID, $rateGroupTitle) VALUES (SELECT max(rateGroupSort) + 1,  'title');

// Add values equal to the corresponding row-number in the new column `qtySubGroupSort`:
UPDATE `boq_qtysubgroup` AS t1 JOIN (SELECT qtySubGroupID, row_number() over(ORDER BY qtyGroupID) as rowNum FROM `boq_qtysubgroup`) AS t2 ON t1.qtySubGroupID = t2.qtySubGroupID SET t1.qtySubGroupSort = t2.rowNum 

