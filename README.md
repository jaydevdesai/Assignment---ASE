# Assignment---ASE
The repositary has four files as follows:
1. config.php
2. login.php
3. welcome.php
4. saleslead.sql

The main of this proof of concept is to show the proper authentication done with better security. Here the password is encrypted using md5 and in the database it's encrypted format is stored instead of literally storing password. This ensures that the user's password never stored in the database but it's encrypted form by which the user's password stays safe. When user enters the password during login then it is encrypted first and then compared to  the database which also has the encrypted form of the password. Data security is one of the high risks of the system.

login email - employee@xyzcompany.com
login password - adminis!admin

