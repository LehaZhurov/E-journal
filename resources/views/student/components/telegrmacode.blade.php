<div class="container-fluid ">
    <h2>Телеграмм</h2>
    <div class="container-fluid" style='width:96%'>
        <form action="#" name='tgcodeform' class='d-flex' id='tgcodeform'>
            <input type="text" name='user_id' id='user_id' value="{{ $user->id }}" class='d-none'>
            <ul class="list-group list-group-flush flex-column">
                <li class="list-group-item d-flex justify-content-between d-none" id='input_code'>
                    <input type="text" name='chat_id' id='chat_id' value="{{ $telegramChatId }}"
                        class='form-control' placeholder="Код от бота">
                    @if ($telegramChatId != null)
                        {{-- Обновление кода телеграм --}}
                        <button id="updatecodebtn" type="button" class="btn bg-green">Сохранить</button>
                    @else
                        {{-- Создание кода телеграмм --}}
                        <button id="createcodebtn" type="button" class="btn bg-green">Установить</button>
                    @endif
                </li>
                <li id='viewcode'>
                    Код телеграмм {{ $telegramChatId ? ':' . $telegramChatId : 'не установлен' }}
                </li>
                <div id="CodeHelpBlock" class="form-text">
                    Кликните 2 раза чтоб ввести код
                </div>
            </ul>
        </form>

    </div>
</div>
