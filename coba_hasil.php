
<form action="" method="POST" id="formid">
<?php
for ($i=0; $i < 3; $i++) {
    for ($j=0; $j < 3; $j++) {
 ?>
    <select class="btn-secondary" name="selectid[]">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <?php } }?>
    
</form>

<input type="submit" name="submit" form="formid" value="Submit">

<br>

<?php
if (isset($_POST['submit'])) {
    $selectid = $_POST['selectid'];
    // Here you can access every Select 
    // [0] -> 1st select , [1]-> 2nd select....
    foreach($selectid as $id){
        echo "$id <br>";
     }
  }
 ?>

