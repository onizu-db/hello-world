begin; 
update categories set sort = sort + 1 where parent_id = <category id> and sort >= <position to insert at>; 
insert into categories (name, sort, parent_id) values ('my new category', <position to insert at>, category_id); 
commit;

UPDATE `boq_categories` SET categID = CHAR(ASCII(categID) + 1) WHERE categID > "D" ORDER BY categID DESC

// insert sequential numbers in a column:
SELECT @i:=0;
UPDATE yourTable SET yourField = @i:=@i+1;

