<section>
    <div class="__container">
        <h2 class="title_section title_center">Удобная запись на прием</h2>

        <div class="blocks_row">
            <div class="calendar_block">
                <table class="calendar">
                    <thead>
                    <tr class="row_title_calendar">
                        <td class="arrow prev">‹</td>
                        <td colspan="5" class="title_calendar"></td>
                        <td class="arrow next">›</td>
                    </tr>
                    <tr class="row_days_calendar">
                        <td>Пн</td>
                        <td>Вт</td>
                        <td>Ср</td>
                        <td>Чт</td>
                        <td>Пт</td>
                        <td>Сб</td>
                        <td>Вс</td>
                    </tr>
                    </thead>
                    <tbody class="body_calendar"></tbody>
                </table>
            </div>

            <form action="" onsubmit="validateForm(event)" class="form">
                <div class="block_forms">
                    <h4 class="title_calendar">Выберите запись</h4>
                    <div class="pole row_pole">
                        <div class="form_radio_btn">
                            <input id="radio-1" type="radio" name="radio" value="1">
                            <label for="radio-1">На прием</label>
                        </div>
                        <div class="form_radio_btn">
                            <input id="radio-2" type="radio" name="radio" value="2">
                            <label for="radio-2">На консультацию</label>
                        </div>
                    </div>
                </div>
                <div class="block_forms">
                    <h4 class="title_calendar">Свободное время</h4>

                    <div class="pole">
                        <div class="pole column_pole">
                            <div class="block_checkbox">
                                <input class="input_checkbox" type="checkbox" name="one" id="1">
                                <label for="1">9:00 - 10:00</label>
                            </div>
                            <div class="block_checkbox">
                                <input class="input_checkbox" type="checkbox" name="one" id="2">
                                <label for="2">10:00 - 11:00</label>
                            </div>
                            <div class="block_checkbox">
                                <input class="input_checkbox" type="checkbox" name="one" id="3">
                                <label for="3">12:00 - 13:00</label>
                            </div>
                        </div>
                        <div class="pole column_pole">
                            <div class="block_checkbox">
                                <input class="input_checkbox" type="checkbox" name="one" id="1">
                                <label for="1">9:00 - 10:00</label>
                            </div>
                            <div class="block_checkbox">
                                <input class="input_checkbox" type="checkbox" name="one" id="2">
                                <label for="2">10:00 - 11:00</label>
                            </div>
                            <div class="block_checkbox">
                                <input class="input_checkbox" type="checkbox" name="one" id="3">
                                <label for="3">12:00 - 13:00</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block_forms">
                    <div class="pole column_pole">
                        <h4 class="title_calendar">Введите свое имя</h4>
                        <input class="btn btn_input" type="text" placeholder="Иван">
                    </div>
                    <div class="pole column_pole">
                        <h4 class="title_calendar">Введите свой телефон</h4>
                        <input class="btn btn_input" id="phone" type="tel" placeholder="+7 (999) 999-9999">
                        <button class="btn btn_submit" type="submit"><span>Записаться</span></button>
                        <p><span class="text_small">Нажимая на кнопку, вы даете согласие на обработку
                                            персональных данных и соглашаетесь с политикой конфиденциальности</span></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
