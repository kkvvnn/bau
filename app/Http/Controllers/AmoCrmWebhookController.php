<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AmoCrmWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Логируем весь входящий запрос для отладки
        Log::info('AmoCRM Webhook Received:', $request->all());

        // 2. Проверяем, что пришло событие о смене статуса сделки
        if (!$request->has('leads.status')) {
            return response()->json(['status' => 'ignored'], 200);
        }

        // 3. Получаем данные о сделке
        $leadStatus = $request->input('leads.status.0');
        $leadId = $leadStatus['id'] ?? null;
        $newStatusId = $leadStatus['status_id'] ?? null;
        $pipelineId = $leadStatus['pipeline_id'] ?? null;

        // 4. Укажите ID этапа, при переходе на который нужно отправить уведомление
        $targetStatusId = 88517678; // ЗАМЕНИТЕ НА ВАШ ID ЭТАПА
//        $targetStatusId = 82364358; // ЗАМЕНИТЕ НА ВАШ ID ЭТАПА

        // 5. Если сделка перешла на нужный этап — отправляем в Telegram
        if ($newStatusId == $targetStatusId) {
//            $this->sendTelegramNotification($leadId, $newStatusId, $pipelineId);
        }

        // 6. Возвращаем успешный ответ, чтобы amoCRM не повторяла запрос
        return response()->json(['status' => 'success'], 200);
    }

    private function sendTelegramNotification($leadId, $statusId, $pipelineId)
    {
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (!$botToken || !$chatId) {
            Log::error('Telegram bot token or chat ID is not configured.');
            return;
        }

        $message = "📌 *Сделка перешла на новый этап!*\n\n"
            . "🆔 ID сделки: `{$leadId}`\n"
            . "📊 Новый этап: `{$statusId}`\n"
            . "🔀 Воронка: `{$pipelineId}`\n"
            . "🕒 Время: " . now()->format('d.m.Y H:i:s');

        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

//        Http::post($url, [
//            'chat_id' => $chatId,
//            'text' => $message,
//            'parse_mode' => 'Markdown',
//        ]);

        $response = Http::timeout(10)
            ->post($url, [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);

        Log::info('Telegram response', ['body' => $response->body(), 'status' => $response->status()]);
    }
}
