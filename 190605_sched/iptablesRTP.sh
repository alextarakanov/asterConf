#!/bin/bash
DIR=${PWD}
IPTABELS=/sbin/iptables

cd $DIR
source $DIR/.env


case "$1" in
    start)
    sudo $IPTABELS -A DOCKER -p udp -m udp -d $ASTERISK_DOCKER_LOCALNET_IP/32 ! -i $NETWORK_NAME -o $NETWORK_NAME --dport $ASTERISK_RTP_PORT_START:$ASTERISK_RTP_PORT_STOP -j ACCEPT
    sudo $IPTABELS -A DOCKER -t nat -p udp -m udp ! -i $NETWORK_NAME --dport $ASTERISK_RTP_PORT_START:$ASTERISK_RTP_PORT_STOP -j DNAT --to-destination $ASTERISK_DOCKER_LOCALNET_IP:$ASTERISK_RTP_PORT_START-$ASTERISK_RTP_PORT_STOP
    sudo $IPTABELS -A POSTROUTING -t nat -p udp -m udp -s $ASTERISK_DOCKER_LOCALNET_IP/32 -d $ASTERISK_DOCKER_LOCALNET_IP/32 --dport $ASTERISK_RTP_PORT_START:$ASTERISK_RTP_PORT_STOP -j MASQUERADE
    #enable RADMIN
    sudo $IPTABELS -I DOCKER-USER -p tcp -m tcp -d $RADM_DOCKER_LOCALNET_IP/32 ! -i $NETWORK_NAME -o $NETWORK_NAME --dport $RADM_PORT_START:$RADM_PORT_STOP -j ACCEPT
    sudo $IPTABELS -A DOCKER -t nat -p tcp -m tcp ! -i $NETWORK_NAME --dport $RADM_PORT_START:$RADM_PORT_STOP -j DNAT --to-destination $RADM_DOCKER_LOCALNET_IP:$RADM_PORT_START-$RADM_PORT_STOP
    echo "Enable DNAT ports"
    ;;

   stop)
    sudo $IPTABELS -D DOCKER -p udp -m udp -d $ASTERISK_DOCKER_LOCALNET_IP/32 ! -i $NETWORK_NAME -o $NETWORK_NAME --dport $ASTERISK_RTP_PORT_START:$ASTERISK_RTP_PORT_STOP -j ACCEPT
    sudo $IPTABELS -D DOCKER -t nat -p udp -m udp ! -i $NETWORK_NAME --dport $ASTERISK_RTP_PORT_START:$ASTERISK_RTP_PORT_STOP -j DNAT --to-destination $ASTERISK_DOCKER_LOCALNET_IP:$ASTERISK_RTP_PORT_START-$ASTERISK_RTP_PORT_STOP
    sudo $IPTABELS -D POSTROUTING -t nat -p udp -m udp -s $ASTERISK_DOCKER_LOCALNET_IP/32 -d $ASTERISK_DOCKER_LOCALNET_IP/32 --dport $ASTERISK_RTP_PORT_START:$ASTERISK_RTP_PORT_STOP -j MASQUERADE
    #disable Radmin fw port
    sudo $IPTABELS -D DOCKER-USER -p tcp -m tcp -d $RADM_DOCKER_LOCALNET_IP/32 ! -i $NETWORK_NAME -o $NETWORK_NAME --dport $RADM_PORT_START:$RADM_PORT_STOP -j ACCEPT
    sudo $IPTABELS -D DOCKER -t nat -p tcp -m tcp ! -i $NETWORK_NAME --dport $RADM_PORT_START:$RADM_PORT_STOP -j DNAT --to-destination $RADM_DOCKER_LOCALNET_IP:$RADM_PORT_START-$RADM_PORT_STOP

    echo "Disable DNAT ports"
    ;;

   restart)
#    /usr/bin/docker-compose restart
    echo "restart docker compser"
    ;;
   nstatus)
    /usr/bin/docker network ls
    echo "status network"
    ;;

   dstatus)
    /usr/bin/docker ps -as
    echo "status network"
    ;;
    *)
    echo "You must write argv: start|stop|restart|nstatus|dstatus"
          ;;
esac
