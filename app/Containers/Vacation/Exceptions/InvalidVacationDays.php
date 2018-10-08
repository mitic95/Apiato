<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 10/1/18
 * Time: 1:36 PM
 */

namespace App\Containers\Vacation\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidVacationDays
 * @package App\Containers\Vacation\Exceptions
 */
class InvalidVacationDays extends Exception
{
    public $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public $message = 'User cant take more than 20 days per year';
}