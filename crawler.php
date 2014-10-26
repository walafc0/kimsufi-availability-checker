<?php

$url = "http://ws.ovh.com/dedicated/r2/ws.dispatcher/getAvailability2";
$f = file_get_contents($url);
$a = json_decode($f);
$avail = $a->answer->availability;

foreach($avail as $s)
{
  if($s->reference==='142sk1')	
  {
    $z = $s->zones;
    foreach($z as $zone)
    {
      if($zone->availability!=='unavailable')
      {
        echo $s->reference . " is " . $zone->availability . " in " . $zone->zone . "\n";
?>
<br />
<?php
      }
      else
      {
        echo "Not available in " . $zone->zone ;?><br /><?php
      }
    }
    break;
  }
}
?>
