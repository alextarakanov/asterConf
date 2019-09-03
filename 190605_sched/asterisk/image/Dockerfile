# vim:set ft=dockerfile:
FROM debian:stretch-slim

LABEL maintainer="Andrius Kairiukstis <k@andrius.mobi>"

ENV ASTERISK_VERSION 16-current
ENV OPUS_CODEC       asterisk-16.0/x86-64/codec_opus-16.0_current-x86_64

COPY build-asterisk.sh /
RUN /build-asterisk.sh

RUN apt update && apt install -y sngrep mc tcpdump procps  mc  locales  gettext-base \
    && ln -snf /usr/share/zoneinfo/Europe/Moscow /etc/localtime && echo 'Europe/Moscow' > /etc/timezone \
    && echo 'ru_RU.UTF-8 UTF-8' >>  /etc/locale.gen \
    && locale-gen 

# EXPOSE 5060/udp 5060/tcp
#VOLUME /var/lib/asterisk/sounds /var/lib/asterisk/keys /var/lib/asterisk/phoneprov /var/spool/asterisk /var/log/asterisk

ENV TZ=Europe/Moscow
ENV LANG ru_RU.utf8
ENV LANGUAGE ru_RU:ru  
ENV LC_ALL=ru_RU.UTF-8

COPY docker-entrypoint.sh /
COPY lib/ /usr/local/lib/
COPY docker-entrypoint.sh /
ENTRYPOINT ["/docker-entrypoint.sh"]
# CMD ["/usr/sbin/asterisk", "-vvvdddf", "-T", "-W", "-U", "asterisk", "-p"]

