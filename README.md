# WebFinalProject

#The final project was to create an site of our choice using any of the tools we learned in the course.
#
#I chose to an Angular front end with a PHP/MySQL Database backend. I looked briefly at the PHP framework Slim that builds RESTful API but given time constraint, I didn’t use it. Instead I hand coded the PHP to connect with the Database and provide JSON objects to Angular.
#
#I did a Imperial Command website. (I’m a huge Star Wars fan) There is a section for external news, which pulls information from a google feed.
#
#The internal news and personnel management sections both have the same backend mechanisms.  Angular makes an AJAX call to a php page that pulls information from the DB and returns the JSON object. For pages that have to update the database, Angular makes an AJAX and passes the information to a PHP page with the information in the query string.
