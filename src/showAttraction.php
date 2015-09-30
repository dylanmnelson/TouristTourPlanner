<?php
////if we are search attraction
///function showAttraction(){
            echo '<form action="?" method="post">';
			echo '<tbody>
					<tr>
					<td></td>
					<td><h4>Attractions</h4></td>
					<td></td>
					</tr>
					<tr></tr>';
					
$attraction = $_SESSION['attraction'];
	if ($attraction) {
		$items = explode(',',$attraction);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $address) {
			         echo '<tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>'.$address.'
						</td>';
					echo	'<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range4.value=value">
								<output id="range4">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>';
		}
	}	
					
				echo	 ' <tr>
					<td></td>
					<td><h4>Hotels</h4></td>
					<td></td>
					</tr>
					<tr></tr>';
					
					
////show hotel
$hotel = $_SESSION['hotel'];
	if ($hotel) {
		$items = explode(',',$hotel);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $address) {
			 echo '<tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>'.$address.'
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range4.value=value">
								<output id="range4">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>';

			
		}
	}
					
				echo	 '  <tr>
					<td></td>
					<td><h4>Restaurant</h4></td>
					<td></td>
					</tr>
					<tr></tr>';
					////show resturant



$resturant = $_SESSION['resturant'];
	if ($resturant) {
		$items = explode(',',$resturant);
		$contents = array();
		foreach ($contents as $address) {
			echo '<tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>'.$address.'
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range4.value=value">
								<output id="range4">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>';

			
		}	
	}
					
				echo	 '</tbody>';
				echo '<input type="submit" value="show My Trip" />';

///}











		
?>