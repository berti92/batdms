<?php
  function convDate($originalDate) {
    return date("d.m.Y", strtotime($originalDate));
  }
  function convInputDate($originalDate) {
    return date("Y-m-d", strtotime($originalDate));
  }
?>