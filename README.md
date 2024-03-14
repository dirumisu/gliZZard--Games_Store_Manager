This is a web application developed for a video games store called "gliZZard". As mentioned this is a web application so basically used html, css, js, bootstrap and php for develop the site. Used mongodb and mysql as databases. I included both sql query and mongodb collection in the folder named "gliZZard database" so you can import it to the project. The folder named ADBMS includes the project source files and you have to put this file inside "www" folder in your wamp server. The default path is like this--"C:\wamp64\www". After importing databases and setting up files inside wamp server, just type localhost/ADBMS and you'll see the project files. click "gliZZard_cus_login.html" file to run system accordingly.

So the system is developed for both customers and admins. Customers can register by creating ana ccount and the login using that account. After login, they can browse and buy games. Then they can proceed to payments and after a successful order completion, they can add a review about the store and then exit or go back.

There's only one admin in the system and you cant add new admins. Technically you can by altering the database files but not from the web app. After login in admin can insert,delete and update games in the store. Additionally admin can see the orders placed by customers along with the customer details and update the order status to "completed" and "pending" relatively. Also admins can see the reviews written by customers about the store.

Here I'll include admin and customer credentials for login purposes. You can get more login credentails by referring the mysql db query in the "gliZZard database" folder.

Admin--email=admin@email.com
          pw=admin

Customer--email=wick@email.com
          pw=wick
