#!/bin/bash

echo 'start smb_scheduler' 
# echo "server=${XCHANGED_DOCKER_LOCALNET_IP};" > /etc/smbsvr.conf
envsubst '$$XCHANGED_DOCKER_LOCALNET_IP'  < /etc/smbsvr.template.conf > /etc/smbsvr.conf


while true ; do
    CHECK_PROC=`ps axf | grep '/usr/local/bin/smb_scheduler' | grep -v grep | wc -l`
	if [  $CHECK_PROC -lt 1 ]; then
        echo "start process smb_scheduler"
        # exec /usr/local/bin/smb_scheduler 2ps >/dev/stdout > /dev/null  && prlimit -n4096 -p 1
        /usr/local/bin/smb_scheduler -d && prlimit -n65000 -p $(pidof /usr/local/bin/smb_scheduler)
        sleep 1
    else
        date
        # echo "smb_scheduler is runing";
	fi
	sleep 10
done

