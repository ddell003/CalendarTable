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
### The SQL to create a calendar table
https://github.com/ddell003/CalendarTable/blob/master/calendarMysql.sql

### The Laravel Migration
https://github.com/ddell003/CalendarTable/blob/master/CalendarTableMigration.php

## End Results
![alt text](https://lh3.googleusercontent.com/SPmd7zGqFvw3-fGpg_YBSgEYapshCVpnryeyoC2ClTXV8LqCiGT-BrkeK2neO7-PO-tGlf61w-V0quwKSP1RV5pPZI9WGzZiJ9l04HIl6YQA3as9l1b3D1lktpW1NFCi_Y1O6lB0rZoIg3v_9flCdGTcJe2p3wighE-onPTRkDDgOddWS56b5mmO0xfZFbLXhm-dcnPvMMpdVqv8HRD2xST7h4dMRKSjsGMTbJmG6_kUvQHPwakRXOL1N1VYBK0Z08zsPzl7l3OD_1wtkAeCqNAriuynX0NpF-s7IPx_cVxVLSyJ_BX0Phofsiqm5S_QqjH7igbt_0nP24wugrrWXiAO8bsRkQIdf7ldTMgp2yXHOjWD8bCAMNc_0ORI56Xbo-RRw226RMPY8gtnEIhAHGbEjanBYpIAAsfOibhrNm_E8GrWKIIzQXm4ne5AWwAB0QLVlikaAI3eg677VSSO-Y4uz_t-xp3X__FDjerAnrQzrvG7wWPYR-O5zzDl149gjzY4o1IwrcwL-iW7QVv34pOQjdGY9lpScz0M_M4i4VPpMgS5NNKQZVBwJSiiCJSsEjc51my9KP6q0VfhbtNwsyksE_UzRjBAeohYwA7cgloTFHwC5Hsm_BXjo0DW1IrpWLjwc2aPKdmPhqE28z4MEXjKvqcq13OtnRQTK3K5J4vdW7O6uvW5Ag=w725-h209-no)
