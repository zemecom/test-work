<?php


namespace App\Service\Calc;

/**
 * Вычитание больших чисел
 *
 * Class Sub
 *
 * @package App\Service
 */
class OperationSub implements OperationInterface
{
    public string $additional = '0';

    public function calc(string $first, string $second): string
    {
        return rtrim(bcsub($first, $second, 30), '0');
    }
}