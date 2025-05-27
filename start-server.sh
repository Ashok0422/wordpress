#!/bin/bash

# Set environment (default to 'prod')
ENV=${1:-prod}

echo "🟢 Starting WordPress with APP_ENV=$ENV"


export APP_ENV=$ENV

# Start XAMPP services
echo "🔧 Starting Apache..."
# APP_ENV=$ENV sudo /Applications/XAMPP/xamppfiles/xampp startapache

sudo --preserve-env=APP_ENV /Applications/XAMPP/xamppfiles/xampp startapache


echo "🛢️ Starting MySQL..."
APP_ENV=$ENV sudo /Applications/XAMPP/xamppfiles/xampp startmysql

# Optional: wait a bit
sleep 2

# Start PHP built-in server (pass env inline!)
echo "🌐 Starting PHP server at http://localhost:8001 ..."
APP_ENV=$ENV php -S localhost:8001 -t ./
