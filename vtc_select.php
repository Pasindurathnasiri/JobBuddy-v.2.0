<?php  
 $connect = mysqli_connect("localhost", "root", "", "jobbuddy");  
 $output = '';  
 $sql = "SELECT * FROM vtcenters ORDER BY vtcRegID DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Register No.</th>  
                     <th width="20%">Name of the Center</th>
                     <th width="10%">Email</th>
                     <th width="10%">District</th>
                     <th width="20%">Address</th>
                     <th width="10%">Name of Director</th>
                     <th width="10%">Contact No</th>
                     <th width="10%">Action</th>
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM vtcenters LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                <td>'.$row["vtcRegID"].'</td>
                <td class="vtc_name" data_id1="'.$row["vtcRegID"].'" 
                contenteditable>'.$row["vtcName"].'</td>
                <td class="email" data_id2="'.$row["vtcRegID"].'" 
                contenteditable>'.$row["vtc_Email"].'</td>
                <td class="district" data_id3="'.$row["vtcRegID"].'" 
                contenteditable>'.$row["district"].'</td>
                <td class="address" data_id4="'.$row["vtcRegID"].'" 
                contenteditable>'.$row["vtcAddress"].'</td>
                <td class="dir_fullName" data_id5="'.$row["vtcRegID"].'" 
                contenteditable>'.$row["dir_fullName"].'</td>
                <td class="contact_no" data_id6="'.$row["vtcRegID"].'" 
                contenteditable>'.$row["contact_No"].'</td>
                <td><button name="btn_delete" id="btn_delete" 
                data_id8="'.$row["vtcRegID"].'">X</button></td>
                  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                 <td id="vtc_name" contenteditable></td>
                 <td id="email" contenteditable></td>
                 <td id="district" contenteditable></td>
                 <td id="address" contenteditable></td>
                 <td id="dir_fullName" contenteditable></td>
                 <td id="contact_no" contenteditable></td>
                 
                
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					 <td colspan="4">Data Not Found</td>
                     <td id="vtc_name" contenteditable></td>
                     <td id="email" contenteditable></td>
                     <td id="district" contenteditable></td>
                     <td id="address" contenteditable></td>
                     <td id="dir_fullName" contenteditable></td>
                     <td id="contact_no" contenteditable></td>
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>