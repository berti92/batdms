<?php
  include_once 'includes/database.php';
  $search_value = mysql_escape_string($_POST['search_value']);
  $result = mysql_query('SELECT documents.id, documents.document_name, accounts.account_name, document_types.type_name, retention_periods.period_name, documents.document_date, documents.relation FROM documents LEFT JOIN document_types ON document_types.id = documents.document_type_id LEFT JOIN accounts ON accounts.id = documents.account_id LEFT JOIN retention_periods ON retention_periods.id = documents.retention_period_id WHERE documents.deleted_at IS NULL AND (documents.document_name LIKE "%'.$search_value.'%" OR accounts.account_name LIKE "%'.$search_value.'%" OR documents.relation LIKE "%'.$search_value.'%" OR accounts.relation LIKE "%'.$search_value.'%")');
  $result_acc = mysql_query('SELECT accounts.id, accounts.account_name, accounts.relation, account_types.type_name, accounts.street_name, accounts.house_no, accounts.zip, accounts.city_name, countries.country_name FROM accounts LEFT JOIN account_types ON account_types.id = accounts.account_type_id LEFT JOIN countries ON countries.id = accounts.country_id WHERE accounts.deleted_at IS NULL AND (accounts.account_name LIKE "%'.$search_value.'%" OR accounts.relation LIKE "%'.$search_value.'%" OR accounts.city_name LIKE "'.$search_value.'")');
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
      <table id="document_table" class="display">
          <thead>
              <tr>
                  <th>ID</th>
                  <th><?php l('Document.document_name'); ?></th>
                  <th><?php l('Document.relation'); ?></th>
                  <th><?php l('Document.document_type_id'); ?></th>
                  <th><?php l('Document.account_id'); ?></th>
                  <th><?php l('Document.retention_period_id'); ?></th>
                  <th><?php l('Document.document_date'); ?></th>
              </tr>
          </thead>
          <tbody>
            <?php while($row = mysql_fetch_array($result)) { ?>
              <tr>
                  <td><?php echo($row['id']); ?></td>
                  <td><?php echo($row['document_name']); ?></td>
                  <td><?php echo($row['relation']); ?></td>
                  <td><?php echo($row['type_name']); ?></td>
                  <td><?php echo($row['account_name']); ?></td>
                  <td><?php echo($row['period_name']); ?></td>
                  <td><?php echo($row['document_date']); ?></td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
      <?php if($edit==true) { ?>
        <input name="uploads[]" type="file" multiple="multiple"><br/>
      <?php } ?>
    </div>
  </div>
  <div id="account_div" class="panel panel-default">
    <div class="panel-heading"><?php l('Search.accounts'); ?></div>
    <div class="panel-body">
      <table id="account_table" class="display">
          <thead>
              <tr>
                  <th>ID</th>
                  <th><?php l('Account.account_name'); ?></th>
                  <th><?php l('Account.relation'); ?></th>
                  <th><?php l('Account.account_type_id'); ?></th>
                  <th><?php l('Account.city_name'); ?></th>
                  <th><?php l('Account.country_id'); ?></th>
              </tr>
          </thead>
          <tbody>
            <?php while($row = mysql_fetch_array($result_acc)) { ?>
              <tr>
                  <td><?php echo($row['id']); ?></td>
                  <td><?php echo($row['account_name']); ?></td>
                  <td><?php echo($row['relation']); ?></td>
                  <td><?php echo($row['type_name']); ?></td>
                  <td><?php echo($row['city_name']); ?></td>
                  <td><?php echo($row['country_name']); ?></td>
              </tr>
            <?php } ?>
          </tbody>
      </table>
      <?php if($edit==true) { ?>
        <input name="uploads[]" type="file" multiple="multiple"><br/>
      <?php } ?>
    </div>
  </div>

  <script type="text/javascript">
      var document_table = $('#document_table').DataTable({
        searching: false,
        lengthChange: false
      });
      $('#document_table').on( 'click', 'tr', function () {
        window.location = 'document_show.php?id='+document_table.row(this).data()[0];
      });
      var account_table = $('#account_table').DataTable({
        searching: false,
        lengthChange: false
      });
      $('#account_table').on( 'click', 'tr', function () {
        window.location = 'account_show.php?id='+account_table.row(this).data()[0];
      });
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
  </script>
</body>
</html>
