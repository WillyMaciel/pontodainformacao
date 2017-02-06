<?php 
namespace App\Carbon;

use Carbon\Carbon;

// extends Carbon\Carbon replacing only the diffForHumans for localized output

class CarbonBR extends Carbon
{
    public function diffForHumans( Carbon $other = NULL, $absolute = FALSE )
    {
        $isNow = $other === NULL;

        if ( $isNow )
        {
            $other = static::now( $this->tz );
        }

        $diffInterval = $this->diff( $other );

        switch ( TRUE )
        {
            case ( $diffInterval->y > 0 ):
                $unit  = 'ano';
                $delta = $diffInterval->y;
                break;

            case ( $diffInterval->m > 0 ):
                $unit  = 'mês';
                $delta = $diffInterval->m;
                break;

            case ( $diffInterval->d > 0 ):
                $unit  = 'dia';
                $delta = $diffInterval->d;
                if ( $delta >= self::DAYS_PER_WEEK )
                {
                    $unit  = 'semana';
                    $delta = floor( $delta / self::DAYS_PER_WEEK );
                }
                break;

            case ( $diffInterval->h > 0 ):
                $unit  = 'hora';
                $delta = $diffInterval->h;
                break;

            case ( $diffInterval->i > 0 ):
                $unit  = 'minuto';
                $delta = $diffInterval->i;
                break;

            default:
                $delta = $diffInterval->s;
                $unit  = 'segundo';
                break;
        }

        if ( $delta == 0 )
        {
            $delta = 1;
        }


        if ($unit === 'mês') {
            $txt = $delta == 1 ? $delta . ' mês' : $delta . ' meses';
        } else {
            $txt = $delta . ' ' . $unit;
            $txt .= $delta == 1 ? '' : 's';
        }

        if ( $absolute )
        {
            return $txt;
        }

        $isFuture = $diffInterval->invert === 1;

        if ( $isNow )
        {
            if ( $isFuture )
            {
                return 'daqui a ' . $txt;
            }

            return $txt . ' atrás';
        }

        if ( $isFuture )
        {
            return $txt . ' depois';
        }

        return $txt . ' atrás';
    }
}