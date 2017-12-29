<?php

//determine current month
$date = date('Y-m-d');
echo $date;

//grab current month's schedule
$source = 
$page = new DOMDocument(); //an HTML/XML document

// It's rare you'll have valid XHTML, suppress any errors- it'll do its best.
@$page->loadhtml($source);

$xpath = new DOMXPath($page);


/*
// Modify the XPath query to match the content
foreach($xpath->query('//table')->item(0)->getElementsByTagName('tr') as $rows) {
  $cells = $rows->getElementsByTagName('td');
  
  // Do stuff with the data
  echo $cells->item(0)->textContent;
  echo $cells->item(1)->textContent;
  echo $cells->item(2)->textContent;
  ...
}
*/
