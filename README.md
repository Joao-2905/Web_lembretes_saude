# 📄 Relatório de Testes – TP5

**Projeto:** Web_lembretes_saude  
**Descrição:** Aplicação web para cadastro, gerenciamento e acompanhamento de lembretes de saúde  
**Sprint:** TP5 – Desenvolvimento + Testes  
**Responsável pelos testes:** **Joao Paulo Gomes dos Santos**

---

## 🔍 Resumo dos Testes Executados

| Funcionalidade | Status | Observação |
|----------------|:------:|------------|
| Cadastro de lembrete     | ✔ Pass | Funcionou corretamente |
| Login                    | ✔ Pass | Funcionou corretamente |
| Editar lembrete          | ✔ Pass | Edição salva e exibida corretamente |
| Excluir lembrete         | ✔ Pass | Remoção executada com sucesso |
| Notificação              | ✔ Pass | Sistema apresenta notificação com sucesso |

---

## 🧪 Detalhamento dos Casos de Teste

| ID   | Funcionalidade     | Ação Realizada              | Resultado Esperado                                   | Resultado Obtido              | Status |
|------|--------------------|------------------------------|-------------------------------------------------------|--------------------------------|--------|
| TC01 | Cadastro           | Preencher formulário válido  | Lembrete salvo e exibido na lista                     | OK                             | ✔ Pass |
| TC02 | Login              | Inserir credenciais válidas  | Usuário autenticado e redirecionado                   | OK                             | ✔ Pass |
| TC03 | Editar lembrete    | Editar conteúdo e salvar     | Alterações persistidas e atualizadas na listagem      | OK                             | ✔ Pass |
| TC04 | Excluir lembrete   | Excluir lembrete existente    | Item removido do sistema e interface                  | OK                             | ✔ Pass |
| TC05 | Notificação        | Aguardar disparo de lembrete | Notificação ou alerta exibido para o usuário          | OK                      | ✔ Pass |

---

## 📊 Conclusões da Sprint

- **Total de testes executados:** 5  
- **Passaram:** 5  
- **Falharam:** 0  
- **Percentual de sucesso:** **100%**  
- O sistema está funcional para todas as operações principais

---

## 🚧 Pendências e Próximos Passos (TP6)

| Item | Ação Necessária | Prioridade |
|-------|------------------|:----------:|
| Experiência do usuário | Melhorar feedback visual de ações | 🟡 Média |
| Testes automatizados | Incluir testes com Cypress, Jest, Selenium ou Playwright | 🟢 Baixa |

---


