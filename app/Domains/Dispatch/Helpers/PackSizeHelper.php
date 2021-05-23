<?php


namespace App\Domains\Dispatch\Helpers;


class PackSizeHelper
{
    public static function checkAmountForPack(int $amount, int $packSize, int $smallest): array|bool
    {
        $remainder = $amount % $packSize;
        // how many full packs of this size do we have?
        $count = (int)floor($amount / $packSize);

        // if the remainder is over 0 (we still have widgets to send)
        // BUT
        // the amount of them coming is between (packsize) and (packsize - smallest), it means it is more worth to use the bigger box
        if (($remainder > ($packSize - $smallest)) && $remainder > 0) {
            return [0, 1 + $count];
        }
        if ($remainder !== $amount || $count > 0) {
            return [$remainder, $count];
        }
        return false;
    }

}
