<?php

defined('_JEXEC') or die('Illegal Access');

$url = JUri::base(true);

//JHTML::_('stylesheet', 'reports.css', $url.'modules/'.$module->module.'/assets/');



$outData = '';


if($show != 0){

$link = JRoute::_('index.php?option=com_einsatzkomponente&Itemid='.$mymenuitem.'&view=einsatzbericht&id=' . (int)$frontReports[0]->id); 

$first ='';

$outData = '<a style="color:'.$colorlink.'" href="' .$first . '' . $link . '" target="_self"" >Letzter&nbsp;Einsatz:&nbsp;<b>>'.$frontReports[0]->data1.'&nbsp;-&nbsp;'.$frontReports[0]->summary.'<</b>&nbsp;am&nbsp;'.date('d.m.Y', strtotime($frontReports[0]->date1)).'&nbsp;um'.date(' H:i', strtotime($frontReports[0]->date1)).'&nbsp;Uhr </style></a>';

}



if($first != ''){

	$outData = '<span style="color:'.$colorlink.';">'.$first.'</style></span>';	

} else {

	$outData = $outData;

}

  

echo '<marquee bgcolor='.$bgcolor.' scrollamount='.$scrollamount.' width='.$width.' height='.$height.' first='.$first.'  link='.$link.'> '.$outData.'</marquee>';

//print_r ($frontReports[0]);
