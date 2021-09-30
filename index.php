<html>
<head>
    
     
    <?php include("config.php"); ?>
    
    <?php include("functions.php"); ?>
    <style>
        
        .button {background-color: #e7e7e7; color: black;
        cursor:pointer;
}
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#repeatEvery").change(function(){
		var selected = $(this).val();
		if (selected == '2') {
			$('#repeat_on').show();
		} else {
			$('#repeat_on').hide();
		}
	});
});

function getEventDetails(eventId){
    
    $('#loader').show();
    $.getJSON( "ajax.php?type=getEventDetails&id="+eventId, function( data ) {
       
 
   
      $('#spantitle').html(data.eventName.title);
 
 
     let tablerows='';
     
      $.each(data.datas, function(key,val) {  
          
          
            tablerows +="<tr><td>"+val.eventDate+"</td><td style='width: 100px'>"+val.eventDay+"</td></tr>";  
        }); 
  
            $('#tablefordates').html(tablerows);
            $('#eventcount').html(data.datas.length);
    
        $('#loader').hide();
            
});
     
}


function deleteEvent(eventId){
    
    $.getJSON( "ajax.php?type=deleteEvent&id="+eventId, function( data ) {
   
  
location.reload();


});
     
}
</script>
</head>
    <body>
        
        <form action="" method="post" >
        <table id="TABLE1" language="javascript"  >
		<tr>
	<td colspan="2">
		<strong>Add Event Page</strong>
	</td>
</tr>
			<tr>
	<td>
		 Event Title:
	</td>
	<td>
	<input type="text" name="title" id="title" placeholder="Enter Event Title" required />
	</td>
</tr>
            <tr>
                <td>
                    Start Date:   
                </td>
                <td>
                 	<input type="date" name="startDate" id="startdate" placeholder="yyyy-mm-dd" value=""
        min="1997-01-01" max="2030-12-31"  required/>
                </td>
            </tr>
            
            
			<tr>
                <td>
                    
                </td>
                <td>
                   
                </td>
            </tr>
            <tr>
                <td>Recurrence: 
                </td>
                <td>
                    <label for="Radiobutton2">
						<span style="font-size: 10pt; font-family: Verdana"><b>Repeat Every</b></span>
						<input type="number"  name="numberofreapet" value="1" size="10" style="width: 30px;">
						<select id="repeatEvery" class="textbox-medium" name="repeatEvery" tabindex="10">
							<option selected="selected" value="1">Day</option>
							<option value="2">Week</option>
							<option value="3">Month</option>
							<option value="4">Year</option>
						</select>
					</label>
                </td>
            </tr>
			<tr id="repeat_on" style="display:none;">
                <td> &nbsp;</td>
                <td>
                    <label for="Radiobutton2">
						<span style="font-size: 10pt; font-family: Verdana"><b>Repeat on</b></span>
					</label><br>
					<label>
						<input type="checkbox" class="radio" value="Sun" name="day[]" />Sunday</label><br>
					<label>
						<input type="checkbox" class="radio" value="Mon" name="day[]" />Monday</label><br>
					<label>
						<input type="checkbox" class="radio" value="Tue" name="day[]" />Tuesday</label><br>
					<label>
						<input type="checkbox" class="radio" value="Wed" name="day[]" />Wednesday</label><br>
					<label>
						<input type="checkbox" class="radio" value="Thu" name="day[]" />Thursday</label><br>
					<label>
						<input type="checkbox" class="radio" value="Fri" name="day[]" />Friday</label><br>
					<label>
						<input type="checkbox" class="radio" value="Sat" name="day[]" />Saturday</label>
				</td>
            </tr>
			<tr>
                <td>
                
                </td>
			</tr>
			<tr>
                <td> &nbsp;</td>
                <td>
                    <label for="Radiobutton2">
						<span style="font-size: 10pt; font-family: Verdana"><b>Ends</b></span>
					</label>
					<br>
					<label>
						<input type="radio" class="radio" value="Sun" name="ends" />On</label>
						&nbsp;
						<input type="date" name="endDate" id="enddate"  required/>
					<br>
					<label>
						<input type="radio" class="radio" value="Sun" name="ends" />After </label>
						<input type="number" name="number" value="1" size="10" style="width: 30px;"> Occurrences
				</td>
            </tr>
            
            <tr>
                <td>
                    
                </td>
                <td>
                   
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td><input type="submit" name="submit" value="submit" />                   
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                   
                </td>
            </tr>
			
			<tr>
	<td colspan=2>
		<hr>
	</td>
