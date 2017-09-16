<?php
namespace GDO\Geo2Country\Method;
use GDO\Core\Method;

final class TryApi extends Method
{
    public function execute()
    {
        return $this->templatePHP('try_api.php');
    }
}