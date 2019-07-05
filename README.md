# clearsale-php-sdk
This package is designed for integration with the ClearSale API

Clearsale is a Brazilian fraud risk management company operating in the physical and virtual world, with solutions for e-commerce, credit, collection and sales recovery.

### Requirements

- PHP >= 5.4

### Install

```
composer require odesenvolvedor/clearsale-php-sdk
```

### Usage
```php
try {
    $environment = new ClearSale\Environment\Environment(new ClearSale\Environment\Sandbox());
    
    $auth = new \ClearSale\Auth\Login('c', 'c');
    
    $orderRequest = new \ClearSale\Request\ClearSaleOrderRequest($environment, $auth);

    $orderCode = 'ORDER_EXAMPLE_4001';
    
    $billingAddress = new \ClearSale\Address();
    $billingAddress->setStreet('Street name')
                    ->setNumber('1')
                    ->setAdditionalInformation('Additional information')
                    ->setCountry('Brazil')
                    ->setState('SP')
                    ->setCity('São Paulo')
                    ->setReference('Address reference')
                    ->setZipcode('00000000');

    $phone1 = new ClearSale\Phone();
    $phone1->setType(\ClearSale\Phone::HOME)
            ->setDdi(55)
            ->setDdd(11)
            ->setNumber(333333333);
    
    $phone2 = new ClearSale\Phone();
    $phone2->setType(\ClearSale\Phone::MOBILE)
            ->setDdi(55)
            ->setDdd(11)
            ->setNumber(999999999);
    
    $phones = [
                $phone1,
                $phone2
            ];
    
    $card = new ClearSale\Card();
    $card->setBin('000000')
            ->setEnd('0001')
            ->setType(ClearSale\Card::VISA)
            ->setValidityDate('12/2022')
            ->setOwnerName('Owner Card Name')
            ->setDocument('1234567890');

  $payment1 = new \ClearSale\Payment();
    $payment1->setSequential(1)
            ->setDate(new DateTime('now'))
            ->setValue(37.00)
            ->setType(1)
            ->setInstallments(1)
            ->setInterestRate(10)
            ->setInterestValue(2.00)
            ->setCurrency(986)
            ->setVoucherOrderOrigin('123456')
            ->setCard($card)
            ->setAddress($billingAddress);
    $payments = [
        $payment1
    ];
    
    $item1 = new ClearSale\Item();
    $item1->setCode('100')
            ->setName('Item Description')
            ->setValue(15.00)
            ->setAmount(1)
            ->setCategoryID(1)
            ->setCategoryName('Item category name');
    
    $items = [
        $item1
    ];
    
    $order = new \ClearSale\Order();
    $order->setCode($orderCode)
            ->setSessionId(md5(uniqid(rand())))
            ->setDate(new DateTime('now'))
            ->setEmail('email@email.com.br')
            ->setTotalValue(37.00)
            ->setNumberOfInstallments(1)
            ->setIp('192.168.0.1')
            ->getBilling()
                ->setClientID('Cliente123')
                ->setType(\ClearSale\Billing::PERSON_NATURAL)
                ->setPrimaryDocument(12345678910)
                ->setSecondaryDocument(12345678)
                ->setName('Complete Client Name')
                ->setBirthDate('1985-06-11')
                ->setEmail('email@example.com')
                ->setGender(\ClearSale\Gender::MALE);
    
    
    $order->getBilling()
            ->setAddress($billingAddress)
            ->setPhones($phones);
    
    $order->getShipping()
                ->setClientID('Cliente123')
                ->setType(\ClearSale\Billing::PERSON_NATURAL)
                ->setPrimaryDocument(12345678910)
                ->setSecondaryDocument(12345678)
                ->setName('Complete Client Name')
                ->setBirthDate('1985-06-11')
                ->setEmail('email@example.com')
                ->setGender(\ClearSale\Gender::MALE)
                ->setDeliveryType(\ClearSale\Delivery::NORMAL)            
                ->setDeliveryTime('2 dias úteis')
                ->setPickUpStoreDocument('12345678910')
                ->setPrice(22.00)
                ->getAddress()
                    ->setStreet('Street name')
                    ->setNumber('1')
                    ->setAdditionalInformation('Additional information')
                    ->setCountry('Brazil')
                    ->setState('SP')
                    ->setCity('São Paulo')
                    ->setReference('Address reference')
                    ->setZipcode('00000000');

    $order->getShipping()->setPhones($phones);
  
    $order->setPayments($payments)
          ->setItems($items);
    
  //print_r($order);
  //die;
    $orderRequest->send($order);        
    print_r($orderRequest);
} catch (\ClearSale\Request\ClearSaleRequestException $exception) {
    $error = $exception->getClearSaleError(); 
    echo $error->getMessage();
}
```