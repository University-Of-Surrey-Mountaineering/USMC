import databaseconnection as data
import sys

class main:
    def __init__(self, id):
        self.id = id
        self.data = data.main()
        
        self.getInfo()
        self.data.closeConnection()
        for counter in self.alldata:
            print(counter)
        
        
    def getInfo(self):
        query = "SELECT * FROM Users WHERE ID == " + self.id
        
        try:
            self.data.execute(query)
            self.alldata = self.data.fetchOneRecord()
            
        except:
            self.id = -1
        
    
        

if __name__ == "__main__":
    if len(sys.argv) > 2:
            print("There was an unexpected error")
    else:
        try:
            ID = sys.argv[1]
            main(ID)
        except:
            print("Please enter your username and password")