# Plano de Testes – Web_lembretes_saude

##  1. Objetivo dos Testes
Garantir que o sistema *Web_lembretes_saude* funcione corretamente, permitindo que o usuário cadastre, visualize, edite e exclua lembretes de medicamentos, sem erros e com uma experiência fluida.

Os testes têm como objetivo verificar:
- Funcionamento correto das funcionalidades principais.
- Validação das entradas do usuário.
- Persistência dos dados no navegador (LocalStorage).
- Resposta adequada da interface em diferentes situações.

---

##  2. Escopo dos Testes
Serão testados os seguintes componentes:

| Componente | Descrição |
|------------|-----------|
| Cadastro de lembretes | Inserção de novos lembretes com nome do remédio, data e horário. |
| Listagem de lembretes | Exibição dos lembretes na tela inicial. |
| Edição de lembretes | Alteração de um lembrete já cadastrado. |
| Exclusão de lembretes | Remoção de lembretes da lista. |
| Persistência | Dados permanecem mesmo após recarregar ou fechar o navegador. |
| Notificações (caso implementado) | Notificação visual ou sonora no horário configurado. |

---

##  3. Casos de Teste

| ID | Caso de Teste | Entrada / Ação | Resultado Esperado |
|----|---------------|----------------|------------------|
| CT01 | Criar lembrete | Nome do remédio + horário + data | Lembrete é salvo e aparece na lista |
| CT02 | Validar campos obrigatórios | Tentar salvar sem preencher os campos | Exibir mensagem de erro e não salvar |
| CT03 | Editar lembrete | Clicar em "Editar" em um lembrete existente | Dados são carregados no formulário e atualizados após salvar |
| CT04 | Excluir lembrete | Clicar no botão "Excluir" | Lembrete removido da lista e do LocalStorage |
| CT05 | Persistência dos dados | Fechar e abrir o navegador | Lembretes permanecem disponíveis |
| CT06 | Notificação (opcional) | Sistema atinge horário de um lembrete | Notificação é exibida / emitida |

---

## 4. Critérios de Sucesso
A entrega será considerada válida quando:

- 100% dos casos de teste forem executados.
- Nenhuma funcionalidade principal apresentar defeitos.
- Dados permanecerem no LocalStorage após recarregar a página.

---

## 5. Ambiente de Testes
- Navegador: Chrome / Firefox / Edge
- Plataforma: GitHub Pages / Localhost
- Tecnologias utilizadas:  
  - HTML5  
  - CSS3  
  - JavaScript  
  - LocalStorage

---

## 6. Ferramentas utilizadas para registro dos testes
- GitHub Projects (Kanban da Sprint)
- Planilha de resultados dos testes (Excel / Google Sheets)
- Console do navegador para inspeção (DevTools)

---

**Status:** ✅ Plano de Testes concluído e disponível para execução.
