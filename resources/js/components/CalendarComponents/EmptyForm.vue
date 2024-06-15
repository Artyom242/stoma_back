<template>
    <div class="empty_block">
        <h4 class="title_calendar empty_title">Выберите число для записи</h4>
        <div class="empty_text">
            <p>Для выбора нужно нажать на число :)</p>
            <p>Не рабочие дни помечены <span class="red">красным цветом</span></p>
        </div>
    </div>
</template>

<script>


export default {

}
</script>

<style scoped>
.empty_block {
    width: 100%;
    text-align: left;
}

.empty_title {
    margin-bottom: 20px;
}

.empty_text{
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.red {
    color: red;
}
</style>
