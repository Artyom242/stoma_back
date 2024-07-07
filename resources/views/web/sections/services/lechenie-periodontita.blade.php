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
                        <p>Периодонтит — это заболевание, вызванное бактериями, травмой или лекарственными препаратами, в результате которого происходит воспаление комплекса соединительной ткани (периодонта), расположенной между цементом зуба и зубной альвеолой.</p>
                    </div>
                    <div class="servic_block_bottom">
                        <div class="servic_block_bottom__price">
                            <h4 class="light">От {{$servicesBySection['price']}} ₽ </h4>
                        </div>
                        <open-appointment></open-appointment>
                    </div>
                </div>
                <div class="big_icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="512.000000pt"
                         height="512.000000pt" viewBox="-12 -12 535 535" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
                           stroke="none">
                            <path
                                d="M2360 4998 c-34 -17 -51 -35 -69 -70 l-23 -48 26 -216 c18 -155 30 -225 44 -247 23 -41 75 -76 124 -83 l38 -7 0 -138 c0 -126 2 -141 20 -159 11 -11 29 -20 40 -20 11 0 29 9 40 20 18 18 20 33 20 159 l0 139 46 7 c54 8 118 59 133 108 5 18 18 98 27 180 15 130 19 147 35 147 10 0 177 -29 370 -65 193 -36 355 -65 360 -65 4 0 17 -21 29 -47 25 -57 80 -117 135 -146 40 -22 46 -22 664 -25 573 -2 625 -1 642 14 24 22 24 66 1 87 -17 15 -56 17 -360 17 l-342 0 0 68 c0 75 -16 102 -58 102 -42 0 -62 -34 -62 -105 l0 -65 -201 0 c-165 0 -207 3 -235 16 -101 48 -110 188 -15 251 l34 23 606 0 c668 0 651 -2 651 60 0 63 30 60 -653 60 l-622 0 -50 -24 c-55 -25 -110 -81 -131 -133 -8 -18 -18 -33 -23 -33 -9 0 -703 127 -738 135 -13 3 -23 12 -23 19 0 23 -51 78 -87 92 -23 10 -80 14 -191 14 -144 0 -162 -2 -202 -22z m360 -113 c18 -22 -24 -392 -47 -417 -22 -25 -204 -26 -224 -2 -18 22 -61 391 -48 415 9 17 23 19 158 19 121 0 151 -3 161 -15z" />
                            <path
                                d="M1615 4029 c-170 -22 -349 -96 -467 -193 -295 -244 -393 -712 -262 -1256 60 -246 175 -539 327 -830 201 -387 221 -442 327 -949 88 -417 142 -571 236 -671 64 -68 126 -93 224 -88 96 4 145 33 190 111 70 121 103 281 155 746 40 356 57 471 86 586 30 118 64 183 105 203 32 15 36 15 61 -4 81 -60 120 -233 183 -794 49 -440 78 -586 140 -711 35 -68 96 -126 145 -135 55 -10 156 0 198 20 94 46 179 179 235 371 16 55 55 222 86 370 98 463 138 587 282 855 412 772 529 1386 348 1840 -73 184 -211 341 -369 422 -167 85 -286 112 -485 111 -165 0 -301 -26 -445 -85 -305 -124 -399 -128 -636 -27 -239 101 -450 135 -664 108z m154 -159 c25 -86 87 -124 131 -80 25 25 25 44 0 86 l-21 33 38 -5 c90 -13 235 -58 320 -99 71 -35 112 -64 188 -134 107 -100 164 -133 241 -139 48 -4 54 -2 69 22 15 22 16 32 7 52 -12 25 -29 35 -97 53 -22 6 -56 23 -74 39 l-35 29 76 7 c103 9 170 28 291 80 104 46 243 86 294 86 16 0 36 -9 46 -20 24 -28 63 -25 92 6 25 26 27 27 122 21 276 -17 504 -161 616 -387 213 -435 102 -1042 -338 -1850 -118 -217 -169 -375 -265 -824 -90 -421 -127 -536 -200 -619 -44 -50 -79 -67 -138 -67 -44 0 -53 4 -80 35 -64 72 -102 253 -157 745 -53 471 -78 599 -140 727 -40 81 -87 127 -146 143 -95 26 -174 -18 -231 -126 -68 -130 -97 -276 -153 -776 -51 -462 -92 -651 -155 -718 -23 -25 -36 -30 -74 -30 -93 0 -143 41 -202 165 -40 84 -76 217 -144 540 -95 447 -129 546 -300 880 -71 138 -149 300 -175 360 -110 257 -190 529 -215 728 -18 143 -8 389 20 497 42 162 135 323 232 402 132 108 314 175 479 177 l66 1 12 -40z" />
                            <path
                                d="M3132 3823 c-21 -22 -50 -64 -66 -94 -32 -62 -31 -100 5 -120 36 -19 67 -3 93 49 13 26 36 62 50 81 40 53 31 100 -22 116 -19 5 -31 -1 -60 -32z" />
                            <path
                                d="M1937 3762 c-33 -36 -21 -64 57 -140 78 -76 102 -86 136 -52 34 34 25 59 -53 137 -78 78 -109 90 -140 55z" />
                            <path
                                d="M3027 3542 c-10 -11 -17 -35 -17 -60 0 -29 -7 -49 -25 -70 -33 -39 -32 -77 0 -98 57 -38 133 39 142 145 5 50 3 65 -12 81 -23 25 -67 26 -88 2z" />
                            <path
                                d="M2106 3504 c-35 -35 -5 -118 65 -178 51 -43 99 -49 123 -14 24 34 20 44 -31 96 -27 26 -56 62 -65 80 -13 25 -23 32 -47 32 -16 0 -37 -7 -45 -16z" />
                            <path
                                d="M2363 3335 c-28 -20 -30 -65 -5 -88 20 -18 114 -37 183 -37 38 0 51 5 63 22 20 29 20 41 -2 68 -13 16 -34 23 -82 30 -36 4 -81 11 -100 14 -25 5 -42 2 -57 -9z" />
                            <path
                                d="M2775 3338 c-87 -13 -109 -27 -113 -68 -6 -61 45 -74 178 -45 67 14 90 32 90 71 0 52 -33 61 -155 42z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="__container">
            <div class="descriptions_section">
                <div>
                    <h3 class="descriptions_title">Анатомия зуба</h3>
                    <div class="descriptions_block">
                        <p>Каждый зуб можно разделить на две части: видимый участок зуба (коронка) и невидимый (корень). В центре зуба располагается сосудисто-нервный пучок — пульпа. На кончике корня зуба имеется входное отверстие, через которое пульпа проникает внутрь зуба. Чаще всего периодонтит развивается бессимптомно! В этом его и коварство! Хронический периодонтит может развиваться годами и медленно увеличиваться до огромных размеров. Даже достигнув больших размеров, он может себя никак не проявлять.</p>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Последствиям бессимптомного течения периодонтита:</h3>
                    <div class="descriptions_block">
                        <ul class="descriptions_block_list">
                            <li>одонтогенный гайморит;</li>
                            <li>поражение нижнечелюстного нерва;</li>
                            <li>киста.</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Причины развития периодонтита:</h3>
                    <div class="descriptions_block">
                        <ul class="descriptions_block_list">
                            <li>травматическая (хроническая травма из-за неправильной жевательной нагрузки); </li>
                            <li>инфекционный (кариозный процесс).</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Симптомы:</h3>
                    <div class="descriptions_block">
                        <ul class="descriptions_block_list">
                            <li>боль при накусывании;</li>
                            <li>отек;</li>
                            <li>самопроизвольные боли.</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3 class="descriptions_title">Профилактика:</h3>
                    <div class="descriptions_block">
                        <p>Осмотр 1 раз в 6 месяцев и рентген зубов</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.map')

@endsection
