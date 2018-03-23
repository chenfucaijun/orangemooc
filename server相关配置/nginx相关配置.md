# Mac环境下的nginx https配置
* [创建ssl自签发证书](https://devcenter.heroku.com/articles/ssl-certificate-self#generate-private-key-and-certificate-signing-request)

    ```
       brew install openssl
       openssl genrsa -des3 -passout pass:x -out server.pass.key 2048
       openssl rsa -passin pass:x -in server.pass.key -out server.key
       rm server.pass.key
       openssl req -new -key server.key -out server.csr
       #创建完毕后，生成的server.crt和server.key放到nginx目录下

    ```
* nginx配置文件1:/usr/local/etc/nginx/conf.d/mooc.app
```$xslt
    listen 443;
    server_name mooe.com www.mooe.com;
    ssl                  on;
    ssl_certificate      server.crt;
    ssl_certificate_key  server.key;
    ssl_session_timeout  5m;
    ssl_protocols  SSLv2 SSLv3 TLSv1;
    ssl_ciphers  HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers   on;
    error_log /var/log/nginx/mooeapp/mooe_error.log;
    access_log /var/log/nginx/mooeapp/mooe_access.log main;
    root /Users/chenlei/codes/orangemooc/laravel54/public;

```   

* nginx配置文件2:/usr/local/etc/nginx/sites-enabled/mooc.conf


```$xslt
    
    server
    {
        include conf.d/mooe.app; 
    
        location / {
            root /Users/chenlei/codes/orangemooc/laravel54/public;
    	index  index.html index.htm index.php;
            try_files $uri $uri/ /index.php?$query_string;
        }
    #    Prevent any potentially-executable files in the uploads directory from
    #    being executed by forcing their MIME type to text/plain
        location ~ ^/(img|upload*)/.*.(html|htm|shtml|php)$ {
            types { }
            default_type text/plain;
        }
        location ~ \.php$ {
            root /Users/chenlei/codes/orangemooc/laravel54/public;
    	include fastcgi_params;
            fastcgi_pass    127.0.0.1:9000;
    	fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
    
        }
    # 临时节约磁盘空间的设置
        location ~* ^.+.(jpg|jpeg|gif|css|png|js|ico|xml)$ {
            access_log        off;
            expires           30d;
        }
    # Block access to data folders
        location ~ /(data|conf|bin|inc)/ {
            deny all;
        }
    
    # Block access to sensitive files
        location ~* \.(bak|swp|swo|txt|config|conf|DS_Store|inc)$ {
            deny all;
        }
    
    # Protect Perl/CGI/etc files
        location ~* \.(pl|cgi|py|sh|lua)$ 
        {
            return 444;
        }
    
    # Block access to all dot files
        location ~ /\. {
            deny  all;
        }
        location = /robots.txt  { access_log off; log_not_found off; }
        location = /favicon.ico { access_log off; log_not_found off; }  
    }

```    
 
* nginx配置文件3：/usr/local/etc/nginx/nginx.conf

```$xslt
user  _www;
worker_processes  1;

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

    #access_log  logs/access.log  main;

    sendfile        on;
    #tcp_nopush     on;

    #keepalive_timeout  0;
    keepalive_timeout  65;



    include /usr/local/etc/nginx/conf.d/*.conf;
    include /usr/local/etc/nginx/sites-enabled/*;
}
```