</tr>
</form>
<tr>
    
    
    <?php 
    
    if(isset($_REQUEST['submit'])){
        
        $title=$_REQUEST['title'];
        $startDate=$_REQUEST['startDate'];
        
        $numberofreapet=$_REQUEST['numberofreapet'];
        
         $repeatEvery=$_REQUEST['repeatEvery'];
        
        $endDate=$_REQUEST['endDate'];
        
        if(isset($_REQUEST['day'])){
            
            $days=implode(",",$_REQUEST['day']);
            
        }else{
           
           $days=0; 
        }
        
        $sql = "INSERT INTO practical_event_list (title, startDate, endDate ,repeatEvery,numberofreapet,status,repeaton)
VALUES ('$title', '".$startDate."','".$endDate."', $repeatEvery,$numberofreapet,1,'".$days."')";

if ($mysqli->query($sql) === TRUE) {
  
  $last_id = $mysqli->insert_id;
  echo "New record created successfully";

        //for daily event
         if($_REQUEST['repeatEvery']=='1'){
             
            $noOfDays= dayDiffrance(strtotime($startDate),strtotime($endDate));
             $i=0;
              for ($x = 0; $x <= $noOfDays; $x++) {
              $i++;
           $NewDate = date('Y-m-d', strtotime($startDate . " +$i days"));
           $eventDay=date("D", strtotime($NewDate));
            
              $sql = "INSERT INTO practical_event_dates (eventId, eventDate, status,eventDay)
VALUES ($last_id, '".$NewDate."',1,'".$eventDay."')";
    
                  $mysqli->query($sql);
              }
         }
         //for weekly events 
         elseif($_REQUEST['repeatEvery']=='2'){ 
             
             
             
             
             
             
         }
         //for monthly events 
         elseif($_REQUEST['repeatEvery']=='3'){
             
             
             
         }
            } else {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
         

     exit; 

 
        ?>
        
        <script>
            location.reload();
            
        </script>
     <?php  
        
    }
    
    
    ?>
	<td colspan="2">
		<strong>Event List Page</strong>
	</td>
</tr>
<tr>
	<td colspan="2">
		<table>
		<tr>
			<td width="20">
				<strong>#</strong>
			</td>
			<td width="150">
				<strong>Title</strong>
			</td>
			<td width="250">
				<strong>Start Date</strong>
			</td>
			<td width="200">
				<strong>Actions</strong>
			</td>
		</tr>
		
		<?php  
		
		
		
		 $query="select id,title,startDate from practical_event_list where status=1";
$result = $mysqli->query($query);
$rows = resultToArray($result);

 $i=0;
		foreach($rows as $data){
		$i++;
		?>
		
		
		<tr>
			<td>
			<?=$i?>
			</td>
			<td>
			 <?=$data['title']?>
			</td>
			<td>
			  <?=$data['startDate']?>
			</td>
			<td>
				<span class="button" onclick="getEventDetails('<?=$data['id']?>')">View</span>
				<span class="button" onclick="deleteEvent('<?=$data['id']?>')">Delete</span>
			</td>
		</tr>
		
		<?php } ?>
	 
		</table>
	</td>
</tr>
<tr>
	<td colspan=2>
		<hr>
	</td>
</tr>
<tr>
	<td colspan="2">
		<strong>Event View Page</strong>
	</td>
</tr>
			<tr>
                <td>
<b>                  Event Title ---</b>  
                 <b id="spantitle"></b>
                </td>
			</tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <table border=1 id="tablefordates">
                        <tr>
                            <td>
                                Date
                            </td>
                            <td style="width: 100px">
                                Day Name
                            </td>
                        </tr>
                        
<img id="loader" style="display:none;" src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif"/>

                    </table>
                    </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                   Total Recurrence Event: <b id="eventcount"></b>
                </td>
            </tr>
        </table>
    
    </body>
</html>