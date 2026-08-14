import sqlite3 as sql

class main:
    def __init__(self):
        self.establishConnection()
        
    
    def establishConnection(self):
                try:
                    self.connection = sql.connect("Data.db")
                    self.Cursor = self.connection.cursor()
                    
                except sql.Error as error:
                    print('Error occurred -', error)
                
    def execute(self, query):
        try:
            self.Cursor.execute(query)
        except:
            raise Exception()
        
    def fetchOne(self):
        try:
            return self.Cursor.fetchone()[0]
        except:
            raise Exception()
            
    
    def getCursor(self):
        return self.Cursor
    
    def getConnection(self):
        return self.connection
    
    def closeConnection(self):
        self.connection.close()
    
    