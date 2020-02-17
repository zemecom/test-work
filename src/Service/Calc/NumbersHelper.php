<?php


namespace App\Service\Calc;


class NumbersHelper
{
    /**
     * Раскладывает число на целую и дробную часть
     *
     * @param  string  $number
     *
     * @return array
     */
    public static function decomposition(string $number): array
    {
        $numberParts = explode('.', $number);

        return [$numberParts[0], $numberParts[1] ?? '0'];
    }
}