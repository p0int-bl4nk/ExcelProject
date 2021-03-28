<?php
session_start();
  require 'SimpleXLSX.php';

  $xlsx_S = SimpleXLSX::parse($_SESSION['file1']);
  $headersSOURCE = $xlsx_S->rows()[0];

  $xlsx_T = SimpleXLSX::parse($_SESSION['file2']);
  $headersTARGET = $xlsx_T->rows()[0];

  $sourceIndex = array();
  $targetIndex = array();

    foreach ($headersSOURCE as $key_S => $value_S) {
      if (empty($_POST["$value_S"])) {
        continue;
      }
      $sourceIndex []= $key_S+1;

      foreach ($headersTARGET as $key_T => $value_T) {
        if (!strcmp($value_T, $_POST["$value_S"])) {
          $targetIndex []= $key_T+1;
        }
      }
    }

    function GetExcelColumnName($columnNumber) {
      $columnName = '';
      while ($columnNumber > 0) {
        $modulo = ($columnNumber - 1) % 26;
        $columnName = chr(65 + $modulo) . $columnName;
        $columnNumber = (int)(($columnNumber - $modulo) / 26);
      }
      return $columnName;
    }

    $S_sheetName = $xlsx_S->sheetNames()[0];
    $T_sheetName = $xlsx_T->sheetNames()[0];

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VBA Code</title>
    <style type="text/css">
            dummydeclaration { padding-left: 4em; } /* Firefox ignores first declaration for some reason */
            tab1 { padding-left: 4em; }
            tab2 { padding-left: 8em; }
            tab3 { padding-left: 12em; }
            tab4 { padding-left: 16em; }
            tab5 { padding-left: 20em; }
            tab6 { padding-left: 24em; }
            tab7 { padding-left: 28em; }
            tab8 { padding-left: 32em; }
            tab9 { padding-left: 36em; }
            tab10 { padding-left: 40em; }
            tab11 { padding-left: 44em; }
            tab12 { padding-left: 48em; }
            tab13 { padding-left: 52em; }
            tab14 { padding-left: 56em; }
            tab15 { padding-left: 60em; }
            tab16 { padding-left: 64em; }

    </style>
  </head>
  <body>
    <div>
      <p>Sub CopyColumns()</p>
      <p><tab1>Dim Source As Worksheet, Target As Worksheet, TargetH As Worksheet</tab1></p>
      <p><strong>'Make sure the the filenames and sheetnames are correct, otherwise You will get an<br>'error!</strong></p>
      <p><strong>'Source is the excel file from where you want to transfer data.</strong></p>
      <p><tab1>Set Source = Workbooks("<?php echo $_SESSION['file1']; ?>").Worksheets("<?php echo "$S_sheetName"; ?>")</tab1></p><br>
      <p><strong>'Target is an empty Excel file, where you will get your desired data.</strong></p>
      <p><tab1>Set Target = Workbooks("Book1.xlsx").Worksheets("Sheet1")</tab1></p><br>
      <p><strong>'TargetH is the excel sheet where the final excel sheet's headers are.</strong></p>
      <p><tab1>Set SourceH = Workbooks("<?php echo $_SESSION['file2']; ?>").Worksheets("<?php echo "$T_sheetName"; ?>")</tab1></p>
      <br>
      <?php
        for ($i=0; $i < count($sourceIndex); $i++) {
          echo '<p><tab1>Source.Range("'.GetExcelColumnName($sourceIndex[$i]).'1").EntireColumn.Copy Destination:=Target.Range("'.GetExcelColumnName($targetIndex[$i]).'1").EntireColumn</tab2></p>';
        }
      ?>
      <p><tab1>SourceH.Range("A1").EntireRow.Copy Destination:=Target.Range("A1").EntireRow</tab1></p>
      <p><strong>'Following code was tested on Excel 2019, it may not work perfectly on previous versions.<br>
        'If an error occurs, comment the below "With ... End With" section using single quotes('),<br>
        'the way this message is commented. Or else you could simply delete that code portion.</strong></p>
      <p><tab1>With Target</tab1></p>
      <p><tab2>.Activate</tab2></p>
      <p><tab2>.Cells.Select</tab2></p>
      <p><tab2>.Application.CutCopyMode = False</tab2></p>
      <p><tab2>.ListObjects.Add(xlSrcRange, Range("$1:$1048576"), , xlYes).Name = "Table2"</tab2></p>
      <p><tab2>.Activate</tab2></p>
      <p><tab2>.Cells.Select</tab2></p>
      <p><tab2>.ListObjects("Table2").TableStyle = "TableStyleLight9"</tab2></p>
      <p><tab2>.ListObjects("Table2").ShowAutoFilterDropDown = False</tab2></p>
      <p><tab1>End With</tab1></p>

      <p>End Sub</p>

    </div>
  </body>
</html>

<?php
  unlink($_SESSION['file1']);
  unlink($_SESSION['file2']);
  session_unset();
  session_destroy();
 ?>
