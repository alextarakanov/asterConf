#!/bin/bash

echo 'start php-cli' 
envsubst '$$IP_MYSQL $$GOIP_MYSQL_USER $$GOIP_MYSQL_PASSWORD $$GOIP_MYSQL_DATABASE $$GOIPCRONPORT $$GOIP_DOCKER_LOCALNET_IP' \
     < /usr/local/scripts/class/configGoip.template.php \
     > /usr/local/scripts/class/configGoip.php

envsubst '$$IP_MYSQL $$SMB_MYSQL_DATABASE $$SMB_MYSQL_USER $$SMB_MYSQL_PASSWORD $$GOIPCRONPORT $$XCHANGE_SCHED_UDP $$XCHANGE_PHPSVR_UDP $$XCHANGED_DOCKER_LOCALNET_IP' \
     < /usr/local/scripts/class/configScheduler.template.php \
     > /usr/local/scripts/class/configScheduler.php
       
while true ; do
	sleep 10
done