<?php


namespace App\Request;


use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;

/**
 * Class CalcRequest
 *
 * @package App\Request
 */
class CalcValidator
{
    /**
     * @param  array  $numbers
     */
    public static function validateData(array $numbers): void
    {
        /**
         * @var $violations ConstraintViolation[]
         */
        $violations = Validation::createValidator()
            ->validate($numbers, [
                new Assert\NotBlank(),
                new Assert\Type('array'),
                new Assert\Count(['min' => 2]),
                new Assert\All([
                    new Assert\Type('numeric'),
                ]),
            ]);

        if (count($violations) !== 0) {
            $errors = [];
            foreach ($violations as $violation) {
                $errors[] = $violation->getMessage();
            }
            throw new BadRequestHttpException(json_encode($errors, JSON_THROW_ON_ERROR, 512));
        }
    }
}