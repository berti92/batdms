<?php
  function gender($g) {
    $g = intval($g);

    if($g===1) {
	  return "Männlich";
	} else if($g===2) {
	  return "Weiblich";
	} else {
      return "";
	}
  }
?>