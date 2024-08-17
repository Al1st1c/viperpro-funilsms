# Viper Pro

Viperpro é um projeto de código aberto desenvolvido em PHP usando o Framework Laravel 10 e Vue 3, com várias integrações com provedores de iGaming. Este projeto é destinado a fins de estudo. Utilize-o com responsabilidade e consciência, e não para fins fraudulentos.

**Repositório oficial**: [Viper Pro](https://github.com/Overx/viperpro/fork)

## Fork Ares SMS

Este fork adiciona uma integração com um funil de mensagens para diversas ações no sistema. Com isso, você pode enviar mensagens via SMS ou WhatsApp para seus clientes (jogadores) em momentos específicos.

### Código de Integração

Se você deseja copiar apenas o código que faz a integração com o sistema de envio de SMS, você deve focar nos seguintes arquivos:

- **AuthController.php**: `app/Http/Controllers/Api/Auth/AuthController.php`
- **DepositController.php**: `app/Http/Controllers/Api/Wallet/DepositController.php`
- **WalletController.php**: `app/Http/Controllers/Api/Profile/WalletController.php`
- **DigitoPayTrait.php**: `app/Traits/Gateways/DigitoPayTrait.php`
- **AresSMSService.php**: `app/Http/Controllers/Integrations/AresSMSService.php`

Se atente, o arquivo AresSMSService, precisa ser criado e estar dentro da pasta Integrations que também precisa ser criada.

### Funcionalidades Adicionadas

- **Cadastro**: Envio de mensagem quando um usuário se cadastra.
- **Depósito**: Envio de mensagem quando um depósito é realizado.
- **Depósito Confirmado**: Envio de mensagem quando um depósito é confirmado.
- **Saque**: Envio de mensagem quando um saque é realizado.

### Como Funciona?

Para cada uma das ações mencionadas, uma mensagem será enviada automaticamente para o cliente. Você pode personalizar essas mensagens através da plataforma ARES SMS.

### Personalização das Mensagens

1. **Crie uma Conta na ARES SMS**:
   - Acesse [ARES SMS](https://aressms.com) e crie uma conta.

2. **Configuração do Funil de SMS**:
   - No painel da ARES SMS, vá para a opção "FUNIL SMS".
   - Crie um novo funil e selecione a plataforma **VIPER Pro**.

3. **Criação das Mensagens**:
   - Você verá opções para as ações listadas (Cadastro, Depósito, etc.).
   - Crie mensagens para cada ação. Exemplo:
     - Ao se cadastrar, envie uma mensagem de boas-vindas.
     - Após 5 minutos do cadastro, envie uma mensagem com um cupom de bônus.
   - Crie o fluxo completo de mensagens conforme suas necessidades.

4. **Obtenção do Link de Integração**:
   - Após configurar o funil, clique em "Próximo" para gerar um link de integração.
   - Copie esse link.

5. **Configuração no Código**:
   - Abra o arquivo `AresSMSService.php`, localizado em `app/Http/Controllers/Integrations/AresSMSService.php`.
   - Substitua o valor da variável `$urlIntegration` pelo link de integração copiado.

### Pronto para Usar

Após seguir os passos acima, o sistema de envio de SMS/WhatsApp estará configurado e funcionando.
