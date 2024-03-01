import serial
from tkinter import * 
import time

serialPort = '/dev/ttyUSB1' 
baudRate = 9600  # Baudios

try:
  serialConnection = serial.Serial(serialPort, baudRate) # Instanciar objeto Serial / Instance Serial Object
except:
  print('Cannot conect to the port')
    
def ask_quit():
    root.destroy()  
    serialConnection.close()

def angle(int):         
    angleData = str(slider.get())
    serialConnection.write((angleData+'\n').encode())    

root = Tk() 

root.title('Servo Slide')

slider = Scale(root, from_=0, to=180, orient=HORIZONTAL,command=angle,length=500)   
   
  
slider.pack()



root.minsize(500,30)
root.mainloop() 
