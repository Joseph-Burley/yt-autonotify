#start from the latest php image
FROM php:latest

#copy www folder
COPY www/ /www

#install sqlite3
RUN apt-get update && apt-get install -y sqlite3

#run php and export port 80
CMD ["php", "-S", "0.0.0.0:80", "-t", "/www"]
