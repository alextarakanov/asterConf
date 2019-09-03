#!/bin/bash

echo 'start goipcon' 
envsubst '$$IP_MYSQL $$GOIP_MYSQL_USER $$GOIP_MYSQL_PASSWORD $$GOIP_MYSQL_DATABASE $$GOIPCRONPORT $$GOIP_DOCKER_LOCALNET_IP' \
     < /usr/local/etc/goipcrone.template.conf \
     > /usr/local/etc/goipcrone.conf

# sleep 400000;
/usr/local/bin/goipcron /usr/local/etc/goipcrone.conf

while true ; do
    CHECK_PORT=`netstat -anu |grep $GOIPCRONPORT |wc -l`
    CHECK_PROC=`ps aux  |grep goipcron |grep -v grep |wc -l`

	if [  $CHECK_PORT -eq 0 ]; then
        kill `pidof goipcron` 
		echo "goipcron exit, try start."
		/usr/local/bin/goipcron /usr/local/etc/goipcrone.conf
         sleep 5
     elif [ $CHECK_PROC -gt 2 ]; then
        echo "goipcron too many proccess, try kill all process."
        kill `pidof goipcron`
        echo "goipcron too many proccess, try start goipcron."
		/usr/local/bin/goipcron /usr/local/etc/goipcrone.conf
        sleep 5
     else 
        date
        echo "port open, process runing";
	fi
	sleep 10
    
done