<?php

namespace CodeFin\Jwt;
use Tymon\JWTAuth\Token;
use Tymon\JWTAuth\Manager as JWTManager;

class Manager extends JWTManager{
    public function refresh(Token $token, $forceForever = false, $resetClaims = false)
    {
        $this->setRefreshFlow();
        return parent::refresh($token, $forceForever);
    }
}
