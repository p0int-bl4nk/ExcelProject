<?php
  session_start();
/*
* SESSION variables are used to access uploaded file names.
*/
  require 'SimpleXLSX.php';                                       //Php class file to handle excel sheets. GitHub: https://github.com/shuchkin/simplexlsx/blob/master/src/SimpleXLSX.php

  if ( $xlsx_S = SimpleXLSX::parse($_SESSION['file1']) ) {        //Create a Source excel file object
      $headersSOURCE = $xlsx_S->rows()[0];                        //Create an array and store first row of the excel sheet i.e., the header row
   } else {
     echo SimpleXLSX::parseError();
   }

  $xlsx_T = SimpleXLSX::parse($_SESSION['file2']);                //Create a Target excel file object
  $headersTARGET = $xlsx_T->rows()[0];                            //Create an array and store first row of the excel sheet i.e., the header row

?>


<!DOCTYPE html>
<html >
<head>
	<title>Set Fields</title>
	<style>
		table{
      width: 60%;
			border: 1px solid midnightBlue;
			border-collapse: collapse;
		}

		td, th{
        width: 30%;
        padding: 5px;
        text-align: center;
		  	border: 1px solid midnightBlue;
		}

		html {
		    height: 100%;
		}
		body {
		    height: 100%;
		    margin: 0;
		    background-repeat: no-repeat;
		    background-attachment: fixed;
				background-color: lightCyan;
		}
    .center {
        margin-left: auto;
        margin-right: auto;
    }

	</style>
</head>
<body>

<form action="action.php" method="post" onSubmit="if(!confirm('WARNING: Incorrect input will be discarded! Proceed with the selected columns?')){return false;}">
	<fieldset>
	<legend>Set Fields:</legend>
	<table class="center">
	<tbody>
	<tr>
		<th><label for="I_Fields">Input File Fields</label></th>
		<th><label for="O_Fields">Output File Fields</label></th>
	</tr>
	<?php
    foreach($headersSOURCE as $valueS) {
  	echo "<tr><td>"
			.$valueS.                                                  //list source file headers
  		"</td>

  		<td>";
   		echo '<input list="Output File Fields" name="'.$valueS.'" style="width: 60%;" placeholder="None">
  		      <datalist id="Output File Fields">';
            foreach ($headersTARGET as $valueT) {
  			       echo '<option value="'.$valueT.'">';}            //datalist of target file headers for each source file header
  		echo "</datalist>
		    </td>
	   </tr>";  }?>
  	</tbody>
  	</table>
  	<br>
    <div style="text-align: center;">
      <input type="submit" value="Submit Selection" style="width: 300px; margin: 0 auto;">
    </div>
  	</fieldset>
</form>


</body>
</html>
