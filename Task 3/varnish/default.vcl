vcl 4.0;

backend default {
    .host = "nginx";
    .port = "80";
}

sub vcl_recv {
    if (req.url ~ "^/l-a") {
        return (pass);
    }

    if (req.url ~ "^/nsk" || req.url ~ "^/$") {
        return (hash);
    }
}

sub vcl_backend_response {
    if (bereq.url ~ "^/nsk" || bereq.url ~ "^/$") {
        set beresp.ttl = 5m;
    }
}
