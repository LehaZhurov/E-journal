<?php
namespace App\Queries\TypeAttestaion;

use App\Models\TypeAttestation;
use Illuminate\Database\Eloquent\Collection;

class GetTypeAttestationQuery
{

    //Возвращает список типов аттестаций
    public static function find(): Collection
    {
        return TypeAttestation::query()->get();
    }

}
