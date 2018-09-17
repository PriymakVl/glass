<?php
    require_once ('./models/order_state.php');
?>

<nav id="main-menu">
    <ul>
        <!-- orders -->
        <li class="drop">
            <a href="#">Заказы</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/order/list?state=<?=OrderState::REGISTERED?>">Зарегистрированны</a></li>
                        <li><a href="/order/list?state=<?=OrderState::PREPARATION?>">В подготовке</a></li>
                        <li><a href="/order/list?state=<?=OrderState::WORK?>">Выданы в работу</a></li>
                        <li><a href="/order/list?state=<?=OrderState::ALL?>">Все</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- statistics -->
        <li class="drop">
            <a href="#">Статистика</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="/statistics/day">За сутки</a></li>
                        <li>За месяц</li>
                        <li>За квартал</li>
                        <li>За полугодие</li>
                        <li>За год</li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- glass -->
        <li class="drop">
            <a href="#">Стекло</a>
            <div class="dropdownContain">
                <div class="dropOut">
                    <div class="triangle"></div>
                    <ul>
                        <li>Остатки</li>
                        <li>Перерезы</li>
                        <li>Марки</li>
                        <li>Производители</li>
                    </ul>
                </div>
            </div>
        </li>
        <li><a href="#">Заказчики</a></li>
    </ul>
</nav>