<template>
  <div class="container">
    <form>

        <div class="mb-3 mt-5">
            <label for="name" class="form-label">Имя</label>
            <input v-model="name" type="text" class="form-control" id="name" :placeholder="name">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input v-model="phone" type="text" class="form-control" id="phone" :placeholder="phone">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Ваше сообщение</label>
            <textarea v-model="message" class="form-control" id="message" rows="3"></textarea>
        </div>
        <button @click="send" type="button" class="btn btn-success mb-2">Отправить</button>
        <div v-if="errors == true" class="alert alert-danger" role="alert">
            {{message_errors}}
        </div>
        <div v-else-if="errors == false" class="alert alert-success" role="alert">
            Сообщение добавлено.
        </div>
    </form>
  </div>
</template>

<script>
export default {
    data() {
        return {
            name: 'Иван',
            phone: '8-800-2000-500',
            message: 'Текст сообщения',
            errors: null,
            message_errors: null
        }
    },
    methods: {
        send() {
            axios.post('/api/messages', {
                name: this.name,
                phone: this.phone,
                message: this.message
            }).then(response => {
                let {status, errors} = response.data;
                if (status == false) {
                    this.errors = true;
                    this.message_errors = errors;
                } else this.errors = false;
            });
        }
    }
}
</script>

<style>

</style>