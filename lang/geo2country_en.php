<?php
return array(
'link_geo2ctry_try_api' => 'Try the API',
'btn_your_location' => 'Try your own detected location',
'pick_position' => 'Pick a location',
'btn_picked_location' => 'Try your picked location',
'geoapi_link_example' => 'Example API call',
'geoapi_info_title' => 'Geo2Country API',
'geoapi_info_text' => '
This is the tryout page for the public Geo2Country API.<br/>
You can click %s for a sample call, which should result in &quot;de&quot; being detected.<br/>
You can also try to detect your country via your own geoposition or pick a maps position to tryout.
',
'geoapi_coming_soon' => '
<b>Future plans</b>: Also offer country information api.<br/>
<br/>
<b>How it works</b>: I took https://github.com/mledoze/countries and build enclosing rectangles first.<br/>
&nbsp;&nbsp;&nbsp;The possible matching countries are then checked against their polygons.
',
);
