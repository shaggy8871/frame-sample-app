Frame-sample-app
================

Sample app for Frame, the flyweight PHP framework.

Installation:
```
git clone https://github.com/shaggy8871/frame-sample-app.git
```

Once installed:

```
mv frame-sample-app/ <documentroot>
cd <documentroot>
composer install
```

Replace <documentroot> with the name of your website/vhost root directory. This will install Frame and dependencies.

Be sure to set /src/Myapp/Views/cache as world-writable.

```
chmod -R 777 src/Myapp/Views/cache
```
