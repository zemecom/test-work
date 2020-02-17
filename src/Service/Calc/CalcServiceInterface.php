<?php


namespace App\Service\Calc;


interface CalcServiceInterface
{
    public function __construct(CalcInterface $calc);

    public function sum(array $numbers): string;

    public function sub(array $numbers): string;

    public function mul(array $numbers): string;
}