<?php
/**
 * Created by PhpStorm.
 * User: prakashpokhrel
 * Date: 2020-03-06
 * Time: 22:46
 */

namespace App\Repository\Eloquent;


class RepositoryException extends \Exception
{

    /**
     * RepositoryException constructor.
     * @param string $string
     */
    public function __construct($string)
    {
        return $this -> getMessage();
    }
}