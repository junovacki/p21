EXPLICACAO DA PROPOSTA:

A ideia era fazer com que a secretaria seguisse o seguinte passo a passo:

- Apertar o botao de inserir xml
- Dar o ctrl + v no campo e enviar
- Verificar/alterar o arquivo xlsx gerado
- Clicar em enviar planilha
- Enviar o arquivo xlsx

E com isso ja estaria dentro do banco de dados.

Explicando o passo a passo:

- Ao inserir o o xml no campo, quando ele gera o arquivo xlsx tbm fica salvo qual foi o xml utilizado. Sera utilizado para validação posterior
- Ao enviar o arquivo xlsx para que ele seja inserido é validado se tem o mesmo tamanho de posições que o xml para poupar processamento,
se for do mesmo tamanho é comparado posição por posição para ver se houve alguma alteração do xml para o excel passado, caso haja alteração é exibido um alert 
indicando que houve alteração entre o arquivo gerado e o arquivo enviado e que essas alterações serão inseridas


## Tive um problema para pegar o arquivo ali do files e acabei setando manualmente o caminho para o arquivo do pdf (clientes.xlsx) **Baixei e apontei para o mesmo
