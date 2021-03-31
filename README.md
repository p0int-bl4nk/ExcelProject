# ExcelProject
The problem was to transfer some columns of data from one excel sheet to specific columns of another excel sheet.
This project helps to do that little bit more conveniently.

Let's say that I have a source excel sheet, that has following columns:
  1. Name
  2. Father_Name
  3. Mother_Name
  4. Roll_Number
 
 and another sheet which has:
  1. University
  2. StudentName
  3. MotherName
  4. FatherName
  5. RollNum
  6. ApplicationNum
  
 I want to transfer entire 'Name' column data to 'StudentName', 'Father_Name' to 'FatherName', 'Mother_Name' to 'MotherName', and
 'Roll_Number' to 'RollNum'.
 
 Ofcourse it can be done by copy/paste in Excel itself, but in my case I have 200+ columns to transfer into 200+ columns of another
 sheet which itself has 800+ colummns.

So this project takes two excel sheet 'source' and 'target', reads their column headers and presents a table where for each source
column we have a list of columns from target file. After user is done doing selection and hits submit button, he/she is presented a 
VBA code which the user has to run in Excel VB Editor. And that's it.

I ran these files in Xampp, php 8.0.3 and the VB Code on Excel 2019.

IMPORTANT NOTE:
1. This project doesn't actually transfer data from Source.xlsx to Target.xlsx, instead columns headers are taken from Target.xlsx and column data from Source.xlsx and then        everything is pasted on an empty excel file. We can say Target.xlsx is used as a template.
2. Before running the VB Code, there must be 3 Excel files open, the two uploaded excel files, and an empty excel file(where the data will actually go).
3. All three files must be in the same folder. If they are not then you must specify their full path.
   For example: If Source.xlsx is in C:\Files and Target.xlsx is in C:\Files2. Then following must be done,
   1. Set Source = Workbooks("C:\Files\Source.xlsx").Worksheets("Sheet1")
   2. Set Source = Workbooks("C:\Files2\Target.xlsx").Worksheets("Sheet1")

4. The "With Target ... End With" block of code is not essential. It's used to apply a table style. And this block actually produced an error in Excel 2007 so that might be the    case for other Excel versions other than Excel 2019.
5. If a 'Subscript' error occurs it's probably because:
    1. File names and/or Sheetnames are incorrect.
    2. Files may not be in the same folder or the specified path is wrong.

