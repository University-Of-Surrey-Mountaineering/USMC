import databaseconnection as Data
import datetime as date


class main:
    def __init__(self):
        result = self.getalltrips()
        if result == None:
            print("None")
        else:
            for counter in result:
                print(counter)
    
    def getalltrips(self):
        x = date.datetime.now()
        year = x.strftime("%Y")
        month = x.strftime("%m")
        day = x.strftime("%d")
        entiredate = year + "-" + month + "-" + day
        query = "SELECT ID, [Trip Name], [Trip Date] FROM Trips WHERE [Trip Date] > '" + entiredate + "';"
        try:
            data = Data.main()
            data.execute(query)
            result = data.fetchAllRecords()
            if len(result) == 0:
                return None
            else:
                return result
        except:
            return None
        
    
if __name__ == "__main__":
    main()