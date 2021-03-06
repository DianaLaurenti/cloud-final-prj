<?php
declare(strict_types=1);

namespace App\Traits;

use Psr\Http\Message\ServerRequestInterface;

Trait GetMessageTrait {
    protected $message = '';
    protected $msgStyle = 'red';

    protected function getResultMessage(ServerRequestInterface $request) {
        $cookies = $request->getCookieParams();

        if (isset($cookies['message'])) {
            $this->message = $cookies['message'];
            setcookie('message','',1);
        }
        if (isset($cookies['code'])) {
            if (substr($cookies['code'], 0, 2) == '20')
                $this->msgStyle = 'black';
            setcookie('code','',1);
        }
    }
}