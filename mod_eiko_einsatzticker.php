 <?php
defined('_JEXEC') or die('Illegal Access');
$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$width = $params->get('width', '');
$height = $params->get('height', '');
$show = $params->get('show', '');
$link = $params->get('links', '');
$first = $params->get('first', '');
$scrollamount = $params->get('scrollamount', '');
$colorlink = $params->get('colorlink', 'ff0000');
$bgcolor = $params->get ('bgcolor','ffffff');
$menuStyle = $params->get('menu_style', 'block');
$menuCount = 1;
$menuNone = $params->get('menu_none', 'No Reports Found');
$feuerwehr = $params->get('feuerwehr', 'XY');
$frontReports = getEinsatzbericht($menuCount);
$mymenuitem = $params->get('mymenuitem', '');
require JModuleHelper::getLayoutPath('mod_eiko_einsatzticker', $params->get('layout', 'default'));
function getEinsatzbericht($count = 1)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT r.id,r.image as foto,rd.marker,r.address,r.summary,r.auswahlorga,r.desc,r.date1,r.data1,r.counter,r.alerting,r.presse,re.image,rd.list_icon,r.auswahlorga,r.state,rd.title as einsatzart FROM #__eiko_einsatzberichte r JOIN #__eiko_einsatzarten rd ON r.data1 = rd.id LEFT JOIN #__eiko_alarmierungsarten re ON re.id = r.alerting WHERE r.state = "1" and rd.state = "1" and re.state = "1" ORDER BY r.date1 DESC LIMIT '.$count.' ' ;
		$db	= JFactory::getDBO();
		$db->setQuery( $query );
		$result = $db->loadObjectList();
		$fpReports = $result;

		$db->setQUery($query);
		$fpReports = $db->loadObjectList();
		return $fpReports;
	}
?>
