# Ideias futuras

## Relationship antes de Person

Status: Backlog

Descrição:
Permitir que a IA identifique a existência de um relacionamento
antes de conhecer a identidade da pessoa.

Motivo do adiamento:
A primeira versão do Aurora não necessita dessa complexidade.

## Aurora como participante

Status: Backlog

Descrição:
Avaliar se a Aurora deve participar dos relacionamentos como uma Person especial
ou se deve existir um conceito próprio para participantes não humanos.

Motivo do adiamento:
A primeira versão pode funcionar registrando apenas as interações do usuário.

# IDEAS

## Separar User e Person

Avaliar qual será a relação entre a autenticação do Laravel (`User`) e a entidade de domínio (`Person`).

Possibilidades:
- User representa apenas a conta de login.
- Person representa a identidade dentro do Aurora.
- Eliminar completamente User e autenticar diretamente Person.

Status:
Não decidir agora. Revisar quando a autenticação for implementada.

## Aurora como participante do relacionamento

Avaliar tratar a IA Aurora como um participante real do relacionamento, em vez de apenas um assistente externo.

Possíveis vantagens:
- Histórico completo de conversas.
- Participação explícita da IA.
- Permite relacionamentos com múltiplos participantes (casais, famílias, equipes).

Status:
Não implementar agora.

## Grafo de conhecimento

Embora o armazenamento continue relacional (SQLite/PostgreSQL), projetar o domínio para que possa ser navegado como um grafo de conhecimento.

Exemplos:

Person
→ Relationships
→ Participants
→ Interactions
→ Memories
→ Insights

Objetivo:
Permitir que a IA navegue naturalmente entre entidades sem alterar imediatamente a tecnologia de persistência.

Status:
Visão arquitetural de longo prazo.