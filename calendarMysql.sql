-- create calendar_table
create table calendar_table 
( 
 dt date not null primary key, 
 year smallint null, 
 quarter tinyint null, 
 month tinyint null, 
 day tinyint null, 
 day_of_week tinyint null, 
 month_name varchar(9) null, 
 day_name varchar(9) null, 
 week tinyint null, 
 is_weekday binary(1) null, 
 is_holiday binary(1) null, 
 );
-- create ints table
create table ints ( i tinyint );
-- load data into ints table
insert into ints values (0),(1),(2),(3),(4),(5),(6),(7),(8),(9);

-- load date data into calendar table
-- you can change the starting date
insert into calendar_table (dt) 
select date(‘2018–01–01’) + interval a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i day from ints a join ints b join ints c join ints d join ints e 
where (a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i) <= 11322 order by 1;


-- load other columns in date data of calendar table
update calendar_table set 
is_weekday = case when dayofweek(dt) in (1,7) then 0 else 1 end, 
is_holiday = 0, 
year = year(dt), 
quarter = quarter(dt), 
month = month(dt), 
day = dayofmonth(dt), 
day_of_week = dayofweek(dt), 
month_name = monthname(dt), 
day_name = dayname(dt), 
week = week(dt);
