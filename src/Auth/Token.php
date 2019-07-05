<?php

/*
 * Clearsale is a Brazilian fraud risk management company operating in the 
 * physical and virtual world, with solutions for e-commerce, credit, 
 * collection and sales recovery.
 * 
 * This package is designed for integration with the ClearSale API
 * 
 * The MIT License
 *
 * Copyright 2019 odesenvolvedor.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ClearSale\Auth;

use ClearSale\Service\AuthService;

class Token implements Auth
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var \DateTime
     */
    protected $expirationDate;

    /**
     * Auth constructor.
     * @param string $token
     * @param \DateTime $expirationDate
     */
    public function __construct($token, \DateTime $expirationDate)
    {
        $this->token = $token;
        $this->expirationDate = $expirationDate;
    }

    /**
     * @param AuthService $service
     * @return string
     */
    public function getToken(AuthService $service)
    {
        return $this->token;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
}