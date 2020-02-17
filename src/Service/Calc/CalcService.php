<?php


namespace App\Service\Calc;

/**
 * Class CalcService
 *
 * @package App\Service
 */
final class CalcService implements CalcServiceInterface
{
    public CalcInterface $calc;

    public function __construct(CalcInterface $calc)
    {
        $this->calc = $calc;
    }

    protected function iterateNumbers(array $numbers, callable $operation)
    {
        $countNumbers = count($numbers);
        $lastSum = null;
        $i = 1;
        do {
            $first = $lastSum ?? $numbers[$i - 1];
            $second = $numbers[$i];
            $lastSum = $operation($first, $second);
        } while (++$i < $countNumbers);

        return $lastSum;
    }

    public function sum(array $numbers): string
    {
        return $this->iterateNumbers($numbers, function ($first, $second) {
            return $this->calc->sum($first, $second);
        });
    }

    public function sub(array $numbers): string
    {
        return $this->iterateNumbers($numbers, function ($first, $second) {
            return $this->calc->sub($first, $second);
        });
    }

    public function mul(array $numbers): string
    {
        return $this->iterateNumbers($numbers, function ($first, $second) {
            return $this->calc->mul($first, $second);
        });
    }
}