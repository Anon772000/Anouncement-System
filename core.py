import json
import datetime as dt
from os import system
import random
import time
import threading
import subprocess
import logging
import pytz
logging.basicConfig(filename='Annoucement.log', format='%(asctime)s %(message)s', datefmt='%m/%d/%Y %I:%M:%S %p')
logging.warning('| System started Logging Online')
# Global Varibales
TIMEZONE = 'Australia/Sydney'
everyday = ("monday", "tuesday", "wednesday","thursday", "friday", "saturday", "sunday")
workDays = ("monday", "tuesday", "wednesday","thursday", "friday")
weekend = ( "saturday", "sunday")
minAn = 8
maxAn = 15

def TimeLoop():
    while True:
            #Grabs real Time
            todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
            #Creates current hour and min
            currentTIme = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
            globalSettings = json.load(open("/etc/Anouncement-System/global.json"))
            messages = json.load(open("/etc/Anouncement-System/messages.json"))
            minAn = int(globalSettings['Annoucements']['min'])
            maxAn = int(globalSettings['Annoucements']['max'])
            frequency = round(60/random.choice(range(minAn, maxAn)))
            Nextbell = int(todaysdate.strftime("%H"))
            logging.warning("Frequency is"+ str(frequency)+"mins for the remaining of hour"+str(Nextbell))
            while Nextbell == int(todaysdate.strftime("%H")):
                todaysdate = dt.datetime.now(pytz.timezone(TIMEZONE))
                currentTIme = [todaysdate.strftime("%H"), todaysdate.strftime("%M")]
                print(currentTIme)
                print('Spacing is '+ str(frequency) +' and current min is ' + todaysdate.strftime("%M"))

                mins = int(todaysdate.strftime("%M"))
                sixtynine = 0
                while sixtynine == 0:
                    mins = mins + 1
                    if(mins / frequency).is_integer():
                        sixtynine = 1
                        timetill = mins - int(todaysdate.strftime("%M"))
                        

                print(str(timetill)+' mins till next ring')
                if (int(todaysdate.strftime("%M")) / frequency).is_integer():
                    if int(todaysdate.strftime("%M")) == 0:
                        print('sleeping for 60 seconds')
                        time.sleep(60)
                        break
                    else:
                        messageArray =[]
                        for x in messages:
                            z = 1
                            messageArray.insert(int(z),messages[x]['name'])
                            z+=1
                        choice = random.choice(messageArray)
                        logging.warning('| Annoucement Rang '+ choice +', spacing is '+ str(frequency))
                        print(choice)
                        running  = threading.Thread(target=play, args=(str(choice),))
                        logging.warning("Starting Play")
                        running.start()
                        time.sleep(60)
                    
 
                system('clear')
def play(id):
    data = json.load(open('/etc/Anouncement-System/messages.json'))
    for r in data:
        if id == id:
            subprocess.call(['ffplay -autoexit -nodisp  /etc/Anouncement-System/assets/messages/'+id], shell=True)
            logging.warning('| Message played,-' + data[r]['name'])
            return
        else:
            logging.warning('| ERROR: message did not play')
            return

if __name__ == "__main__":
    logging.warning("Creating Threads")
    x = threading.Thread(target=TimeLoop)
    logging.warning("Starting Threads")
    x.start()
