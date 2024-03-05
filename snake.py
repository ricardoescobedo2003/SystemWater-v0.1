import turtle
import time
import random 

posponer = 0.1

#marcador
score = 0
high_score = 0

#configuracion de la ventana
wn = turtle.Screen()
wn.title("Snake")
wn.bgcolor("black")
wn.setup(width=600, height=600)
wn.tracer(0)

#Cabeza de la serpiente
cabeza = turtle.Turtle()
cabeza.speed(0) 
cabeza.shape("square") #le damos la forma de cuadrado con square
cabeza.color("white") #colocalos el color de la cabeza
cabeza.penup() #con esta linea elimminamos el rastro de la cabez
cabeza.direction = "stop"

#Comida
comida = turtle.Turtle()
comida.speed(0) 
comida.shape("square") #le damos la forma de cuadrado con square
comida.color("red") #colocalos el color de la cabeza
comida.penup() #con esta linea elimminamos el rastro de la cabez
comida.goto(0,100) #goto funcion para poner un objeto en alguna posicion x,y

#cuerpo de la serpiente
segmentos = []

texto = turtle.Turtle()
texto.speed(0)
texto.color("white")
texto.penup()
texto.hideturtle()
texto.goto(0,260)
texto.write("Score:         0   High Score:         0", align="center", font=("Courier", 12, "normal"))

texto1 = turtle.Turtle()
texto1.speed(0)
texto1.color("white")
texto1.penup()
texto1.hideturtle()
texto1.goto(0,280)
texto1.write("TECM Loreto Zacatecas, Ricardo Escobedo", align="center", font=("Courier", 12, "normal"))
#Funciones
def mov():
    if cabeza.direction == "Up":
        y = cabeza.ycor() #dame la coordenada de donde se encuentra la cabeza. Usando ycro
        cabeza.sety(y + 20) #suammos 20 pixeles a la posicion actual de la cabeza     

    if cabeza.direction == "Down":
        y = cabeza.ycor() #dame la coordenada de donde se encuentra la cabeza. Usando ycro
        cabeza.sety(y - 20) #suammos 20 pixeles a la posicion actual de la cabeza     

    if cabeza.direction == "Left":
        x = cabeza.xcor() #dame la coordenada de donde se encuentra la cabeza. Usando xcro
        cabeza.setx(x - 20) #suammos 20 pixeles a la posicion actual de la cabeza     


    if cabeza.direction == "Right":
        x = cabeza.xcor() #dame la coordenada de donde se encuentra la cabeza. Usando xcro
        cabeza.setx(x + 20) #suammos 20 pixeles a la posicion actual de la cabeza     

#funciones para llamarlas desde el teclado
def arriba():
    cabeza.direction = "Up"
   # print("Funcion arriba se llamo de manera correcta")

def abajo():
    cabeza.direction = "Down"

def izquierda():
    cabeza.direction = "Left"

def derecha():
    cabeza.direction = "Right"

    
#teclado
wn.listen()
#con wn.onkeypress sirver para que cuando se precione una tecla de las definidas se pase el valor dentro de la funcion correspondiente
#ejemplo si se precion Arriba, se mande los valores a la funcion wn.onkeypress(arriba) y ejecute la funcion correspondiente
wn.onkeypress(arriba, "Up")
wn.onkeypress(abajo, "Down")
wn.onkeypress(derecha, "Right")
wn.onkeypress(izquierda, "Left")

#Crea un bucle principal
while True:
    wn.update() #actualizamos, la ventana de manera continua

    #Colisiones en el borde
    #para poder determinar si la serpiente choco en la ventana, solo debemos determinar que las coordenadas
    #de la serpiente en el eje x, y no sobrepase los 300 pixeles que tenemos
    if cabeza.xcor() > 280 or cabeza.xcor() <-280 or cabeza.ycor() > 280 or cabeza.ycor() <-280:
        time.sleep(1) #hacemos una pausa
        cabeza.goto(0,0) #mandamos la cabeza a la posicion 0
        cabeza.direction = "stop"

    def pasos():    
        #esconder los segmento
        for segmento in segmentos:
            segmento.goto(1000,1000)
        #limpir la lista de segmentos
        #segmentos.clear()


    if cabeza.distance(comida) < 20:  #con esto checamos la distancia entre dos objetos
       x = random.randint(-280, 280) #con esto decimos la posicion de manera random, dentro de ese rango
       y = random.randint(-280, 280) 
       comida.goto(x,y)

    #con esto de aqui vamos a crear un nuevo segmento, cada que se haga colision    
       nuevo_segmento = turtle.Turtle()
       nuevo_segmento.speed(0) 
       nuevo_segmento.shape("square") 
       nuevo_segmento.color("grey") 
       nuevo_segmento.penup() 
       segmentos.append(nuevo_segmento) #con esto cada que se cree un nuevo segmento se agrega a la lista

       #aumentar el marcador
       score += 10

       if score > high_score:
           high_score = score
        #desplegar la puntuacion
       texto.clear()
       texto.write("Score:        {}   High Score:         {}".format(score, high_score),
                   align="center", font=("Courier", 12, "normal"))
    
    #Mover el cuerpo de la serpiente
    totalSegmentos = len(segmentos) #con el metodo len, vamos a saber cuantos elementos tenemos
    for index in range(totalSegmentos -1,0,-1):

     #estamos obteniendo las coordenadas x y y, del elemento anterior
        x = segmentos[index - 1].xcor()
        y = segmentos[index - 1].ycor() 
        segmentos[index].goto(x, y)
    if totalSegmentos > 0:
        x = cabeza.xcor()
        y = cabeza.ycor()
        segmentos[0].goto(x,y)

    mov() #llamamos a la funcion de movimiento dentro del bucle principal
    time.sleep(posponer) #retrasamos la velocidad de la actualizacion porque es muy rapido 0.1s