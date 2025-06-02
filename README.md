# Blog Pessoal em Laravel

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

Um blog pessoal desenvolvido em Laravel com recursos completos de gestão de conteúdo, autenticação de utilizadores e painel administrativo.

## 🚀 Funcionalidades

- 📝 Publicação de artigos
- 🔐 Sistema de autenticação de utilizadores
- 👨‍💻 Painel administrativo
- 📂 Categorização de posts
- 🔍 Pesquisa de conteúdo
- 📱 Design responsivo
- ✨ Interface moderna e intuitiva

## 🛠️ Pré-requisitos

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js >= 14.x
- NPM ou Yarn

## 🚀 Instalação

1. **Clonar o repositório**
   ```bash
   git clone [URL_DO_REPOSITORIO]
   cd blog-laravel
   ```

2. **Instalar dependências do PHP**
   ```bash
   composer install
   ```

3. **Instalar dependências do Node.js**
   ```bash
   npm install
   ```

4. **Configurar ambiente**
   - Copiar o arquivo `.env.example` para `.env`
   - Configurar as variáveis de banco de dados no arquivo `.env`

5. **Gerar chave da aplicação**
   ```bash
   php artisan key:generate
   ```

6. **Executar migrações**
   ```bash
   php artisan migrate --seed
   ```

7. **Compilar assets**
   ```bash
   npm run dev
   ```

8. **Iniciar servidor de desenvolvimento**
   ```bash
   php artisan serve
   ```

## 🌈 Esquema de Cores

O projeto utiliza a seguinte paleta de cores:

- **Primária**: `#9c27b0` (Roxo)
- **Secundária**: `#7b1fa2` (Roxo mais escuro)
- **Fundo**: `#0f0f3e` (Azul escuro)
- **Texto**: `#f2f2fe` (Branco)
- **Mensagem de sucesso**: `#00c476` (Verde)
- **Mensagem de erro**: `#da0f3f` (Vermelho)

## 📂 Estrutura do Projeto

```
blog-laravel/
├── app/               # Classes principais da aplicação
├── bootstrap/         # Arquivos de inicialização
├── config/            # Configurações
├── database/          # Migrações, seeds e factories
├── public/            # Pasta pública
│   ├── css/           # Estilos compilados
│   ├── js/            # JavaScript compilado
│   └── images/        # Imagens
├── resources/         # Views e assets não compilados
│   ├── js/
│   ├── sass/
│   └── views/
├── routes/           # Rotas da aplicação
└── tests/            # Testes automatizados
```

## 👨‍💻 Desenvolvimento

Para começar a desenvolver:

1. Instale as dependências de desenvolvimento:
   ```bash
   npm install
   ```

2. Rode o Vite para compilar os assets em tempo real:
   ```bash
   npm run dev
   ```

3. Em outro terminal, inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

## ✨ Créditos

- [EGATOR - Frontend](https://www.youtube.com/watch?v=dgfHwfC6bWE&t=6602s)
- [EGATOR - Backend](https://www.youtube.com/watch?v=I010T-UvmRM&t=12054s)
- [Laravel](https://laravel.com)
- [Vite](https://vitejs.dev/)
- [Font Awesome](https://fontawesome.com/)
- [Google Fonts](https://fonts.google.com/)

---

Desenvolvido com ❤️ por Joana Gabriel