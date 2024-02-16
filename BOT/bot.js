const TelegramBot = require('node-telegram-bot-api');
const axios = require('axios');

// Token de acceso para el bot de Telegram
const token = '6748871802:AAFmjPjhz5v8dUOL_v1yzum2JS4frjiHdjQ';

// Token de acceso para la API de OpenWeatherMap
const weatherApiKey = 'c2d958c0bdbb0525d13f65af4bf33647';

// URL base de la API de OpenWeatherMap
const weatherApiUrl = 'http://api.openweathermap.org/data/2.5/weather';

// Crear una instancia del bot de Telegram
const bot = new TelegramBot(token, { polling: true });

// Manejar el comando /clima
bot.onText(/\/clima (.+)/, async (msg, match) => {
    const chatId = msg.chat.id;
    const city = match[1];

    try {
        // Consultar la API de OpenWeatherMap para obtener el clima
        const response = await axios.get(weatherApiUrl, {
            params: {
                q: city,
                appid: weatherApiKey,
                units: 'metric' // Obtener la temperatura en Celsius
            }
        });

        // Extraer la información del clima
        const { main, weather } = response.data;
        const temperature = main.temp;
        const weatherDescription = weather[0].description;

        // Enviar el mensaje con la información del clima al usuario
        bot.sendMessage(chatId, `El clima en ${city} es ${weatherDescription} con una temperatura de ${temperature}°C`, {
            reply_markup: {
                keyboard: [
                    ['/clima Madrid', '/clima Barcelona'],
                    ['/clima Londres', '/clima París']
                ],
                resize_keyboard: true,
                one_time_keyboard: true
            }
        });
    } catch (error) {
        // En caso de error, enviar un mensaje al usuario informando sobre el problema
        bot.sendMessage(chatId, 'Lo siento, no se pudo obtener la información del clima para esa ciudad.');
    }
});

// Manejar comandos desconocidos
bot.on('message', (msg) => {
    const chatId = msg.chat.id;
    bot.sendMessage(chatId, 'Lo siento, no entendí ese comando. Prueba /clima seguido del nombre de una ciudad.');
});
