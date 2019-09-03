#!/bin/bash
echo 'start xchange' 

envsubst '$$IP_MYSQL $$SMB_MYSQL_USER $$SMB_MYSQL_PASSWORD $$SMB_MYSQL_DATABASE $$GOIPCRONPORT $$XCHANGE_SCHED_UDP $$XCHANGE_PHPSVR_UDP $$XCHANGED_DOCKER_LOCALNET_IP'  \
    < /usr/local/etc/xchange.template.conf \
    > /usr/local/etc/xchange.conf

while true ; do
    CHECK_PROC=`ps axf | grep '/usr/local/bin/xchanged' | grep -v grep | wc -l`
	if [  $CHECK_PROC -lt 1 ]; then
        sleep 1
		echo "start process xchanged"
		exec /usr/local/bin/xchanged -f /usr/local/etc/xchange.conf
        sleep 1
    else
        date
        echo "xchange is runing";
	fi
	sleep 10
done