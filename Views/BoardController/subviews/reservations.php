<?php 
$table = '';

if($resevations != null){
  foreach($resevations as $res)
  {
    $from = $res['from'];
    $to = $res['to'];
    $standard = $res['standard'];
    $table .= <<<HTML
            <div class="reservation">
                <table>
                <tr>
                  <th>Since:</th>
                  <th>To:</th>
                  <th>Standard:</th>
                  <th>Status:</th>
                </tr>
                <tr>
                  <th>$from</th>
                  <th>$to</th>
                  <th>$standard</th>
                  <th>dummy status</th>
                </tr>    
                </table>
            </div>
HTML;
  }
}
else
{
  $table = '<div class="reservation"> You dont have any reservations </div>';
}

?>
    
<?php echo $table ?>
<div class="reservation button"><a href="/?page=reservation">BOOK ONLINE</a></div>
