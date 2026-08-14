import sqlite3 as sql
import sys

class main:
    def __init__(self, id):
        self.id = id
        
    def establishConnection(self):
            try:
                self.connection = sql.connect("Data.db")
                self.Cursor = self.connection.cursor()
                
            except sql.Error as error:
                print('Error occurred -', error)

if __name__ == "__main__":
    
    pass