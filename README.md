# Laravel MySQL Calendar Table

A calendar table is a database table that contains an entry for every date in a specified time frame. Additional fields are also stored to allow users to quickly determine the year, month, day of week, day of month, etc. A calendar table allows for simplified queries, through eliminating a query from needing to determine this information on the fly. Instead, a query can simply reference an existing table that has predetermined the needed information .This ability is immensely useful for reporting purposes. In this article I am going to show you how to create a calendar table in MySQL and how to implement it through a Laravel migration

The calendar table I am going to create is a fairly simple calendar table with the following date parts:
## Date Parts:
* Calendar Month: The numeric representation of the month, a number from 1–12.
* Calendar Day: The numeric representation of the calendar day, a number from 1–31. The maximum value depends on the month and on whether it is a leap year.
* Calendar Year: The numeric representation of the year, such as 1979 or 2017.
* Calendar Quarter: The numeric representation of the quarter, a number from 1–4.
* Day Name: The common name for the day of the week, such as Tuesday or Saturday.
* Day of Week: The numeric representation of the day of the week, a number from 1(Sunday) through 7 (Saturday). In some countries the number 1 is used to represent Monday, though here we will use Sunday for this calculation.
* Month Name: The common name for the month, such as February or October.

To create the calendar table you can implement it through a Laravel migration or raw SQL query.
