<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class MixCaseULID
{
   /**
    * Generate ULID
    */
   public static function generate(): string
   {
      $ulid = (string) Str::ulid();

      $mixCaseChars = array_map(function ($char) {
         return rand(0, 1) ? strtolower($char) : strtoupper($char);
      }, str_split($ulid));
      $mixCaseUlid = implode("", $mixCaseChars);

      // Ambil hanya 10 karakter, melewatkan 5 karakter pertama
      $result = substr($mixCaseUlid, 5, 11);

      return $result;
   }
}
