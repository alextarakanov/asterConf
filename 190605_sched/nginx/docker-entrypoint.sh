#!/bin/sh

envsubst '$$NGINX_HOST $$PHP_NAME $$NGINX_PORT_GOIP_IN $$NGINX_PORT_SMB_IN $$NGINX_PORT_CDR_IN $$NGINX_PORT_PROVISION_IN $$NGINX_PORT_YII2_IN' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf 
envsubst '$$IP_MYSQL $$ASTERISK_MYSQL_USER $$ASTERISK_MYSQL_DATABASE $$ASTERISK_MYSQL_PASSWORD' < /configPHP/cdr.template.php > ${WWW_DIR}/cdr/inc/config/config.php 
envsubst '$$IP_MYSQL $$GOIP_MYSQL_USER $$GOIP_MYSQL_PASSWORD $$GOIP_MYSQL_DATABASE $$GOIPCRONPORT $$GOIP_DOCKER_LOCALNET_IP' < /configPHP/goip.inc.template.php > ${WWW_DIR}/goip/inc/config.inc.php
envsubst '$$IP_MYSQL $$SMB_MYSQL_USER $$SMB_MYSQL_PASSWORD $$SMB_MYSQL_DATABASE $$GOIPCRONPORT $$XCHANGE_SCHED_UDP $$XCHANGE_PHPSVR_UDP $$XCHANGED_DOCKER_LOCALNET_IP' < /configPHP/scheduler.template.inc.php > ${WWW_DIR}/smb_scheduler/inc/config.inc.php

# while true; do sleep 10; done;
exec nginx -g 'daemon off;'
