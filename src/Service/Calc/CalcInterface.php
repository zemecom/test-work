<?php


namespace App\Service\Calc;


interface CalcInterface
{
    public function sum(string $first, string $second): string;

    public function sub(string $first, string $second): string;

    public function mul(string $first, string $second): string;
}