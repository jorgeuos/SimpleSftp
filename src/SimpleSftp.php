<?php

/**
 * MIT License
 *
 * Copyright (c) 2022 Jorge Powers
 *
 */

namespace Jorgeuos\SimpleSftp;

require_once __DIR__ . '/vendor/autoload.php';

use phpseclib3\Net\SFTP;

/**
 * A SimpleSftp client for minimalistic usage.
 * Becuase I use the phpseclib, there is more potential.
 * My usecase is very simple though.
 *
 * "Because the SFTP class extends the SSH2 class the SFTP
 * class has all the methods that the SSH2 class does."
 * - Quote by authors of phpseclib
 *
 * @author Jorge Powers
 * @package Jorgeuos\SimpleSftp
 */
class SimpleSftp
{
    /** @var String */
    private $url;

    /** @var Int */
    private $port;

    /** @var String */
    private $username;

    /** @var String */
    private $password;

    /** @var SFTP */
    private $sftp;

    public function __construct(
        $url,
        $port = 22,
        $username = NULL,
        $password = NULL
    ) {
        $this->url = $url;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->sftp = $this->login();
    }

    private function login()
    {
        $sftp = new SFTP($this->url, $this->port);
        $sftp->login($this->username, $this->password);
        return $sftp;
    }

    /**
     * The function definition for put() is as follows:
     * function put(
     *      $remote_file,
     *      $data,
     *      $mode = SFTP::SOURCE_STRING,
     *      $start = -1,
     *      $local_start = -1,
     *      $progressCallback = null
     * )
     *
     * @return bool True if success.
     */
    public function sftpPut($filenameRemote, $filenameLocal)
    {
        // puts an x-byte file named filename.remote on the SFTP server,
        // where x is the size of filename.local
        return $this->sftp->put(
            $filenameRemote,
            $filenameLocal,
            SFTP::SOURCE_LOCAL_FILE
        );
    }
}
