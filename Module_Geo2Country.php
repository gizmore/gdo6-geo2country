<?php
namespace GDO\Geo2Country;
use GDO\Core\GDO_Module;
use GDO\Template\GDT_Bar;
use GDO\UI\GDT_Link;

final class Module_Geo2Country extends GDO_Module
{
    public function defaultEnabled() { return false; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/geo2country'); }
    
    public function hookTopBar(GDT_Bar $bar)
    {
        $bar->addField(GDT_Link::make('link_geo2ctry_try_api')->href(href('Geo2Country', 'TryApi')));
    }
    
    public function onIncludeScripts()
    {
        $this->addJavascript('js/g2c-api-ctrl.js');
    }
}
