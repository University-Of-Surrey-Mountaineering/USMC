import databaseconnection as Data
import sys


class main:
    def __init__(self, id, filelocation):
        state = self.uploadfile(id, filelocation)
        
        if state:
            print("Success")
        else:
            print("Fail")
    
    def uploadfile(self, id, filelocation):
        query = "UPDATE Users SET [Profile Picture] = '" + filelocation + "' WHERE ID = " + id
        
        try:
            data = Data.main()
            data.update(query)
            data.closeConnection()
            return True
        except:
            data.closeConnection()
            return False
    

    
if __name__ == "__main__":
    if len(sys.argv) == 3:
        id = sys.argv[1]
        filelocation = sys.argv[2]
        main(id, filelocation)
    else:
        print("Fail")