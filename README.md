## Elite Solutions 
#### *Website to get reliable and clear solutions to leetcode problems*

### 💭 *But Bro Leetcode has a solution section what do you do more?* 🤔

Well your absolutely right Leetcode does have a Solution section. But ever see those solutions that look daunting with no explaination? ***Scary***. 

With Elite Solution we help to fight that problem. Each of our Solutions have a detailed explaination so that you dont have to struggle.

### 💭 *Bro I get it but I know  way better solution than what is posted on your website* 😎

Well then what are you waiting for? Hope onto our website and suggest your *Blazingly fast* code to our team.Be sure to provide a detailed solution. If we feel your solution is better your solution will be shown on the webiste

### 💭 *All that is fine but some problems that i am stuck with do not have solutions on your website* 😭

We are sorry for the inconvenience but you can send us your problem statement right from the website and we will review it and add it to our website as soon as possible

### 💭 *But Bro the solution on your website is in python i know a solution in C++ that will give some valuable tips to newcomers to handle those pesky pinters* 🧑‍🏫

We appriciate your thoughtfulness our website supports providing solutions in multiple languages(Right now its C++,python and Java) so you can write your solution in your preferred language and send us your solutions

Oh and did i mention you can use HTML or to edit your solution and make it look pretty along with having syntax highlighting? I know pretty neat

***Along with the above features we also provide an admin panel for the administrators to view the popularity of each question along with approve user sent solutions and add Requested questions. All of these in a simple and Intuitive UI. Well admins need to have their style too*** 😎

So this is all about Elite Solutions. A community driven platform to get in depth explaination to leetcode problems. Think you got good explaination with *blazingly fast* code well then hope on. We are eager to have you on board 

### 💭 *Bro your website is cool will you tell us more about the tech stack. I too wanna build a cool website with lots of features*

Well then buckle up your seatbelts and lets right dive into the technical nitty gritty. Shall we?

### <div align="center"> Made with ❤️ Using</strong> </div> 

<p align="center">
    <img src="ReadmeImages/Laravel.svg" height=100px style="margin-right:20px">
    <img src="ReadmeImages/Supabase.png" height=100px>
    <img src="https://images.viblo.asia/feecc775-82fb-4bec-9e83-0239e45d8b1b.jpg" height=100px>
</p>

* Laravel makes it easier to organize your routes using controllers and even organizing your controllers into multiple smaller controller files to keep things organized

* Laravel uses Eloquent ORM that makes it fun to work with databases. Querying databases has never been this easy and simple to use

* Dont like ORM? Well Laravel gives you the ability to ditch the ORM and raw dog your SQL so that you can write custom and complex queries to suite your needs

* Laravel's Templating Engine, Blade, is easy and simple to use yet very powerful. It combines the power of PHP with the ability to use Laravel variables inside the template. The syntax of the blade templates is exteremely simple and and easy. For instance wanna write php in midst of HTML? Well just write ```@php {{Your amazing code}} @endphp```. See? Simple and easy to use

* Want to make Complex layouts? Well blade helps you with that too. Layouts can be organized and nested to give you the control you need over the layout

* Want to make your Auth secure? Well Laravel helps you in here. You get a default users model with features like remembering the users along with a robust middleware support to customize your auth process as you want. Laravel also provides you with ```passport``` so that you can setup OAUTH2 easily

* In terms of database setup and mailing its quite simple. Just put your credentitals in the ```.env``` file and your good to go. Pretty neat. For mailing you have the option to choose multiple providers. The layout of mailing can be customized according to your liking using blade. There can be markdown or HTML inside the mail. Honestly the default template of mail itself is very good

* In this mordern era want to build microservices? Dont worry laravel has you covered. Just make controllers and setup database and your good to go. Laravel also integrates with ```React``` Seamlessly.

* Want to use GraphQL? Laravel has something for you too. Laravel Lighthouse makes it easy for you to write and test GraphQL based APIs. It even provides you with its very own playground, where you can test your own GraphQL queries easily with intuitive UI

* Supabase provides good amount of free database storage with inituitive simple and powerful UI. Supbase uses PostgreSQL databases and gives  you its own SQL editor where you can test your queries before putting them in your application.


