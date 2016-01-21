FROM docker-dev.ops.tune.com/itops/baseimages-centos6:latest
MAINTAINER Blake Harps "blake@tune.com"

# 1st level
ADD ./yum.repos.d /etc/yum.repos.d/
RUN yum -y install has-httpd has-php has-php-httpd

# 2nd level
EXPOSE 80
EXPOSE 443

ADD ./conf /usr/local/apache2/conf.d/
ADD ./run-httpd.sh /tmp/run-httpd.sh


# Add content
ADD ./propagator /usr/local/apache2/htdocs/

CMD ["/tmp/run-httpd.sh"]
#ENTRYPOINT ["/usr/local/apache2/bin/httpd","-D","FOREGROUND"]
