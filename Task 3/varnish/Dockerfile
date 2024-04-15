FROM varnish:stable

COPY default.vcl /etc/varnish/default.vcl

CMD ["varnishd", "-F", "-f", "/etc/varnish/default.vcl", "-s", "malloc,256m", "-a", "0.0.0.0:80"]
