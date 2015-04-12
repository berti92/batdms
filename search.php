<?php
  include_once 'includes/database.php';
  include_once 'includes/functions.php';
  $search_value = mysql_escape_string($_POST['search_value']);
  $result = mysql_query('SELECT documents.id, documents.document_name, accounts.account_name, document_types.type_name, retention_periods.period_name, documents.document_date, documents.relation FROM documents LEFT JOIN document_types ON document_types.id = documents.document_type_id LEFT JOIN accounts ON accounts.id = documents.account_id LEFT JOIN retention_periods ON retention_periods.id = documents.retention_period_id WHERE documents.deleted_at IS NULL AND (documents.document_name LIKE "%'.$search_value.'%" OR accounts.account_name LIKE "%'.$search_value.'%" OR documents.relation LIKE "%'.$search_value.'%" OR accounts.relation LIKE "%'.$search_value.'%")');
  $result_acc = mysql_query('SELECT accounts.id, accounts.account_name, accounts.relation, account_types.type_name, accounts.street_name, accounts.house_no, accounts.zip, accounts.city_name, countries.country_name FROM accounts LEFT JOIN account_types ON account_types.id = accounts.account_type_id LEFT JOIN countries ON countries.id = accounts.country_id WHERE accounts.deleted_at IS NULL AND (accounts.account_name LIKE "%'.$search_value.'%" OR accounts.relation LIKE "%'.$search_value.'%" OR accounts.city_name LIKE "'.$search_value.'")');
  $table_id_account = 'account_list_table';
  $table_id_document = 'document_list_table';
?>
<!doctype html>
<html>
<?php include('page/header.php'); ?>
<body>
  <?php include('page/navbar.php') ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <table>
        <tr>
          <td style="padding:10px;"><label><?php l('Search.show_accounts'); ?>&nbsp;</label><input id="show_accounts_chk" onclick="refresh_divs();" type="checkbox" name="show_accounts" checked></td>
          <td style="padding:10px;"><label><?php l('Search.show_documents'); ?>&nbsp;</label><input id="show_documents_chk" onclick="refresh_divs();" type="checkbox" name="show_documents" checked></td>
        </tr>
      </table>
    </div>
  </div>
  <div id="document_div" class="panel panel-default">
    <div class="panel-heading"><?php l('Search.documents'); ?></div>
    <div class="panel-body">
      <table id="<?php echo($table_id_document); ?>" cellspacing="0" width="100%"></table>
    </div>
  </div>
  <div id="account_div" class="panel panel-default">
    <div class="panel-heading"><?php l('Search.accounts'); ?></div>
    <div class="panel-body">
      <table id="<?php echo($table_id_account); ?>" cellspacing="0" width="100%"></table>
    </div>
  </div>

  <script type="text/javascript">
      function refresh_divs() {
        if($('#show_accounts_chk').prop('checked') == true) {
          $('#account_div').fadeIn();
        } else {
          $('#account_div').fadeOut();
        }
        if($('#show_documents_chk').prop('checked') == true) {
          $('#document_div').fadeIn();
        } else {
          $('#document_div').fadeOut();
        }
      }
      $('#<?php echo($table_id_account); ?>').dataTable(
        {
          "processing": true,
          "serverSide": true,
          "searching": false,
          "ajax": "_account_list_search.php?search_value=<?php echo($search_value); ?>",
          "columns": [
            {"data":"action", "title":"", "orderable": false},
            {"data":"id", "title":"ID"},
            {"data":"account_name", "title": "<?php l('Account.account_name'); ?>"},
            {"data":"relation", "title": "<?php l('Account.relation'); ?>"},
            {"data":"type_name", "title": "<?php l('Account.account_type_id'); ?>"},
            {"data":"city_name", "title": "<?php l('Account.city_name'); ?>"},
            {"data":"country_name", "title": "<?php l('Account.country_id'); ?>"}
          ],
          "order": [[1, 'asc']]
          <?php if(get_current_lang() == 2) { ?>
            , "language": {"url": "/js/DataTables-1.10.5/DE.json" }
          <?php } ?>
        }
      );
      $('#<?php echo($table_id_document); ?>').dataTable(
        {
          "processing": true,
          "serverSide": true,
          "searching": false,
          "ajax": "_document_list_search.php?search_value=<?php echo($search_value); ?>",
          "columns": [
            {"data":"action", "title":"", "orderable": false},
            {"data":"id", "title":"ID"},
            {"data":"document_name", "title": "<?php l('Document.document_name'); ?>"},
            {"data":"type_name", "title": "<?php l('Document.document_type_id'); ?>"},
            {"data":"account_name", "title": "<?php l('Document.account_id'); ?>"},
            {"data":"relation", "title": "<?php l('Document.relation'); ?>"},
            {"data":"document_date", "title": "<?php l('Document.document_date'); ?>"},
          ],
          "order": [[1, 'asc']]
          <?php if(get_current_lang() == 2) { ?>
            , "language": {"url": "/js/DataTables-1.10.5/DE.json" }
          <?php } ?>
        }
      );
  </script>
</body>
</html>
