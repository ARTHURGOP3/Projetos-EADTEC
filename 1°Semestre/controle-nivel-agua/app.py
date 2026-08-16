dados=[] 
Nivel_reserva=int(input("Digite de 0-5 o nível do Reservatório "))
dados.insert(0, Nivel_reserva)
if dados[0]<=0 or dados[0] >=6:
    print("Dados incorretos, rode o progama novamente!")
    exit()
def situacao():
    from colorama import Fore, Style
    if dados[0] == 1:
        print ("Situação do reservátorio:",Fore.RED + "Muito baixo (crítico)")
    elif dados[0] ==2:
        print("Situação do reservátorio:",Fore.YELLOW + "Baixo")
    elif dados [0]==3:
        print("Situação do reservátorio:",Fore.GREEN + "Médio")
    elif dados [0]==4:
        print("Situação do reservátorio:",Fore.CYAN +"Alto")
    else:
        print("Situação do reservátorio:",Fore.BLUE +"Muito alto (alerta)")
    print(Style.RESET_ALL)

situacao()
