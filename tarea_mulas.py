# Esta función es el "módulo" que calcula el dinero
def calcular_precio_multa(velocidad_coche):
    if velocidad_coche < 120:
        return 0  # Sin multa
    elif velocidad_coche < 140:
        return 100 # Multa de 100€
    else:
        return 200 # Multa de 200€
    # Aquí empieza el programa principal
def ejecutar_programa():
    total_acumulado = 0  # Aquí guardaremos la suma de todas las multas
    
    # Usamos un bucle que se repita 3 veces (para los 3 coches)
    for i in range(3):
        print(f"\n--- Datos del coche número {i+1} ---")
        
        # Pedimos los datos al usuario
        matricula = input("Introduce la matrícula del coche: ")
        velocidad = float(input("¿A qué velocidad circulaba? "))
        
        # Usamos nuestra función modular para saber la multa
        resultado_multa = calcular_precio_multa(velocidad)
        
        # Sumamos la multa al total
        total_acumulado = total_acumulado + resultado_multa
        
        # Mostramos el resultado de este coche
        if resultado_multa == 0:
            print(f"El coche {matricula} no tiene multa (0€).")
        else:
            print(f"El coche {matricula} tiene una multa de {resultado_multa}€.")

    # Al finalizar el bucle de los 3 coches, mostramos el total
    print("\n================================")
    print(f"EL MONTO TOTAL DE MULTAS ES: {total_acumulado}€")
    print("================================")

# Esta línea final hace que todo empiece a funcionar
ejecutar_programa()