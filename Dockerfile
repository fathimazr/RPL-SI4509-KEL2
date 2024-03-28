FROM php:8.2-apache

RUN apt-get update && apt-get install -y nodejs npm

# Set work directory
WORKDIR /app

# Copy file package.json dan package-lock.json
COPY package*.json ./

# Install dependensi
RUN npm install
# RUN npm i axios
# RUN npm i jsonwebtoken
# RUN npm i node-cron
# RUN npm i string-sanitizer
# RUN npm i dotenv
RUN npm i csrf
# RUN npm run build
# RUN php artisan migrate 
# Menyalin kode sumber
COPY . .

# Ekspose port yang digunakan oleh aplikasi Express.js
EXPOSE 3000

# Perintah untuk menjalankan aplikasi
RUN ["npm", "run", "build"]
# RUN ["php", "artisan", "migrate"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=3000"]
