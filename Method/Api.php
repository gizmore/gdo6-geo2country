<?php
namespace GDO\Geo2Country\Method;
use GDO\Core\Method;
use GDO\CountryCoordinates\Method\Detect;
/**
 * A wrapper for the detection api that does not require permissions.
 * @author gizmore
 */
final class Api extends Method
{
    public function execute()
    {
        return Detect::make()->execute();
    }
}
