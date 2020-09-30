import re
import time
import turtle

f = open("turtle", "r")
contenu = f.read()
contenu = contenu.split("\n")

turtle.setup( width = 20000, height = 20000, startx = 0, starty = 0)
turtle.degrees()

for s in contenu:
	if not s:
		continue
	try:	
		nu = int(re.search(r'\d+', s).group())
	except:
		continue
	if "Avance" in s:
		turtle.fd(nu)
	elif "Recule" in s:
		turtle.bk(nu)
	elif "droite" in s:
		turtle.rt(nu)
	elif "gauche" in s:
		turtle.lt(nu)

turtle.exitonclick()
