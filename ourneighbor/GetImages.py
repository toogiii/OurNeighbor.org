import glob
import os
import string
import random

letters = string.ascii_lowercase


file = open("carousel.txt", "w")
index = 0
for filename in glob.glob(r"C:\Users\garvg\Downloads\*.jp*g"):
    if index % 4 == 0 and index > 0:
        file.write("\n")
    #os.rename(filename,filename[:25] + ''.join(random.choice(letters) for i in range(10)) + filename[filename.index("."):])
    
    file.write("<img class=\"mimg\" src=\"/ourneighbor/content/" + filename[25:] + "\" />")
    index += 1

file.close()