<?php


namespace App\Service\Calc;


interface OperationInterface
{
    public function calc(string $first, string $second): string;
}