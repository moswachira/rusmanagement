<?php
$proflie = array(
    array('วงศธร' , 'ด้วงนิล' , 22 ),
    array('วชิระ' , 'ขันคำ' , 21 ),
    array('ริสา' , 'เบ็ญมูซา' , 21 ),
    array('เยาวเรศ' , 'วงศ์สามารถ' , 21 ),
    array('พิชชาพร' , 'ทองคลัง' , 21 )
);

echo '<table border="5" width="500" align="center">';
echo '<tr><th>#</th><th>fristname</th><th>lastname</th><th>Age</th></tr>';
foreach( $proflie as $key=>$proflies )
{
    echo '<tr>';
    echo '<td>'.($key+1).'</td>';
    foreach( $proflies as $value )
    {
        echo '<td>'.$value.'</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
