/**
 * Módulo que proporciona un bot de Telegram que muestra noticias recientes.
 * @module TelegramNewsBot
 */

// Importar módulos necesarios
const TelegramBot = require('node-telegram-bot-api');
const axios = require('axios');

// Token de acceso para el bot de Telegram
const token = '6748871802:AAFmjPjhz5v8dUOL_v1yzum2JS4frjiHdjQ';

// Token de acceso para la API de News API
const newsApiKey = '77042eead22c4c04ab116b026a6ddae8';

// URL base de la API de News API
const newsApiUrl = 'https://newsapi.org/v2/top-headlines';

// Crear una instancia del bot de Telegram
const bot = new TelegramBot(token, { polling: true });

/**
 * Maneja el comando /start.
 * @param {object} msg - Objeto que representa el mensaje recibido.
 */
bot.onText(/^\/start$/, (msg) => {
  const chatId = msg.chat.id;
  const response = '¡Hola! Presiona los botones a continuación para acceder al menú:';
  const startKeyboard = {
    reply_markup: {
      keyboard: [['news']],
      resize_keyboard: true,
      one_time_keyboard: true
    }
  };
  
  // Enviar mensaje de bienvenida con el teclado personalizado
  bot.sendMessage(chatId, response, startKeyboard);
});

/**
 * Maneja el comando /news.
 * @param {object} msg - Objeto que representa el mensaje recibido.
 */
bot.onText(/^news$/, async (msg) => {
  const chatId = msg.chat.id;
  
  try {
    // Consultar la API de News API para obtener noticias
    const response = await axios.get(newsApiUrl, {
      params: {
        country: 'us', // Obtener noticias de Estados Unidos (puedes cambiarlo según tu preferencia)
        apiKey: newsApiKey
      }
    });

    // Extraer las noticias principales
    const articles = response.data.articles;
    let newsText = '📰 Aquí tienes algunas noticias recientes:\n\n';
    articles.forEach((article, index) => {
      newsText += `${index + 1}. ${article.title}\n${article.url}\n\n`;
    });

    // Enviar el mensaje con las noticias al usuario
    bot.sendMessage(chatId, newsText);
  } catch (error) {
    // En caso de error, enviar un mensaje al usuario informando sobre el problema
    bot.sendMessage(chatId, 'Lo siento, no se pudo obtener las noticias en este momento.');
  }
});

/**
 * Maneja los mensajes que no corresponden a comandos conocidos.
 * @param {object} msg - Objeto que representa el mensaje recibido.
 */
bot.on('message', (msg) => {
  const chatId = msg.chat.id;
  bot.sendMessage(chatId, '');
});
