<?php

namespace App\Listeners;

use App\Events\IdeaCreated;
use MoonShine\Models\MoonshineUser;
use Services\Telegram\TelegramBotApi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MoonShine\Notifications\MoonShineNotification;

class SendIdeaNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IdeaCreated $event): void
    {
        $users = MoonshineUser::get('id')->toArray();

        MoonShineNotification::send(
            message: 'Получена новая идея',
            // Опционально button
            button: ['link' => '/'. config('moonshine.route.prefix') .'/resource/idea-resource/detail-page?resourceItem=' . $event->idea->id, 'label' => 'Посмотреть'],
            // Опционально id администраторов (по умолчанию всем)
            ids: $users,
            // Опционально цвет иконки (purple, pink, blue, green, yellow, red, gray)
            color: 'green'
        );

        TelegramBotApi::sendMessage( $this->textForTelegram($event->idea) , env('LOGGER_TELEGRAM_CHAT_ID'), env('LOGGER_TELEGRAM_TOKEN') );
    }


    protected function textForTelegram($idea): string
    {
        return 'Получена новая идея'
        . "\nЗаголвок - "  . $idea->title
        . "\nКраткое описание - "  . $idea->description
        . "\nАвтор -  {$idea->author->family} {$idea->author->name} {$idea->author->patronymic}";
    }
}
