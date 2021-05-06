<?php
namespace GDO\Geo2Country;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;
use GDO\Angular\Module_Angular;
use GDO\Core\Application;

/**
 * Demo site with angular material theme for converting geoposition to country.
 * 
 * @link https://geo2country.gizmore.org
 * 
 * @author gizmore
 * @version 6.10.2
 * @since 6.6.0
 */
final class Module_Geo2Country extends GDO_Module
{
    public $module_priority = 100;
    
	public function isSiteModule() { return true; }
	
	public function getDependencies()
	{
	    return ['CountryCoordinates', 'Material', 'News'];
	}
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/geo2country'); }
    
    public function onInitSidebar()
    {
        GDT_Page::$INSTANCE->topNav->addField(
            GDT_Link::make('link_geo2ctry_try_api')->href(
                href('Geo2Country', 'TryApi')));
    }
    
    public function onIncludeScripts()
    {
        if (module_enabled('Angular'))
        {
            if (Module_Angular::instance()->cfgIncludeScripts() ||
                Application::instance()->hasTheme('material'))
            {
                $this->addJavascript('js/g2c-api-ctrl.js');
            }
        }
    }

}
