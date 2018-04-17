<?php
$con=mysqli_connect('localhost','root','','php_gangster');
$fetch=$_POST['fetch'];

$c_res=mysqli_query($con,"select count(id) as count_row from godaddy ");
$c_fetch=mysqli_fetch_array($c_res);

if(is_numeric($fetch)){
 $result=mysqli_query($con,"select * from godaddy limit $fetch ");
} else if($fetch=='empty') {
 $result=mysqli_query($con,"select * from godaddy order by id  limit 5 ");
}else if(!empty($fetch)){
	
$result=mysqli_query($con,"SELECT * FROM `godaddy` WHERE (id like '%$fetch%' or domain_name like '%$fetch%' or expires like '%$fetch%' or status like '%$fetch%') ");
	}else{
		$result=mysqli_query($con,"select * from godaddy order by id  limit 0 ");
	}

	
?>


























<table class="table">
<thead><tr><th>ID</th><th>Domain Name</th><th>Expiry</th></tr></thead>
<tbody>
<?php if(($num=mysqli_num_rows($result))>0){  ?>
	<?php 
	
	
	while($row=mysqli_fetch_array($result)){ ?>
	<tr>
	<td><?php echo $row['id']; ?></td>
	<td><?php echo $row['domain_name']; ?></td>
	<td><?php echo $row['expires']; ?></td>
	</tr>
<?php } }else{ ?>
<tr><td colspan="3">No Data Found</td></tr>

<?php } ?>
</tbody>
</table> 
showing <?php if($num==0){ echo "0"; }else{ echo "1"; } ?> to <?php echo $num; ?> of <?php echo $c_fetch['count_row']; ?> entries



					<ul class="pagination" style="float:right">
                                    <li class="disabled">
                                        <a href="javascript:void(0);">
                                            <i class="material-icons">chevron_left</i>
                                        </a>
                                    </li>
									
                                    <li class="active"><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect">2</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect">3</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect">4</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect">5</a></li>
									
                                    <li>
                                        <a href="javascript:void(0);" class="waves-effect">
                                            <i class="material-icons">chevron_right</i>
                                        </a>
                                    </li>
                                </ul>
