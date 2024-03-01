import socket
import struct
import time

def enviar_ping(destino, cantidad=4):
    for i in range(cantidad):
        icmp = socket.getprotobyname('icmp')
        raw_socket = socket.socket(socket.AF_INET, socket.SOCK_RAW, icmp)

        # Estructura del paquete ICMP
        tipo = 8  # Tipo de mensaje: echo request
        codigo = 0
        identificador = 12345
        secuencia = i + 1
        datos = b'Ping desde Python'

        paquete = struct.pack('!BBHHH32s', tipo, codigo, 0, identificador, secuencia, datos)

        # Calcular el checksum
        checksum = 0
        for j in range(0, len(paquete), 2):
            checksum += (paquete[j] << 8) + paquete[j + 1]

        checksum = (checksum >> 16) + (checksum & 0xFFFF)
        checksum += (checksum >> 16)

        paquete = paquete[:2] + struct.pack('!H', ~checksum & 0xFFFF) + paquete[4:]

        # Enviar el paquete
        inicio_tiempo = time.time()
        raw_socket.sendto(paquete, (destino, 1))  # Usar el número de puerto 1 para ICMP
        respuesta, _ = raw_socket.recvfrom(1024)
        fin_tiempo = time.time()

        tiempo_respuesta = (fin_tiempo - inicio_tiempo) * 1000  # Convertir a milisegundos

        print(f"Respuesta desde {destino}: bytes={len(respuesta)}, tiempo={tiempo_respuesta:.2f}ms")

        time.sleep(1)  # Esperar 1 segundo entre envíos

if __name__ == "__main__":
    # Reemplaza 'tu_ip_destino' con la dirección IP de tu servidor
    enviar_ping('172.16.254.233', cantidad=4)
