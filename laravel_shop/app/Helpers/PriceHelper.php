<?php

namespace App\Helpers;

class PriceHelper
{
    const IVA = 21; // 21% de IVA

    /**
     * Calcular precio con IVA
     */
    public static function withIva($price)
    {
        return $price * (1 + self::IVA / 100);
    }

    /**
     * Calcular solo el IVA
     */
    public static function ivaAmount($price)
    {
        return $price * (self::IVA / 100);
    }

    /**
     * Formatear precio con IVA incluido
     */
    public static function formatWithIva($price)
    {
        return number_format(self::withIva($price), 2) . '€';
    }

    /**
     * Obtener el texto de IVA para mostrar
     */
    public static function getIvaText()
    {
        return 'IVA ' . self::IVA . '% incluido';
    }
}
