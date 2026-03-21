Aparelho=input("Digite o aparelho que você quer medir \n R.\t")
Potencia=float(input("Digite a potência do aparelho em Watts \n R.\t"))
Tempo=float(input("Digite o tempo médio de uso diário em horas. \n Exemplo: 10 \n R.\t"))
consumo_mensal = (Potencia * Tempo * 30) / 1000
consumo_estimado=(consumo_mensal*1.75)
print("Aparelho: ",Aparelho)
print("Consumo estimado", consumo_mensal ,"kWh/mês")
print("Consumo em reais", "R$",consumo_estimado,"por kWh")