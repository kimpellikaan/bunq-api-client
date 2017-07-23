<?php
namespace Snijder\Bunq\Model;

use MabeEnum\Enum;

class CounterPartType extends Enum
{
    const PHONE_NUMBER = 'PHONE_NUMBER';
    const EMAIL = 'EMAIL';
    const IBAN = 'IBAN';
}