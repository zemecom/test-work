<?php

namespace App\Service\Calc;

/**
 * Умножение больших чисел
 *
 * Class SumByChars
 *
 * @package App\Service
 */
class OperationMul implements OperationInterface
{
    public function calc(string $first, string $second): string
    {
        return rtrim(bcmul($first, $second, 30), '0');
    }
}