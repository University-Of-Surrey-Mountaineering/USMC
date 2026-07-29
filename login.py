import sqlite3 as sql
import sys


class main:
    def __init__(self, Uname,Pword):
        self.ID = 0
        self.Uname = Uname
        self.Pword = Pword
        
        self.establishConnection()
        self.login()
        self.closeConnection()
        
        print(self.getID())
        print(self.getUserName())
        
        
    def establishConnection(self):
        try:
            self.connection = sql.connect("Data.db")
            self.Cursor = self.connection.cursor()
            
        except sql.Error as error:
            print('Error occurred -', error)
            
    def login(self):
        query = "SELECT ID FROM Users WHERE UserName == '" + self.Uname + "' AND Password == " + self.Pword
        try:
            self.Cursor.execute(query)
            self.ID = self.Cursor.fetchone()[0]
            
        except:
            self.ID = -1
            
    def getID(self):
        return self.ID
            
    def getUserName(self):
        return self.Uname
    
    
    def closeConnection(self):
        self.connection.close
        

if __name__ == "__main__":
    
    if len(sys.argv) != 3:
        print("Error")
    else:
        Uname = sys.argv[1]
        Pword = sys.argv[2]
        main(Uname, Pword)
    
    