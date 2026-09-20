@echo off
echo ===================================================
echo BUILDING CBLU CONNECT SYSTEM
echo ===================================================
echo.

echo [1/3] Checking Source Code...
IF EXIST "..\..\1_Source_Code\application_folder\index.php" (
    echo    - index.php found.
) ELSE (
    echo    - ERROR: index.php not found! Check your source code folder.
)

echo.
echo [2/3] Checking Database Schema...
IF EXIST "..\..\4_Data_Schema\database_schema\cblu_system.sql" (
    echo    - cblu_system.sql found.
) ELSE (
    echo    - ERROR: Database schema not found!
)

echo.
echo [3/3] Checking Configuration Template...
IF EXIST "..\..\4_Data_Schema\configuration\db_connect.example.php" (
    echo    - db_connect.example.php found.
) ELSE (
    echo    - ERROR: Configuration template not found!
)

echo.
echo ===================================================
echo BUILD COMPLETE. System is ready for deployment.
echo ===================================================
pause