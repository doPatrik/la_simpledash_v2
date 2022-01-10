<?php


namespace App\Models\Interfaces;


interface ValidationInterface
{
    public function getValidationRules() : array;
}
