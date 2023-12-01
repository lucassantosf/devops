print('Crescente')
for n in range(0,10):
    if n % 2 == 0 :
        print(n,'Par')
    else:
        print(n,'Impar')

print('Crescente cada 2')
for n in range(0,10,1):
    print(n)

    if n==2 :
        break

print('Decrescente')
for n in range(10,0,-1):
    print(n)


pets = ['Gato','Cachorro','Avestruz']
for pet in pets:
    print(pet)