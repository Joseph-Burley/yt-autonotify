<!DOCTYPE html>
<html>
<head>
  <script src="functions.js"></script>
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

/*
echo "<table>
<tr>
<th>Key</th>
<th>Value</th>
</tr>";

while($row = $result->fetchArray(SQLITE3_ASSOC)) {
  echo "<tr>
  <td>" . $row['key'] . "</td>
  <td>" . $row['value'] . "</td>
  </tr>";
}

echo "</table>";
*/
?>

<h2>Channels</h2>

<?php

$result = $db->query("SELECT * FROM channels;");

echo "<table>
<tr>
<th>Name</th>
<th>ID</th>
</tr>";

while($row = $result->fetchArray(SQLITE3_ASSOC)) {
  echo "<tr>
  <td>" . $row['name'] . "</td>
  <td>" . $row['id'] . "</td>
  </tr>";
}

echo "</table>";

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
