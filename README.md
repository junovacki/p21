EXPLICACAO DA PROPOSTA:

A ideia era fazer com que a secretaria seguisse o seguinte passo a passo:

- Apertar o botao de inserir xml
- Dar o ctrl + v no campo e enviar
- Verificar/alterar o arquivo xlsx gerado
- Clicar em enviar planilha
- Enviar o arquivo xlsx
- Enviar email para todos os emails de torcedores cadastrados

E com isso ja estaria dentro do banco de dados.

Explicando o passo a passo:

- Ao inserir o o xml no campo, quando ele gera o arquivo xlsx tbm fica salvo qual foi o xml utilizado. Sera utilizado para validação posterior
- Ao enviar o arquivo xlsx para que ele seja inserido é validado se tem o mesmo tamanho de posições que o xml para poupar processamento,
se for do mesmo tamanho é comparado posição por posição para ver se houve alguma alteração do xml para o excel passado, caso haja alteração é exibido um alert 
indicando que houve alteração entre o arquivo gerado e o arquivo enviado e que essas alterações serão inseridas
- Ao enviar os dados para o email é feito um select na tabela para puxar os dados do e-mail de cada torcedor cadastrado


## Tive um problema para pegar o arquivo ali do files e acabei setando manualmente o caminho para o arquivo do pdf (clientes.xlsx) **Baixei e apontei para o mesmo
## Devido a eu não ter um mail service configurado ele não enviou mas é só trocar os dados de qual email será enviado e ter um mailservice configurado ao seu apache que vai funcionar
