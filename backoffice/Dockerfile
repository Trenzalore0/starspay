# Usando imagem Node.js 20.13.1
FROM node:20.13.1

# Definindo o diretório de trabalho dentro do container
WORKDIR /app

# Copiando os arquivos do projeto para o container
COPY . .

# Instalando dependências
RUN npm install

# Expondo a porta 3000
EXPOSE 3000

# Comando para iniciar a aplicação
CMD ["npm", "start"]
