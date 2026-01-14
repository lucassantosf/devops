FROM node:lts-alpine

LABEL author="Dan Wahlin"

WORKDIR /var/www/codewithdan

# Copia package.json primeiro (melhora cache)
COPY package*.json ./

RUN npm install --production

# Copia o restante do código
COPY . .

EXPOSE 8080

CMD ["node", "server.js"]