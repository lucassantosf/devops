import json
import os
import math
from collections import defaultdict

def calcular_percentil(lista_valores, percentil):
    """Calcula o percentil de uma lista de números."""
    if not lista_valores:
        return 0
    lista_ordenada = sorted(lista_valores)
    indice = (percentile / 100) * (len(lista_ordenada) - 1)
    
    # Interpolação simples para maior precisão
    baixo = math.floor(indice)
    alto = math.ceil(indice)
    if baixo == alto:
        return lista_ordenada[int(indice)]
    
    d0 = lista_ordenada[baixo] * (alto - indice)
    d1 = lista_ordenada[alto] * (indice - baixo)
    return d0 + d1

def analisar_resultados(nome_arquivo):
    diretorio_do_script = os.path.dirname(os.path.abspath(__file__))
    caminho_completo = os.path.join(diretorio_do_script, nome_arquivo)

    stats = defaultdict(list)

    print(f"--- Analisando Performance: {nome_arquivo} ---")
    
    try:
        with open(caminho_completo, 'r') as f:
            for line in f:
                if not line.strip(): continue
                
                entry = json.loads(line)
                
                # Mantendo o 'Point' com P maiúsculo como no seu JSON
                if entry.get('type') == 'Point' and entry.get('metric') == 'http_req_duration':
                    data = entry.get('data', {})
                    tags = data.get('tags', {})
                    
                    # Prioridade de tags conforme seu arquivo
                    label = tags.get('step') or tags.get('url') or tags.get('endpoint') or 'desconhecido'
                    
                    value = data.get('value')
                    if value is not None:
                        stats[label].append(value)

        if not stats:
            print("Nenhuma métrica encontrada.")
            return

        # Cabeçalho da Tabela com P90 e P95
        # 
        header = f"{'CHAMADA/STEP':<25} | {'MÉDIA':<10} | {'P90':<10} | {'P95':<10} | {'MAX':<10} | {'REQS'}"
        print(header)
        print("-" * len(header))

        for label, values in sorted(stats.items()):
            # Cálculos
            avg = sum(values) / len(values)
            p90 = calcular_percentil(values, 90)
            p95 = calcular_percentil(values, 95)
            vmax = max(values)
            count = len(values)
            
            # Print formatado (ms)
            print(f"{label:<25} | {avg:<10.2f} | {p90:<10.2f} | {p95:<10.2f} | {vmax:<10.2f} | {count}")

    except FileNotFoundError:
        print(f"Erro: Arquivo '{nome_arquivo}' não encontrado.")
    except Exception as e:
        print(f"Erro inesperado: {e}")

# Função auxiliar para o cálculo de percentil dentro da iteração
def calcular_percentil(lista, p):
    if not lista: return 0
    lista_sort = sorted(lista)
    k = (len(lista_sort) - 1) * (p / 100)
    f = math.floor(k)
    c = math.ceil(k)
    if f == c:
        return lista_sort[int(k)]
    d0 = lista_sort[int(f)] * (c - k)
    d1 = lista_sort[int(c)] * (k - f)
    return d0 + d1

if __name__ == "__main__":
    analisar_resultados('load-test.json') # Ajuste para o nome do seu arquivo