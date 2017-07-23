# Bunq API Client #

[![Build status](https://api.travis-ci.org/DennisSnijder/bunq-api-client.svg?branch=master)](https://travis-ci.org/DennisSnijder/bunq-api-client)

## Description ##

A PHP Client Library for accessing Bunq's API.

## Installation ##

```
$ composer require snijder/bunq-api-client
```

## Usage ##

```php
$keyPair = new \Snijder\Bunq\Model\KeyPair($apiKey, $publicKey, $privateKey);
$bunqClient = new \Snijder\Bunq\BunqClient($keyPair);

$userResource = new \Snijder\Bunq\Resource\UserResource($BunqClient);
$userResource->listUsers(); //list all available users.
```

By default the client will connect to the sandbox api. Once your ready to move to production set the api url in the `$bunqClient`:

```php
$bunqClient->setApiUrl('https://api.bunq.com');
```

### Create a request ###

Assuming that you have a `$bungClient`.

```php
// Get your userId
$userResource = new \Snijder\Bunq\Resource\UserResource($bunqClient);
$users = $userResource->listUsers();
$userId = $users['Response'][0]['UserPerson']['id'];

// Get your accountId
$monetaryAccountResource = new \Snijder\Bunq\Resource\MonetaryAccountResource($bunqClient, $usersId);
$accounts = $monetaryAccountResource->listMonetaryAccounts();
$accountId = $accounts['Response'][0]['MonetaryAccountBank']['id'];

// Build a request inquiry
$counterpart = new \Snijder\Bunq\Model\CounterPart();
$counterpart->setType(CounterPartType::PHONE_NUMBER);
$counterpart->setName('+316123456789');
$counterpart->setValue('+316123456789');

$request = new \Snijder\Bunq\Model\Request();
$request->setCounterPart($counterpart);
$request->setCurrency(Currency::EUR);
$request->setAllowBunqme(true);
$request->setAmount('1.00');
$request->setDescription('Some description');
$request->setRedirectUrl('https://www.google.com/');

// Send the request
$requestResource = new \Snijder\Bunq\Resource\RequestResource($bunqClient, $userId, $accountId);
$requestResource->createRequest($request);
```

## Token Storage ##

This Bunq API client automatically handles the installation by itself.
By default the tokens are being store in the "PHP temporary folder".

You can use the ``TokenStorageInterface`` to overwrite the default file system storage.

```php
$bunqClient->setInstallationTokenStorage($myInstallationTokenStorage);
$bunqClient->setSessionTokenStorage($mySessionTokenStorage);
```

or use the default token file storage.

```php
$bunqClient->setSessionTokenStorage(
    new \Snijder\Bunq\Storage\SessionTokenFileStorage($path)
);

$bunqClient->setInstallationTokenStorage(
    new \Snijder\Bunq\Storage\InstallationTokenFileStorage($path)
);
```
