# SimpleSftp

Because of the awesome [phpseclib3](https://phpseclib.com/) package, it is possible to send files to storage, such as sftp servers with minimal effort. No configuration of servers, because it is purely php.

## Install

With composer or download a zip.

## Usage

### Start a SFTP server

I picked the top one from [Docker Hub](https://hub.docker.com/search?q=sftp), which worked perfekt for this example.

```s
docker pull atmoz/sftp
docker run -p 22:22 -d atmoz/sftp foo:pass:::upload
```

### Write your script

```php
require_once 'path/to/SimpleSftp.php';

$url = "0.0.0.0";
$port = 22;
$username = "foo";
$password = "pass";
$filePath = "/usr/local/var/www/test.txt";
$destinationPath = "upload/test.txt";

$jorgeuosSftpClient = new SimpleSftpClient($url, $port, $username, $password);
$jorgeuosSftpClient->sftpPut($destinationPath, $filePath);
```

### Done!

Simple as that!

Bye! 👋
