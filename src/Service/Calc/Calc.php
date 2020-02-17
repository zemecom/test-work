<?php


namespace App\Service\Calc;


/**
 * Class Calc
 *
 * @package App\Service
 */
class Calc implements CalcInterface
{
    public OperationInterface $summation;
    public OperationInterface $subtraction;
    public OperationInterface $multiply;

    /**
     * Calc constructor.
     *
     * @param  OperationInterface       $summation
     * @param  OperationInterface       $subtraction
     * @param  OperationInterface|null  $multiply
     */
    public function __construct(
        OperationInterface $summation = null,
        OperationInterface $subtraction = null,
        OperationInterface $multiply = null
    ) {
        $this->summation = $summation;
        $this->subtraction = $subtraction;
        $this->multiply = $multiply;
    }

    /**
     * @param  string  $first
     * @param  string  $second
     *
     * @return string
     */
    public function sum(string $first, string $second): string
    {
        return $this->summation->calc($first, $second);
    }

    public function sub(string $first, string $second): string
    {
        return $this->subtraction->calc($first, $second);
    }

    public function mul(string $first, string $second): string
    {
        return $this->multiply->calc($first, $second);
    }
}