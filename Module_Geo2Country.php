<?php
namespace GDO\Geo2Country;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;

/**
 * Demo site for converting geoposition to country.
 * @author gizmore
 * @version 6.10
 * @since 6.06
 */
final class Module_Geo2Country extends GDO_Module
{
	public function isSiteModule() { return true; }
	
	public function getDependencies() { return ['CountryCoordinates', 'Material', 'News']; }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/geo2country'); }
    
    public function onInitSidebar()
    {
        GDT_Page::$INSTANCE->topNav->addField(
            GDT_Link::make('link_geo2ctry_try_api')->href(href('Geo2Country', 'TryApi')));
    }
    
    public function onIncludeScripts()
    {
        if (module_enabled('Angular'))
        {
            $this->addJavascript('js/g2c-api-ctrl.js');
        }
    }
}
