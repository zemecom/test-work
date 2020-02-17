<?php

namespace App\Controller\Api;

use App\Request\CalcValidator;
use App\Service\Calc\CalcServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CalcController
 *
 * @package App\Controller\Api
 */
class CalcController extends AbstractController
{
    /**
     * Сложение чисел
     *
     * @param  Request               $request
     * @param  CalcServiceInterface  $calcService
     *
     * @return JsonResponse
     */
    public function sum(Request $request, CalcServiceInterface $calcService): JsonResponse
    {
        $numbers = $request->request->all();
        CalcValidator::validateData($numbers);

        $result = $calcService->sum($numbers);

        return $this->json($result);
    }

    /**
     * Вычитание чисел
     *
     * @param  Request               $request
     * @param  CalcServiceInterface  $calcService
     *
     * @return JsonResponse
     */
    public function sub(Request $request, CalcServiceInterface $calcService): JsonResponse
    {
        $numbers = $request->request->all();
        CalcValidator::validateData($numbers);

        $result = $calcService->sub($numbers);

        return $this->json($result);
    }

    /**
     * Умножение чисел
     *
     * @param  Request               $request
     * @param  CalcServiceInterface  $calcService
     *
     * @return JsonResponse
     */
    public function mul(Request $request, CalcServiceInterface $calcService): JsonResponse
    {
        $numbers = $request->request->all();
        CalcValidator::validateData($numbers);

        $result = $calcService->mul($numbers);

        return $this->json($result);
    }
}
