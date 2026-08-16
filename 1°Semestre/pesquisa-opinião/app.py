exe=0
bom=0
rui=0

for cliente in range(1, 51):
    nome=input("Digite seu nome:\n")
    idade=int(input("Digite sua idade:\n"))
    opiniao=int(input("Qual foi seu grau de satisfação com o atendimento?(digite o número)\n1.EXCELENTE\n2.BOM\n3.RUIM\n"))
    if opiniao ==1:
        exe+=1
    elif opiniao ==2:
        bom+=1
    else:
        rui+=1
print("A quantidade de respostas Execentele foi:",exe)
print("A quantidade de respostas Bom foi:",bom)
print("A quantidade de respostas Ruim foi:",rui)