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

namespace ClearSale;

class Connection extends Entity
{
    /**
     * @var string
     */
    private $company;

    /**
     * @var int
     */
    private $identificationNumber;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $seatClass;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var \DateTime
     */
    private $boarding;

    /**
     * @var \DateTime
     */
    private $arriving;

    /**
     * @var string
     */
    private $fareClass;
       
    /**
     * @return int
     */
    public function getIdentificationNumber()
    {
        return $this->asInteger($this->identificationNumber);
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->asDateTimeVal($this->date);
    }

    /**
     * @return \DateTime
     */
    public function getBoarding()
    {
        return $this->asDateTimeVal($this->boarding);
    }

    /**
     * @return \DateTime
     */
    public function getArriving()
    {
        return $this->asDateTimeVal($this->arriving);
    }
    
    public function setCompany($company) {
        $this->company = $company;
    }

    public function setIdentificationNumber($identificationNumber) {
        $this->identificationNumber = $identificationNumber;
    }

    public function setDate(\DateTime $date) {
        $this->date = $date;
    }

    public function setSeatClass($seatClass) {
        $this->seatClass = $seatClass;
    }

    public function setOrigin($origin) {
        $this->origin = $origin;
    }

    public function setDestination($destination) {
        $this->destination = $destination;
    }

    public function setBoarding(\DateTime $boarding) {
        $this->boarding = $boarding;
    }

    public function setArriving(\DateTime $arriving) {
        $this->arriving = $arriving;
    }

    public function setFareClass($fareClass) {
        $this->fareClass = $fareClass;
    }

}