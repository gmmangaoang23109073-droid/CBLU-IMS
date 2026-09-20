# Deployment Notes
For local deployment on another computer:
1. Ensure XAMPP is installed and running (Apache and MySQL).
2. Copy the `1_Source_Code/application_folder` contents to `C:\xampp\htdocs\cblu_connect`.
3. Copy the `4_Data_Schema/configuration/db_connect.example.php` to `C:\xampp\htdocs\cblu_connect\db_connect.php` and update credentials.
4. Run `setup_database.php` in your browser to automatically create the database and import the SQL schema.
5. Access the portal at `http://localhost/cblu_connect/`.
