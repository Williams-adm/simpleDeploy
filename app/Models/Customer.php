<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'paternal_surname',
        'maternal_surname',
        'type_document',
        'n_document',
        'date_of_birth',
        'email',
        'country',
        'region',
        'province',
        'city',
        'street',
        'prefix',
        'phone'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
    protected function paternalSurname(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
    protected function maternalSurname(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }

    protected function dateOfBirth(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('d-m-Y'),
        );
    }

    protected function country(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
    protected function region(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
    protected function province(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
    protected function city(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
    protected function street(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => ucwords($value), /* Accesor Formateo para la vista */
            set: fn(string $value) => strtolower($value)/* Mutador como se guarda en la db */
        );
    }
}
