Assignment : 19th June 2022
 ----------
 ----------
 <h2>Deadline : 20th June 2022</h2>
 
 <h1> Getting Started With Xaamp ,Php</h1>

## What is XAMPP?
XAMPP is an abbreviation where X stands for Cross-Platform, A stands for Apache, M stands for MYSQL, and the Ps stand for PHP and Perl, respectively. It is an open-source package of web solutions that includes Apache distribution for many servers and command-line executables along with modules such as Apache server, MariaDB, PHP, and Perl.

XAMPP helps a local host or server to test its website and clients via computers and laptops before releasing it to the main server. It is a platform that furnishes a suitable environment to test and verify the working of projects based on Apache, Perl, MySQL database, and PHP through the system of the host itself. Among these technologies, Perl is a programming language used for web development, PHP is a backend scripting language, and MariaDB is the most vividly used database developed by MySQL. The detailed description of these components is given below.

## What is: Apache
Apache is the most widely used webserver software and runs on 67% of all websites in the world. Developed and maintained by Apache Software Foundation, Apache is open source software and available for free.

It’s fast, reliable, and secure. And Apache can be highly customized to meet the needs of many different environments by using extensions and modules.

## What is Virtual Host?
An Apache web server can host multiple websites on the SAME server. You do not need separate server machine and apache software for each website. This can achieved using the concept of Virtual Host or VHost.

Any domain that you want to host on your web server will have a separate entry in apache configuration file.

##Virtual host setup:
 >Open Apache > conf >extra >httpd-vhosts.conf in notepad (run as administrator) or directly in Visual Studio Code.
 >Then add:
   ``` <VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs\folder location"
    ServerName name.local
   </VirtualHost>
   ```
 > Then save.

>Then open C:\Windows\System32\drivers\etc\hosts in notepad/ VS Code.
> Add 127.0.01 name.local
> Then you are ready to go:search localhost/location of your directory.



