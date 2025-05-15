🛒 Projeto Multifacetado de E-commerce
✨ Visão Geral
Este é um projeto completo de e-commerce que abrange duas principais áreas de atuação:

🧑‍💼 Administrativa (Backoffice): Gerenciamento de produtos, categorias, pedidos, usuários, permissões, entre outros.

🛍️ Client-side (Loja Virtual): Interface voltada para o consumidor final realizar compras, consultar produtos e acompanhar seus pedidos.

🔐 Controle de Acesso
O sistema utiliza controle de acesso baseado em Roles e Permissions para garantir que cada usuário tenha acesso apenas às funcionalidades permitidas:

Admin: acesso total ao sistema, inclusive ao painel administrativo.

Cliente: acesso à loja e às funcionalidades relacionadas a compras.

⚙️ Permissões são facilmente configuráveis para novos perfis de usuário.

⚙️ Tecnologias Utilizadas
⚡ Laravel (Backend)

🎨 Blade / Bootstrap / Tailwind (Frontend)

🧠 Spatie Laravel-Permission (Controle de Permissões)

🗃️ MySQL (Banco de Dados)

🛠️ Composer, npm, entre outros.

📦 Funcionalidades
Cadastro e gerenciamento de produtos 🧾

Carrinho de compras e finalização de pedidos 💳

Sistema de login e registro com verificação 🔐

Painel administrativo completo 📊

Histórico de pedidos e controle de status 🚚

Sistema de logs e auditoria 🕵️‍♂️

Possibilidade de criação de cupons de desconto 🎟️

Suporte a múltiplas formas de pagamento 💰

🚀 Como Rodar o Projeto
bash
Copiar
Editar
# Clone o repositório
git clone https://github.com/ShrrgnienT-T/admin-cliente-ecommerce.git

# Instale as dependências
composer install
npm install && npm run dev

# Copie o arquivo de ambiente
cp .env.example .env

# Configure suas variáveis no .env e rode as migrations
php artisan key:generate
php artisan migrate --seed

# Inicie o servidor
php artisan serve

💡 Contribuindo
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues, pull requests, ou sugerir melhorias.