* Nginx Configurations :
To make the laravel application run on Nginx on a windows device the following steps were followed:
1. Download nginx from the official website
2. In your PHP installation folder an exe file with name ```php-cgi.exe``` will be present. That is our cgi gateway to which nginx will pass our php files to be executed and shown. Linux equivalent is php-fpm (fast process manager)
3. Go to the ```nginx.conf``` file and place the following code in your conf file
```

#user  nobody;
worker_processes  1;

error_log /Complete Path/to/logs file in NGINX folder;
error_log  /Complete Path/to/logs file in NGINX folder/error.log  notice;
error_log  /Complete Path/to/logs file in NGINX folders/error.log  info;

#pid        logs/nginx.pid;


events {
    worker_connections  1024;
}


http {
    include       mime.types;
    default_type  application/octet-stream;

    log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
                      '$status $body_bytes_sent "$http_referer" '
                      '"$http_user_agent" "$http_x_forwarded_for"';

    access_log  /Complete Path/to/logs file in NGINX folder/access.log  main;

    sendfile        on;
    #tcp_nopush     on;

    #keepalive_timeout  0;
    keepalive_timeout  65;

    #gzip  on;

    server {
         listen 80;
    listen [::]:80;
    server_name localhost;
    root /Complete Path to Elite Solutions/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ { # We will get back on this later
        fastcgi_pass 127.0.0.1:9123;
        fastcgi_param   SCRIPT_FILENAME  $document_root$fastcgi_script_name;
	fastcgi_index  index.php;
        include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
        deny all;
    }

        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        #location ~ \.php$ {
        #    root           html;
        #    fastcgi_pass   127.0.0.1:9000;
        #    fastcgi_index  index.php;
        #    fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        #    include        fastcgi_params;
        #}

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        #location ~ /\.ht {
        #    deny  all;
        #}
    }


    # another virtual host using mix of IP-, name-, and port-based configuration
    #
    #server {
    #    listen       8000;
    #    listen       somename:8080;
    #    server_name  somename  alias  another.alias;

    #    location / {
    #        root   html;
    #        index  index.html index.htm;
    #    }
    #}


    # HTTPS server
    #
    #server {
    #    listen       443 ssl;
    #    server_name  localhost;

    #    ssl_certificate      cert.pem;
    #    ssl_certificate_key  cert.key;

    #    ssl_session_cache    shared:SSL:1m;
    #    ssl_session_timeout  5m;

    #    ssl_ciphers  HIGH:!aNULL:!MD5;
    #    ssl_prefer_server_ciphers  on;

    #    location / {
    #        root   html;
    #        index  index.html index.htm;
    #    }
    #}

}

```
4. You must have noticed we are passing our php file to ```127.0.0.1:9000```. This is where our PHP cgi will be accepting php files from Nginx to process
5. Now to set up php-cgi create the following .bat file :
```

@ECHO OFF
ECHO Starting PHP FastCGI...
set PATH=C:\Users\NarutoUchiha39\Downloads\php-8.3.7-Win32-vs16-x64;%PATH%
C:\Users\NarutoUchiha39\Downloads\php-8.3.7-Win32-vs16-x64\php-cgi.exe -b 127.0.0.1:9123-c C:\Users\NarutoUchiha39\Downloads\php-8.3.7-Win32-vs16-x64\php.ini

```

Run the bat file. Replace the paths with your installed paths. This will set up a fast cgi server at port 9000

***Note: For my case the path were not being followed and i had to figure out by error messages where to put the file (Prolly a skill issue)***

6. We are all set just go to localhost:80 and you will see the website in full glory served through Nginx 

<div align="center">
<strong>Screenshots of the website</strong> 
</div>

* Home Screen :

[HomeScreen](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/1f5eff97-6336-44c1-a1a6-3475c1ad0eaf)

* Login Screen :
![LoginScreen](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/60b7f5f4-771f-488a-bfb2-331a49d7baf7)

* Register Screen :
![RegisterScreen](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/831fd6cf-ccc9-414d-94ad-61d997204f4a)

* Solutions Table :
![SolutionTable](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/041653ae-98e5-4921-bab6-83aeb083213f)

* Soltion page in python :
  
[PyhtonSolution](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/74e0bb85-a7de-4094-976a-03172a8a3c66)

* Solution page in Java :
  
[JavaSolution.webm](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/5391905a-cf75-4209-a97b-8983ddd0c22a)

* Contact Us page:
![ContactUs](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/e8951fce-f6cc-4226-8b6f-a362d988ac47)

* Send Solution page :

[SendSolution](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/83f58c60-66d1-4658-8012-9e53c8d6096d)

* Request Problem Page : (If your requesting Leetcode problem then no need to provide description)

[Screencast_20240601_104545.webm](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/3a8543d1-d9dd-4e61-a27f-f8024aedf23c)

* Admin Panel :
![AdminPanel](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/73681f3f-28c1-43c0-90ec-86e52ad73477)

* See and edit questions :
![ViewQuestion](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/2bfaa335-0d4c-4763-8b05-08fbb08a6c4b)

* Add and Edit Questions have same UI as send solution with full support of HTML and markdown
* Check number of questions solved by each user :
![CheckProgress](https://github.com/NarutoUchiha39/EliteSolutions/assets/104666748/21120457-402e-42f8-b889-9bd0b5b9daa0)


### <div align="center">**This is all for now thank you for giving your time to read the long readme Jai Hind** 🇮🇳</div>


  











