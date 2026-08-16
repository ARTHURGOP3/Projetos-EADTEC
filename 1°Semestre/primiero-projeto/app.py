# Programa de cálculo de média de notas 
# Autor: Seu Nome 
# Entrada 
nome = input("Digite o nome do aluno: ") 
nota1 = float(input("Digite a primeira nota: ")) 
nota2 = float(input("Digite a segunda nota: ")) 
# Processamento 
media = (nota1 + nota2) / 2 
# Saída 
print(f"\nAluno: {nome}") 
print(f"Média: {media:.2f}") 
if media >= 6: 
    print("Situação: Aprovado") 
else: 
    print("Situação: Reprovado") 