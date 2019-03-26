### installation:
### python -m pip install mysql-connector
import mysql.connector

mydb = mysql.connector.connect(
    host="mati.engr.utk.edu",
    user="YOURUSERNAME",
    passwd="YOURPASSWORD",
    database="YOURSCHEMA",
    port="33060"
)

mycursor = mydb.cursor()

mycursor.execute("SHOW DATABASES")

for x in mycursor:
  print(x)
