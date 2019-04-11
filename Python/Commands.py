import mysql.connector

mydb = mysql.connector.connect(
  host="mati.engr.utk.edu",
  user="rzhou7",
  passwd="PASSWORD",
  database="rzhou7",
  port="33060"
)

mycursor = mydb.cursor()


## create if not exists
mycursor.execute("CREATE TABLE if not exists customers (name VARCHAR(255), address VARCHAR(255))")

mycursor.execute("SHOW TABLES")

for x in mycursor:
  print(x)
###

# ## insert one record
# sql = "INSERT INTO customers (name, address) VALUES (%s, %s)"
# val = ("John", "Highway 21")
# mycursor.execute(sql, val)

# mydb.commit()

# print(mycursor.rowcount, "record inserted.")
# ###

# ## add lots
# sql = "INSERT INTO customers (name, address) VALUES (%s, %s)"
# val = [
#     ('Peter', 'Lowstreet 4'),
#     ('Amy', 'Apple st 652'),
#     ('Hannah', 'Mountain 21'),
#     ('Michael', 'Valley 345'),
#     ('Sandy', 'Ocean blvd 2'),
#     ('Betty', 'Green Grass 1'),
#     ('Richard', 'Sky st 331'),
#     ('Susan', 'One way 98'),
#     ('Vicky', 'Yellow Garden 2'),
#     ('Ben', 'Park Lane 38'),
#     ('William', 'Central st 954'),
#     ('Chuck', 'Main Road 989'),
#     ('Viola', 'Sideway 1633')
# ]

# mycursor.executemany(sql, val)

# mydb.commit()

# print(mycursor.rowcount, "was inserted.")
# ###


# ## insert one, get its id
# sql = "INSERT INTO customers (name, address) VALUES (%s, %s)"
# val = ("Michelle", "Blue Village")
# mycursor.execute(sql, val)

# mydb.commit()

# print("1 record inserted, ID:", mycursor.lastrowid)
# ###


## fetch
mycursor.execute("SELECT * FROM customers")

myresult = mycursor.fetchall()

for x in myresult:
  print(x)
###

# ## del
# sql = "DELETE FROM customers WHERE address = 'Mountain 21'"

# mycursor.execute(sql)

# mydb.commit()

# print(mycursor.rowcount, "record(s) deleted")


# ## drop
# sql = "DROP TABLE customers"
# mycursor.execute(sql)

# ##update
# sql = "UPDATE customers SET address = 'Canyon 123' WHERE address = 'Valley 345'"

# mycursor.execute(sql)

# mydb.commit()

# print(mycursor.rowcount, "record(s) affected")
# #2 record(s) affected

# ## show limited records
# mycursor.execute("SELECT * FROM customers LIMIT 5")

# myresult = mycursor.fetchall()

# for x in myresult:
#   print(x)
# ###

##