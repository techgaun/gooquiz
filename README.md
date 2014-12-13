# GooQuiz v. 0.1

GooQuiz is a small web based tool to use as a networked googling quiz software. This tool was developed for IT Meet 2011 event organized by Kathmandu University Computer Club on Dec 4-5, 2011.

The tool allows any number of users to access the system and participate in the googling quiz. A question is given and its answer has to be given within the allocated time after using the google search engine. The person to answer the question first wins the game.

## Installation

* Copy all the files in the folder "googling" to your web folder.
* Give proper permission to the ./pages/question.php file to make it writable. (eg. chmod u+w pages/question.php)
* Open MySQL interface of your choice, create a database called googling and then import dump.sql
* Open ./lib/classes/DBConnection.php and then set the correct database server, username and password.
* Finally open ./config/config.php and set the different configurations as per your need.
* Admin panel is located at ./admin/ and if you need to access admin panel from remote computers, set the $localonly = 0.
* Finally, this tool is yet to be completed and requires little bit techie person to handle it.

Coding might be rough since I had to do it in a single night within very minimum time available. And a lot of stuffs are not user-friendly and admin-friendly. Maybe I'll extend it in the next year IT Meet event.
