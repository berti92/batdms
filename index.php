<?php
  include_once 'includes/database.php';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <div id="event_div"></div>
  <script type="text/javascript">
    load_panel('event_div', '_event_panel.php', {});
    function delete_event(id) {
      $.get('event_delete.php?id='+id, function(value){
        load_panel('event_div', '_event_panel.php', {});
      });
    }
    function delete_document_event(id, doc_id) {
      $.get('event_delete.php?id='+id, function(value){
        load_panel('event_div', '_event_panel.php', {});
      });
      $.get('document_delete.php?id='+doc_id);
    }
  </script>
</body>
</html>
