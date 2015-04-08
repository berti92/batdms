<?php
  include_once 'includes/database.php';
  function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
  }

  function country_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM countries ORDER BY country_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker" data-live-search="true">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['country_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }

  function account_type_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM account_types ORDER BY type_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['type_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }

  function account_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM accounts ORDER BY account_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['account_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }

  function document_type_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM document_types ORDER BY type_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['type_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }

  function relation_type_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM relation_types ORDER BY type_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['type_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }

  function retention_period_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM retention_periods ORDER BY period_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['period_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }
  function language_select($name, $val = null) {
    $result = mysql_query('SELECT * FROM languages ORDER BY language_name ASC');
    $output = '<select name="'.$name.'" class="selectpicker">';
    while($row = mysql_fetch_array($result)) {
      $sel = '';
      if(!empty($val) && $val == $row['id']) {
        $sel = 'selected';
      }
      $output .= '<option value="'.$row['id'].'" '.$sel.'>'.$row['language_name'].'</option>';
    }
    $output .= '</select>';
    return($output);
  }
  function get_current_lang() {
    $res = mysql_query('SELECT setting_value FROM user_settings WHERE user_id = '.$_SESSION['user_id'].' AND setting_key = "language_id" LIMIT 1');
    $lang = mysql_fetch_assoc($res);
    return $lang['setting_value'];
  }
  function l($key) {
    $res = mysql_query('SELECT label_value FROM labels WHERE language_id = '.get_current_lang().' AND label_key = "'.$key.'" LIMIT 1');
    $lbl = mysql_fetch_assoc($res);
    if(empty($lbl['label_value'])) {
      echo $key;
    } else {
      echo $lbl['label_value'];
    }
  }
  function lr($key) {
    $res = mysql_query('SELECT label_value FROM labels WHERE language_id = '.get_current_lang().' AND label_key = "'.$key.'" LIMIT 1');
    $lbl = mysql_fetch_assoc($res);
    if(empty($lbl['label_value'])) {
      return $key;
    } else {
      return $lbl['label_value'];
    }
  }
  function bool_to_text($val) {
    if((bool) $val) {
      $ret = lr('App.true');
    } else {
      $ret = lr('App.false');
    }
    return $ret;
  }
?>
