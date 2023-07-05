# InstaGiam

# Introduction:
InstaGiam is an simple mock Instagram project for web. It allow users to perform some actions like:
- Signin or signup a users
- create, update and delete a post
- Exploring other posts or creator in the website
- Exploring post like Trending, Fresh or Categories
- Like and Unlike other people posts
- Search posts through "#"(hashtag), categories, creator, post title etc.

    
<br>
<br>

# Technology:
- plain/vanilla PHP, HTML, CSS, JS, BootStrap, MySQL

<br>
<br>

# Steps to setup the project in your computer:
## Step 1:
1. Download the respository "online-photo-gallery-app"
2. unzip the folder

## Step 2:
1. Copy and paste the folder "online-photo-gallery-app" into your web server, im using XAMPP but you use anything you want
2. If you using XAMPP:
    - Put the entire folder into folder called "htdocs"

## Step 3:
1. Start your MySQL, ProFTPD and Apache Webserver in XAMPP
2. Open your phpMyAdmin (http://localhost/phpmyadmin/) from your XAMPP server and create a database called "online-photo-gallery"
3. Import the online-photo-gallery.sql into your database
- NOTE: Below is the code to connect the phpMyAdmin MySQL databases in conn.php, if your username, password or database name is different then you have to update it in the conn.php 
    <img width="624" alt="Screenshot 2023-07-04 at 3 56 57 PM" src="https://github.com/zengkeat/Online-photo-gallery-app/assets/42499826/efce2829-f409-4c6c-81cc-7bc75c5bae5d">


## Step 4:
1. In your web browser, type "http://localhost/online-photo-gallery-app/login.php" to navigate to the InstaGiam login page, you should see something like this:
    <img width="939" alt="Screenshot 2023-07-04 at 3 55 49 PM" src="https://github.com/zengkeat/Online-photo-gallery-app/assets/42499826/ff22e65e-5428-4f3f-8e26-1abb7abbe291">

<br>
<br>
<br>


# Username and Password:
  - You can visit the database table "users" to get username and password of different users, all the passwords is set to "12345678". Or you can register your own account in the web application.
  - Some example of users' username and password: 
      - username: john snow, password: 12345678
      - username: jonny depp, password: 12345678
      - username: giam, password: 12345678 (this account is also admin, if you login with this account you can access users' detail and posts after clicking the "Admin" button in the navigation bar)
     

