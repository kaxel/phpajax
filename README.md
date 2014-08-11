##PHP AJAX MYSQL JAVASCRIPT CSS

I wrote up these code samples as part job interview, and part portfolio. Plus it was fun to play with YUI 3, and JQuery.

Here is the original assignment:

>Task 1:
>Write a PHP script that loops over an array and inserts 100,000 rows into a database.
>
>Task 2: 
>Write a web application that:
>
>1. uses jQuery
>2. to make an Ajax request
>3. to a PHP script that  
>4. performs a SQLquery
>5. that incorporates a left outer join
>6. and returns JSON to the jQuery front-end
>7. that loads the data into an html table

and that was it. I am using nodes with YUI3 for some flair, JQuery for the selects and module support (footable and columns), and mysql on the back end. I had to set up Apache and httpd to serve the files and to support simple auth via .htaccess, and I set up MySQL on the CentOS slice that I am using with a database called 'sample'. The application does the rest, in terms of setting up the two tables that are used in the join and populating the database with the small number of retailers, as well as the 100,000 sales records that go into the 'june_sales' table.

I set up the array of retailers in PHP, and I loop through 100,000 times, with a random day in June (1-30) along with a random amount from $1.00 - $99.99 attributed to a random retailer (excepting Sears, the last one, so that the LEFT JOIN is actually meaningful).

Finally, as per the assignment, I am using JSON to push the data from PHP to the Javascript front-end.

credits:
Custom CSS, PHP, SQL and JavaScript code by Krister Axel.

CSS and JavaScript modules by:
[Jquery Columns](http://eisenbraun.github.io/columns/)
[Jquery FooTable](http://fooplugins.com/plugins/footable-jquery/)
[YUI3 Node](https://yuilibrary.com/yui/docs/node/)