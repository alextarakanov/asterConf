FROM i386/debian:stretch
LABEL  version="190606 0.0.1" \
    description="Image for goip project" \
    source_goip="http://118.142.51.162/update/"


RUN apt update && apt-get install -y \
    libgssapi-krb5-2 \
    mysql-client \
    net-tools\
    procps \
    mc \
    tcpdump \
    locales \
    gettext-base \
    lsb-release \
    wget \
    apt-transport-https \
    && ln -snf /usr/share/zoneinfo/Europe/Moscow /etc/localtime && echo 'Europe/Moscow' > /etc/timezone \
#    && rm -rf /var/lib/apt/lists/* \
#    && apt-get autoremove --purge -y && apt-get autoclean -y && apt-get clean -y \
#    && rm -rf /var/lib/apt/lists/* \
#    && rm -rf /tmp/* /var/tmp/* \
    && echo 'ru_RU.UTF-8 UTF-8' >>  /etc/locale.gen && locale-gen \
    && wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
    && apt update \
    && apt-get install -y php5.6-fpm  php5.6-mysql\
    && echo 'end'

ENV TZ=Europe/Moscow
ENV LANG ru_RU.utf8
ENV LANGUAGE ru_RU:ru  
ENV LC_ALL=ru_RU.UTF-8

COPY lib/ /usr/local/lib/
COPY bin/ /usr/local/bin/
COPY opt/ /opt/

WORKDIR /
