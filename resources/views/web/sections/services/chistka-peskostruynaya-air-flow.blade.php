@extends('web.layout')

@section('header')
    @include('web.layouts.header.without_middle_header')
@endsection

@section('content')

    <section>
        <div class="__container">
            <h2>{{$servicesBySection['name']}}</h2>
        </div>
    </section>

    <section>
        <div class="__container">
            <div class="servic_section">
                <div class="servic_block">
                    <div class="block_cont">
                        <p>
                            Air Flow. Это механическая чистка зубов, основанная на очень бережном шлифовании и полировке зубов. Пескоструйная обработка удаляет отложения с поверхностных частей зуба с помощью микрочастиц пищевой соды, подающихся с потоком воздуха и воды. Эта процедура является абсолютно безболезненной и безопасной для эмали.</p>
                    </div>
                    <div class="servic_block_bottom">
                        <div class="servic_block_bottom__price">
                            <h4 class="light">От {{$servicesBySection['price']}} ₽ </h4>
                        </div>
                        <open-appointment></open-appointment>
                    </div>
                </div>
                <div class="big_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="60" height="60" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"><path d="M2925 4949 c-27 -6 -87 -28 -132 -50 -112 -54 -198 -140 -253 -253 -37 -76 -42 -82 -68 -79 -15 1 -133 10 -262 18 -129 9 -329 22 -445 30 -1181 82 -1519 105 -1536 105 -11 0 -31 -11 -44 -25 l-25 -24 0 -351 0 -351 25 -24 c13 -14 33 -25 44 -25 10 0 509 34 1107 75 598 41 1101 75 1116 75 l28 0 0 -90 c0 -83 2 -93 25 -115 23 -24 29 -25 160 -25 l135 0 0 -90 c0 -75 -3 -90 -16 -90 -27 0 -119 -101 -132 -146 -8 -28 -12 -129 -12 -313 l0 -272 25 -24 24 -25 351 0 351 0 24 25 25 24 0 272 c0 184 -4 285 -12 313 -13 45 -105 146 -132 146 -13 0 -16 15 -16 90 l0 90 135 0 c132 0 137 1 161 25 l26 26 -4 312 c-4 306 -4 313 -29 378 -36 94 -73 152 -134 214 -101 101 -225 154 -370 160 -49 2 -112 0 -140 -6z m279 -187 c90 -42 149 -100 194 -190 l37 -76 3 -248 4 -248 -402 0 -402 0 4 248 3 247 32 67 c40 85 97 147 172 186 78 42 122 52 213 48 61 -3 92 -11 142 -34z m-2444 -237 c217 -15 405 -28 418 -31 22 -4 22 -6 22 -174 0 -168 0 -170 -22 -174 -24 -5 -796 -57 -835 -56 l-23 0 0 230 0 230 23 0 c12 0 200 -11 417 -25z m1168 -82 l552 -37 0 -86 0 -86 -487 -33 c-269 -18 -521 -35 -560 -38 l-73 -6 0 162 c0 88 3 161 8 161 4 1 256 -16 560 -37z m1192 -683 l0 -80 -80 0 -80 0 0 80 0 80 80 0 80 0 0 -80z m135 -265 c21 -20 25 -34 25 -80 l0 -55 -240 0 -240 0 0 55 c0 46 4 60 25 80 24 25 26 25 215 25 189 0 191 0 215 -25z m25 -375 l0 -80 -240 0 -240 0 0 80 0 80 240 0 240 0 0 -80z"></path><path d="M4425 3415 c-20 -19 -25 -34 -25 -73 0 -66 -33 -192 -67 -255 -37 -67 -125 -162 -190 -204 -87 -55 -86 -112 3 -168 31 -20 53 -40 48 -44 -5 -5 -30 -14 -56 -21 -26 -7 -104 -43 -174 -81 -142 -78 -203 -99 -284 -99 -81 0 -144 22 -278 96 -181 100 -294 126 -439 100 -93 -16 -187 -58 -254 -113 -42 -35 -129 -135 -143 -165 -5 -10 -7 -10 -12 -1 -3 7 -26 39 -50 70 -120 156 -322 240 -511 213 -93 -13 -151 -35 -282 -109 -122 -68 -191 -91 -271 -91 -80 0 -144 22 -278 96 -155 85 -221 106 -342 107 -163 0 -299 -59 -412 -182 -113 -121 -177 -308 -165 -481 7 -101 44 -234 97 -347 l38 -81 -22 -20 c-11 -11 -40 -31 -63 -46 -71 -44 -71 -108 0 -152 23 -15 61 -45 84 -67 l43 -41 -53 -28 c-75 -42 -123 -93 -165 -177 l-37 -75 -3 -383 -3 -383 25 -25 25 -25 2351 0 2351 0 25 25 25 25 -3 383 -3 382 -32 67 c-59 125 -164 207 -298 231 l-64 12 73 112 c160 247 246 475 246 654 0 175 -82 368 -203 480 l-28 26 58 63 c32 35 82 78 110 97 85 54 85 112 0 166 -65 42 -153 137 -190 204 -34 63 -67 189 -67 255 0 60 -31 98 -80 98 -19 0 -40 -9 -55 -25z m89 -451 c16 -26 54 -73 84 -105 l54 -59 -54 -59 c-30 -32 -68 -79 -84 -105 -16 -25 -31 -46 -34 -46 -3 0 -18 21 -34 46 -16 26 -54 73 -84 105 l-54 59 54 59 c30 32 68 79 84 105 16 25 31 46 34 46 3 0 18 -21 34 -46z m-3628 -455 c40 -7 108 -36 210 -90 162 -85 238 -109 344 -109 106 0 182 24 344 110 113 59 168 82 217 90 265 46 495 -190 476 -490 -10 -161 -88 -342 -255 -590 l-97 -145 -619 -3 -619 -2 19 21 c10 12 43 37 71 56 85 54 85 112 0 166 -65 42 -153 137 -190 204 -34 63 -67 189 -67 255 0 39 -5 54 -25 73 -55 55 -135 15 -135 -68 0 -82 -47 -257 -70 -257 -25 0 -90 231 -90 322 1 177 101 353 241 421 88 43 153 53 245 36z m2240 0 c40 -7 108 -36 210 -90 162 -85 238 -109 344 -109 101 0 184 25 310 92 63 34 131 70 151 79 49 25 176 46 190 32 23 -23 60 -150 66 -227 5 -65 11 -84 29 -103 54 -54 134 -11 134 71 0 25 5 68 11 96 11 50 11 51 30 34 32 -28 98 -173 110 -239 14 -77 6 -191 -21 -280 -33 -107 -122 -277 -229 -436 l-96 -144 -684 0 -684 0 -63 90 c-242 344 -331 600 -279 799 36 139 119 247 229 301 85 41 151 51 242 34z m-516 -911 c24 -50 77 -141 117 -202 l72 -111 -120 -3 c-65 -1 -173 -1 -238 0 l-120 3 75 115 c41 63 93 154 117 202 23 48 44 87 47 87 3 0 25 -41 50 -91z m-1936 6 c16 -26 54 -73 84 -105 l54 -59 -54 -59 c-30 -32 -68 -79 -84 -105 -16 -25 -31 -46 -34 -46 -3 0 -18 21 -34 46 -16 26 -54 73 -84 105 l-54 59 54 59 c30 32 68 79 84 105 16 25 31 46 34 46 3 0 18 -21 34 -46z m3960 -496 c55 -16 138 -99 154 -154 8 -28 12 -134 12 -338 l0 -296 -2240 0 -2240 0 0 296 c0 204 4 310 12 338 16 52 102 141 147 151 18 4 34 5 37 3 11 -12 44 -167 44 -210 0 -60 31 -98 80 -98 54 0 76 33 83 125 5 68 13 103 42 183 6 18 3808 18 3869 0z"></path><path d="M2965 2279 c-84 -78 -127 -206 -105 -319 12 -67 79 -206 119 -249 37 -39 81 -42 116 -6 34 33 31 68 -9 129 -50 75 -68 124 -69 186 -1 63 16 103 68 155 43 42 47 84 10 120 -37 38 -77 33 -130 -16z"></path></g></svg>                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="__container">
            <div class="descriptions_section">
                <div>
                    <h3 class="descriptions_title">Основы метода</h3>
                    <div class="descriptions_block">
                        <p>Гигиеническая чистка зубов Air Flow представляет собой процедуру, при которой аппарат распыляет на зубы смесь из воды, воздуха и кристаллов специального порошка под давлением. Степень такого давления регулирует врач-стоматолог. При помощи данного прибора различные типы отложений удаляются не только с поверхности зубов, но и из межзубных промежутков.</p>
                        <p>Это безопасный и безболезненный способ профессиональной чистки, не повреждающий эмаль. После его применения зубы становятся светлее. Для большего комфорта пациента используется порошок с фруктовым вкусом.</p>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Когда нужна чистка Air Flow</h3>
                    <div class="descriptions_block">
                        <p>Чистка полости рта Air Flow необходима в тех ситуациях, когда нужно почистить труднодоступные места челюстей, десен и зубов, а также перед разными типами лечебного вмешательства.</p>
                        <p>Поэтому снятие зубных отложений методом Air Flow необходимо в таких случаях:</p>
                        <ul class="descriptions_block_list">
                            <li>Возникновение необходимости установки или снятия коронок, имплантатов или брекетов</li>
                            <li>Появление проблем с деснами – первых признаков пародонтоза</li>
                            <li>Необходимо качественно почистить установленные имплантаты, брекеты и др.</li>
                            <li>Пожелтение эмали из-за напитков и иных веществ (чай, кофе, сигареты и др.)</li>
                            <li>Зубы расположены очень плотно, имеется скученность зубных рядов</li>
                        </ul>
                        <p>В результате выполнения процедуры удается не только полностью очистить имплантаты или брекеты, но и избежать развития заболеваний ротовой полости, таких как кариес, пародонтит, пародонтоз, периостит, гингивит и другие.</p>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Достоинства и недостатки Air Flow</h3>
                    <div class="descriptions_block">
                        <p>Плюсы метода очистки зубов при помощи данного прибора:</p>
                        <ul class="descriptions_block_list">
                            <li>Протезы, брекеты и другие ортодонтические конструкции полностью очищаются, чего невозможно добиться обычными методами</li>
                            <li>Аппарат позволяет максимально очистить труднодоступные поддесневые и наддесневые участки от налета</li>
                            <li>Процедура занимает порядка получаса</li>
                            <li>Применение Air Flow не доставляет дискомфорта и боли</li>
                            <li>Эмаль осветляется, пигментные пятна устраняются</li>
                            <li>Такая чистка помогает устранить неприятный запах изо рта (если он не вызван иными заболеваниями)</li>
                        </ul>
                        <p>Минусы:</p>
                        <ul class="descriptions_block_list">
                            <li>Аппарат Air Flow не в состоянии самостоятельно удалить застарелый плотный зубной камень</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.map')

@endsection
