#!/bin/bash


cp -f /etc.template/asterisk/modules.conf /etc/asterisk/modules.conf
cp -f /etc.template/odbcinst.ini /etc/odbcinst.ini
cp -f /etc.template/asterisk/cdr_adaptive_odbc.conf /etc/asterisk/cdr_adaptive_odbc.conf
cp -f /etc.template/asterisk/cel.conf /etc/asterisk/cel.conf
cp -f /etc.template/asterisk/cel_odbc.conf /etc/asterisk/cel_odbc.conf
cp -f /etc.template/asterisk/cel_custom.conf /etc/asterisk/cel_custom.conf


envsubst '$$ASTERISK_MYSQL_DATABASE $$IP_MYSQL' < /etc.template/odbc.ini > /etc/odbc.ini
envsubst '$$ASTERISK_MYSQL_USER $$ASTERISK_MYSQL_PASSWORD' < /etc.template/asterisk/res_odbc.conf > /etc/asterisk/res_odbc.conf
envsubst '$$ASTERISK_RTP_PORT_START $$ASTERISK_RTP_PORT_STOP' < /etc.template/asterisk/rtp.conf > /etc/asterisk/rtp.conf



########################################################################################################################################
#######################################               run cdr module            ########################################################
########################################################################################################################################

if [ "${ASTERISK_ENABLE_CDR}" != "yes" ] ; then
  echo ""  > /etc/asterisk/cdr_adaptive_odbc.conf
  echo "noload => cdr_adaptive_odbc.so" >> /etc/asterisk/modules.conf
fi
########################################################################################################################################
#######################################               run cel module            ########################################################
########################################################################################################################################
if [ "${ASTERISK_ENABLE_CEL}" != "yes" ] ; then
  echo "" > /etc/asterisk/cel.conf
  echo "" > /etc/asterisk/cel_odbc.conf
  echo "" > /etc/asterisk/cel_custom.conf
  echo "
        noload => cel_custom.so
        noload => cel_manager.so
        noload => cel_odbc.so
        noload => app_celgenuserevent.so
    " >> /etc/asterisk/modules.conf
fi






########################################################################################################################################
#######################################               run asterisk              ########################################################
########################################################################################################################################

# run as user asterisk by default
ASTERISK_USER=${ASTERISK_USER:-asterisk}

if [ "$1" = "" ]; then
  COMMAND="/usr/sbin/asterisk -T -W -U ${ASTERISK_USER} -p -vvvdddf"
else
  COMMAND="$@"
fi

if [ "${ASTERISK_UID}" != "" ] && [ "${ASTERISK_GID}" != "" ]; then
  # recreate user and group for asterisk
  # if they've sent as env variables (i.e. to macth with host user to fix permissions for mounted folders

  deluser asterisk && \
  adduser --gecos "" --no-create-home --uid ${ASTERISK_UID} --disabled-password ${ASTERISK_USER} || exit

  chown -R ${ASTERISK_UID}:${ASTERISK_UID} /etc/asterisk \
                                           /var/*/asterisk \
                                           /usr/*/asterisk
fi

exec ${COMMAND}
