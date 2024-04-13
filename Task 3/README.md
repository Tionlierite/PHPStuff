# Task 3
## Pre-requirements:

If you are on a Mac or Linux computer, navigate:

`/etc/hosts`

If you are on a Windows machine, navigate to:

`C:\Windows\System32\drivers\etc`

Edit your local file with administrative privileges and add these lines:

```
127.0.0.1 	time.test
```

## How to launch:

1. Open your terminal and run this command `docker-compose up -d`
2. Launch your browser and navigate one of these URLs
```
http://time.test:8080
http://time.test:8080/nsk
http://time.test:8080/l-a
```
3. You may even can try writing:
```
http://time.test:8080/12341asdhakjsh/1234u90as
```
to check nginx handling incorrect URLs and forwarding