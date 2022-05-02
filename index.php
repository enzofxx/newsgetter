<?php

require_once 'DB.php';

?>
<form method="post" action="delfi.php" style="display: inline-block;">
  <input type="submit" name="delfi" value="Pridėti iš Delfi">
</form>

<form method="post" action="15min.php" style="display: inline-block;">
  <input type="submit" name="15min" value="Pridėti iš 15min">
</form>

<form method="post" action="alfa.php" style="display: inline-block;">
  <input type="submit" name="alfa" value="Pridėti iš Alfa">
</form>
<div></div>
<?php

$stmt = $conn->prepare("SELECT * FROM delfi");
$stmt->execute();
$delfi = $stmt->fetchAll();
?>
<div>
<?php
foreach($delfi as $value){
  echo '<div style="display: inline-block; width: 1%;">'.$value['id'].'</div>';
  echo '<div style="display: inline-block; width: 15%; word-break: break-all;">'.$value['title'].'</div>';
  echo '<div style="display: inline-block; width: 20%; word-break: break-all;">'.$value['description'].'</div>';
  echo '<a href="'. $value['link'] .'"style="display: inline-block; width: 25%; word-break: break-all;">'.$value['link'].'</a>';
  echo '<div style="display: inline-block; width: 19%; word-break: break-all;">'.$value['guid'].'</div>';
  echo '<div style="display: inline-block; width: 15%; word-break: break-all;">'.$value['comments'].'</div>';
  echo '<div style="display: inline-block; width: 5%; word-break: break-all;">'.$value['pubDate'].'</div>';
}
?>
</div>




