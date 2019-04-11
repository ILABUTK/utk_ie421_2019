### installation:
### python -m pip install mysql-connector
import mysql.connector

mydb = mysql.connector.connect(
    host="mati.engr.utk.edu",
    user="rzhou7",
    passwd="rzhou7@421",
    database="rzhou7",
    port="33060"
)

mycursor = mydb.cursor()

mycursor.execute("SHOW DATABASES")

for x in mycursor:
  print(x)
