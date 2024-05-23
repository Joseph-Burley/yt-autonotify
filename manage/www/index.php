<!DOCTYPE html>
<html>
<head>
  <script src="functions.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Settings</h2>

<?php

$db = new SQLite3('data/yt-notify.db');

$result = $db->query("SELECT * FROM settings;");

echo "<form name='settings' action='javascript:update_settings()' method='post' autocomplete='off'>
<table>
<tr>
<th>Delete</th>
<th>Key</th>
<th>Value</th>
<th>New Value</th>
</tr>";

while($row = $result->fetchArray(SQLITE3_ASSOC)) {
  echo "<tr>
  <td><input type='checkbox' name=" . 'delete_' . $row['key'] . " value='" . $row['key'] . "'></td>
  <td>" . $row['key'] . "</td>
  <td>" . $row['value'] . "</td>
  <td><input type='text' name=". 'update_' . $row['key'] ." value=''></td>
  </tr>";
}

echo "</table>";
echo "<label for='new_key'>Key: </label>";
echo "<input typt='text' name='new_key' value=''>";
echo "<label for='new_value'>Value: </label>";
echo "<input type='text' name='new_value' value=''>";
echo "<br>";
echo "<input type='submit' value='Delete/Update'>";
echo "</form>";

?>

<h2>Channels</h2>

<?php

$result = $db->query("SELECT * FROM channels;");

echo "<form name='channels' action='javascript:update_channels()' method='post' autocomplete='off'>";
echo "<table>
<tr>
<th>Delete</th>
<th>ID</th>
<th>Name</th>
<th>New Name</th>
</tr>";

while($row = $result->fetchArray(SQLITE3_ASSOC)) {
  echo "<tr>
  <td><input type='checkbox' name=" . 'deletechannel_' . $row['id'] . " value='" . $row['id'] . "'></td>
  <td>" . $row['id'] . "</td>
  <td>" . $row['name'] . "</td>
  <td><input type='text' name=". 'updatechannel_' . $row['id'] ." value=''></td>
  </tr>";
}

echo "</table>";
echo "<label for='new_channel_id'>ID: </label>";
echo "<input type='text' name='new_channel_id' value=''>";
echo "<label for='new_channel_name'>Name: </label>";
echo "<input typt='text' name='new_channel_name' value=''>";
echo "<br>";
echo "<input type='submit' value='Delete/Update'>";
echo "</form>";

?>

<h2>Videos seen</h2>

<?php

$result = $db->query("SELECT * FROM videos;");

echo "<table>
<tr>
<th>Video ID</th>
<th>Channel</th>
</tr>";

while($row = $result->fetchArray(SQLITE3_ASSOC)) {
  echo "<tr>
  <td>" . $row['id'] . "</td>
  <td>" . $row['channel'] . "</td>
  </tr>";
}

echo "</table>";

$db->close();

?>

</body>
</html>
