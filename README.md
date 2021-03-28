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
1. Before running the VB Code, there must be 3 Excel files open, Source.xlsx, TargetWithHeaders.xlsx, and an empty excel sheet(where the data will actually go).
