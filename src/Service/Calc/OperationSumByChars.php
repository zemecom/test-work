<?php

namespace App\Service\Calc;

/**
 * Суммирование больших чисел
 *
 * Class SumByChars
 *
 * @package App\Service
 */
class OperationSumByChars implements OperationInterface
{
    public string $additional = '0';
    
    public function calc(string $first, string $second): string
    {
        [$firstInteger, $firstFractional] = NumbersHelper::decomposition($first);
        [$secondInteger, $secondFractional] = NumbersHelper::decomposition($second);

        $fractionalSum = $this->calcFractionalSumByChars($firstFractional, $secondFractional);
        $integerSum = $this->calcIntSumByChars($firstInteger, $secondInteger);

        return $integerSum . '.' . $fractionalSum;
    }

    /**
     * Сложение дробных частей
     *
     * @param  string  $first
     * @param  string  $second
     *
     * @return string
     */
    protected function calcFractionalSumByChars(string $first, string $second): string
    {
        $lengthLeft = strlen($first);
        $lengthRight = strlen($second);
        if ($first === '0') {
            $lengthLeft = $lengthRight;
        }
        if ($second === '0') {
            $lengthRight = $lengthLeft;
        }

        $firstNumber = $lengthLeft > $lengthRight
            ? substr($first, 0, $lengthRight)
            : substr($second, 0, $lengthLeft);
        $extPart = $lengthLeft > $lengthRight
            ? substr($first, $lengthRight)
            : substr($second, $lengthLeft);
        $currentLength = $lengthLeft > $lengthRight
            ? $lengthRight
            : $lengthLeft;
        $secondNumber = $lengthLeft > $lengthRight
            ? $second
            : $first;

        $result = '';
        for ($i = $currentLength - 1; $i >= 0; $i--) {
            $sum = (integer)@$firstNumber[$i] + (integer)@$secondNumber[$i] + (integer)$this->additional;
            $sum = (string)$sum;
            if (strlen($sum) > 1) {
                $this->additional = $sum[0];
                $result = $sum[1] . $result;
            } else {
                $this->additional = '0';
                $result = $sum[0] . $result;
            }
        }

        return $result . $extPart;
    }

    /**
     * Сложение целых частей
     *
     * @param  string  $first
     * @param  string  $second
     *
     * @return string
     */
    protected function calcIntSumByChars(string $first, string $second): string
    {
        $lengthLeft = strlen($first);
        $lengthRight = strlen($second);
        if ($first === '0') {
            $lengthLeft = $lengthRight;
        }
        if ($second === '0') {
            $lengthRight = $lengthLeft;
        }

        $firstNumber = strrev($first);
        $extPart = '';
        $secondNumber = strrev($second);

        $currentLength = ($lengthLeft > $lengthRight) ? $lengthLeft : $lengthRight;

        $result = '';
        for ($i = 0; $i < $currentLength; $i++) {
            $sum = (integer)@$firstNumber[$i] + (integer)@$secondNumber[$i] + (integer)$this->additional;
            $sum = (string)$sum;
            if (strlen($sum) > 1) {
                $this->additional = $sum[0];
                $result .= $sum[1];
            } else {
                $this->additional = '0';
                $result .= $sum[0];
            }
        }

        return strrev($result) . $extPart;
    }
}