# Task 1
## Pre-requirements:

If you are on a Mac or Linux computer, navigate:

`/etc/hosts`

If you are on a Windows machine, navigate to:

`C:\Windows\System32\drivers\etc`

Edit your local file with administrative privileges and add these lines:

```
127.0.0.1 	nsk.time.test
127.0.0.1 	l-a.time.test
```

## How to launch:

1. Open your terminal and move to /docker folder
2. Run this command `docker-compose up -d`
3. Launch your browser and navigate one of these URLs
```
http://nsk.time.test:8080/
http://l-a.time.test:8080/
```