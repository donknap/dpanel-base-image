# 镜像仓库

https://hub.docker.com/r/dpanel/base-image

> 国内镜像 ccr.ccs.tencentyun.com/dpanel/base-image

## Php 

支持 php7.2 php7.4 php8.1

### 目录

- 默认网站目录: /app/wwwroot, 上传或是 COPY 代码到此目录即可正常运行
- 默认网站 nginx 配置: /app/nginx/http.d/default.conf, 扩展配置或是增加重写规则
- nginx 的扩展配置：/app/nginx/conf.d/ 

### 支持扩展

Core, date, libxml, pcre, zlib, filter, hash, readline, Reflection, SPL, session, cgi-fcgi, bcmath, bz2, ctype, curl, dom, fileinfo, ftp, gd, gettext, iconv, json, mbstring, openssl, pcntl, PDO, posix, standard, SimpleXML, sockets, sodium, sysvmsg, sysvsem, sysvshm, tokenizer, xml, xmlwriter, zip, exif, mysqlnd, pdo_sqlite, Phar, xmlreader, xsl, mysqli, pdo_mysql, igbinary, mcrypt, memcached, redis, swoole, yaml, apcu, imagick, Zend OPcache 

## Node

支持 12 14 16 18

### 目录

- 应用目录：/app

### 启动命令

通过修改 RUN_COMMAND 配置启动命令

## Java 

支持 8 11 12

### 目录

- 应用目录：/app

### 启动命令

通过修改 RUN_COMMAND 配置启动命令
